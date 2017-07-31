<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Bar_cont extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Selectdata');
            $this->load->helper('url');
        }
        public function bar()
        {
            $this->load->library('session');
            $db = $this->session->userdata('db');//load db 
            $this->load->database($db);//call db
            $this->load->model('SelectData');
            $test= $this->SelectData->test_detail();  
            $marks = $this->SelectData->marks_detail();
            $pass = 0;
            $fail = 0;$i=0;
            $render = array();
            foreach($test as $value){
                $test_id = $value->test_ID;
                foreach($marks as $mvalue){
                    $mtest_id = $mvalue->test_id;
                    if($test_id == $mtest_id){
                        $marks_obt =$mvalue->marks_obtained;
                        $marks_obt = explode(",",$marks_obt);
                        foreach($marks_obt as $asd){
                            if($asd >= $value->passing_marks){
                                $pass++;
                            }
                            else
                                $fail++;
                        }
                    }
                    
                }
                $total = $pass + $fail; 
            $avg = $pass/$total;
            $data[$i] = array(
                'category' => $test_id,
                'value1' => $pass,
                'value2' => $avg,
                'value3' => $fail,
                'test_detail' => $test
            );
                $i++;
              $pass = 0;
            $fail = 0;
            }
            $render['result'] =  $data;
            $this->load->view('chart',$render);    
        }
   }
?>

            