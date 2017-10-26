<?php
/*the chart render and information is sent here*/
defined('BASEPATH') OR exit('No direct script access allowed');
    class Bar_cont extends CI_Controller
    {
        public function bar()
        {
            $this->load->helper('url');
            $this->load->library('session');
            $username = $this->session->userdata('username');   //session mane
            if(isset($username)){
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
                }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        } 
        }
        function OneStudentMarks($student_id){
            $this->load->helper('url');
            $this->load->library('session');
            $username = $this->session->userdata('username');   //session mane
            if(isset($username)){
                $db = $this->session->userdata('db');//load db 
                $this->load->database($db);//call db
                $this->load->model('SelectData');
               // $test= $this->SelectData->test_detail();  
                $marks = $this->SelectData->marks_detail();
                //print_r($marks);
                foreach($marks as $value){
                    $studentIds = explode(",",$value->stud_id);
                    $marksObtaineds = explode(",",$value->marks_obtained);
                    if(in_array($student_id, $studentIds)){
                        $indexStud = array_search($student_id, $studentIds);
                        $student_marks[] = $marksObtaineds[$indexStud];
                        $testIds[] = $value->test_id;
                        $testDetails[] = $this->SelectData->test_update($value->test_id);
                    }
                }
                $data = array(
                    'stud_id'=> $student_id,
                    'student_marks' => $student_marks,
                    'testIds' => $testIds,
                    'testDetails' => $testDetails
                );
                $student_marks_data['Student_marks_data'] = $data;
                $this->load->view('oneStudentMarks',$student_marks_data);
            }
            else {
                $name=site_url().'/Home';
                echo "<script>window.location.href='$name';</script>";         
            }
        }
             
   }
        
    
?>

            