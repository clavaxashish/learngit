<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Curd extends CI_Controller {

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
    public function __construct()
    {
        parent::__construct();
        
      

    }





    public function arraySort() {
        $arr=array(1,6,2,7,5,9);
        for($j=0;$j<count($arr); $j++){
            for($i=0;$i<count($arr)-1;$i++){
                if($arr[$i] > $arr[$i+1]) {
                    $temp = $arr[$i+1];
                    $arr[$i+1]=$arr[$i];
                    $arr[$i]=$temp;
                }

            }

        }

       }

    public function sortWords(){
        $color = red;
        echo "\$color";
    }


    public function test() {
echo "<pre>";
       echo get_class($this); die;

    }


public function sum($val){

     if($val==1){
         return 1;
        }else{
  //echo $val."----".$sum;
     $sum=$val+$this->sum($val-1);
     return $sum;
     }
      
}



    public function test_worker() {


        $this->load->config('rabbitmq');

        $this->load->library('rabbitmq');
        $this->rabbitmq->consume("test_queue_1", array($this, 'TestWorker::test_cb'));
    }

    public function test_cb($data) {

        print_r(json_decode($data));
        return true;
    }

    public function fib($num){
      if($num<2){
          return 1;
      }
        else{
            return $num*fib($num-1);
        }
    }



}
