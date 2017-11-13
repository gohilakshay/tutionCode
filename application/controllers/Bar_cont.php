<?php
/*the chart render and information is sent here*/
defined('BASEPATH') OR exit('No direct script access allowed');
    class Bar_cont extends CI_Controller
    {
        public function bar()
        {
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->library('pagination');
            $username = $this->session->userdata('username');   //session mane
            if(isset($username)){
                $db = $this->session->userdata('db');//load db 
                $this->load->database($db);//call db
                $this->load->model('SelectData');
                $test = $this->SelectData->test_detail();  
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
                $limit = 10; 
                $count1 = $this->SelectData->test_detail1();
                $studCount = count($count1);
                $totalRecords = $studCount;
                $config["total_rows"] = $totalRecords;
                $config["per_page"] = $limit;
                $config['use_page_numbers'] = TRUE;
                $config['page_query_string'] = TRUE;
                $config['enable_query_strings'] = TRUE;
                $config['num_links'] = 5;
                $config['full_tag_open'] = "<ul class='pagination'>";
                $config['full_tag_close'] ="</ul>";
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
                $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
                $config['next_tag_open'] = "<li>";
                $config['next_tagl_close'] = "</li>";
                $config['prev_tag_open'] = "<li>";
                $config['prev_tagl_close'] = "</li>";
                $config['first_tag_open'] = "<li>";
                $config['first_tagl_close'] = "</li>";
                $config['last_tag_open'] = "<li>";
                $config['last_tagl_close'] = "</li>";
                $config['first_url'] = '?per_page=1'; 
                $this->pagination->initialize($config);
                $str_links = $this->pagination->create_links();
                $links = explode('&nbsp;', $str_links);
                $offset=0;
                if (!empty($_GET['per_page'])) {
                    $pageNo = $_GET['per_page'];
                    $offset = ($pageNo - 1) * $limit;
                }
                $count1 = $this->SelectData->test_detail1($limit,$offset);
                $this->load->view('chart', array(
                    'totalResult' => $totalRecords,
                    'result' => $data,
                    'links' => $links,
                    'offset' => $offset,
                    'reult1' => $count1
                ));
      //      $this->load->view('chart',$render); 
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

            