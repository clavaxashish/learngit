<?php defined('BASEPATH') or exit('No direct script access allowed');

class CI_Client_gearman {

    protected $ci;

    public function __construct(){
        $this->ci = & get_instance();
        $this->ci->load->library('Lib_gearman');
        $this->ci->load->config('gearman');
    }

    /**
     * [init_client description]
     * @param  [string] $registered_func [description]
     * @param  [int] $data            [description]
     * @return [type] none                  [description]
     */
    public function init_client ($registered_func, $data) {
        // Instantiate Client Object
        $client = $this->ci->lib_gearman->gearman_client();
        // Add job servers
        $client->addServer('127.0.0.1', '4730');

        // Job Handler
        $job_handler = $this->ci->lib_gearman->do_job_background($registered_func, $data);
        // Error Code Handler
        if ($client->returnCode() != GEARMAN_SUCCESS) {
            log_message('error', 'Client not initialised!!!');
            exit;
        }
        log_message('info', 'Client Initialised Successfullu!!!');
    }

    public function workerCompleted($task)
        {
            return GEARMAN_SUCCESS;
        }

}
