<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Worker extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() { 
        parent::__construct();
        $this->load->library('Lib_gearman');
        $this->load->config('gearman');
    }

    public function doWork() { 
//echo "hdhdh"; die;
        $worker = new GearmanWorker();
        $worker->addServer();
        $worker->addFunction("job", "job_function");
        while ($worker->work()); 
        if ($worker->returnCode() != GEARMAN_SUCCESS) {
            log_message('error', 'Worker encountered an error!!!');
            //break;
        }
        if (!$worker->returnCode()) {
            log_message('info', 'Worker successfully completed the job!');
        }
    }

    function job_function($job) {   
        return strlen(strtolower($job->workload()));
    }

    

}
