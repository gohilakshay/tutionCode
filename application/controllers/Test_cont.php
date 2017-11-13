<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
class Test_cont extends CI_Controller
{
    public function addTest()
    {
        $this->load->library('session');
        $this->load->helper('url');
          $this->load->library('pagination');
        $this->load->library('form_validation');
        $username = $this->session->userdata('username');
        if(isset($username)){
            $db = $this->session->userdata('db');//load db      
            $this->load->database($db);//call db
            $this->load->model('SelectData');
//            $query['result'] = $this->SelectData->test_detail();
//            $query['batch_details'] = $this->SelectData->ViewBatch();
            $this->form_validation->set_rules('testid', 'testid', 'required|numeric');
            $this->form_validation->set_rules('totalmarks', 'totalmarks', 'required|numeric');
            $this->form_validation->set_rules('passingmarks', 'passingmarks', 'required|numeric');
               // $this->form_validation->set_rules('batchname', 'batchname', 'required|alpha_dash');
            $this->form_validation->set_rules('subject', 'subject', 'callback_customAlpha');
            $this->form_validation->set_rules('supervisorname', 'supervisorname', 'callback_customAlpha');
                $this->form_validation->set_message('customAlpha', 'Only Alphabets Allowed');
                $this->form_validation->set_message('alpha_dash','Please enter in the following format eg:IX-1');
            if($this->form_validation->run() == FALSE)
            {
             
                $limit = 10; 
                if (!empty($_GET['testFilter'])) {
                    $count = $this->SelectData->testCount($_GET['testFilter']);
                    $studCount = count($count);
                }else{
                    $count = $this->SelectData->test();
                    $studCount = count($count);
                }
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
                $offset = 0;
                if (!empty($_GET['per_page'])) {
                    $pageNo = $_GET['per_page'];
                    $offset = ($pageNo - 1) * $limit;
                }
               if (!empty($_GET['testFilter'])) {
                    $count = $this->SelectData->testCount($_GET['testFilter'],$limit, $offset);
                   $this->load->view('addTest', array(
                       'totalResult' => $totalRecords,
                       'result' => $count,
                       'links' => $links,
                       'batch_details' => $this->SelectData->ViewBatch(),
                       'offset' => $offset
                    ));
                }
                else{
                    $count = $this->SelectData->test($limit, $offset);
                    $this->load->view('addTest', array(
                        'totalResult' => $totalRecords,
                        'result' => $count,
                        'links' => $links,
                        'batch_details' => $this->SelectData->ViewBatch(),
                        'offset' => $offset
                    ));
                }
        //$this->load->view('addTest',$query);		//html filename	
            }   
            else
               {
               $this->load->helper('form');
               $db = $this->session->userdata('db');//load db      
               $this->load->database($db);//call db
               $this->load->model('AddData');
               $this->load->model('SelectData');
               $batch_name = $this->input->post('batchname');
               $subject_name = $this->input->post('subject');
               $batch_id = $this->SelectData->batchIDBatch($batch_name);
                   
               $test_date1 = $this->input->post('testdate');
               $test_date_1 = explode("/",$test_date1);
                   if(!empty($test_date_1[1])){
                       $d = $test_date_1[1];
                       $m = $test_date_1[0];
                       $y = $test_date_1[2];
                        $date = $y.'-'.$m.'-'.$d; 
                   }
                   else{
                       $date = $test_date_1[0];
                   }
                
               //$subj_id = $this->SelectData->subjIDSubj($subject_name);
               $data = array(
                   'test_ID'=>$this->input->post('testid'),
                   'test_date'=>$date,
                   'test_time'=>$this->input->post('testtime'),
                   'batch_id'=>$batch_id,
                   'total_marks'=>$this->input->post('totalmarks'),
                   'passing_marks'=>$this->input->post('passingmarks'),
                   'supervisor_name'=>$this->input->post('supervisorname'),
                   'subject_name'=>$subject_name
               );
               $ti = $this->AddData->addTest($data);
                if($ti == 0){
                    $this->session->set_flashdata('success','Test Id Already EXISTS.');
                    redirect('Test_cont/addTest');
                }
                else{
                    $this->session->set_flashdata('success','You have Successfully submitted data.');
                    redirect('Test_cont/addTest');
                }
                 
            //   
            }
            }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }
    public function testDetails()
    {
         $this->load->library('session');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        if(isset($username)){
            $this->load->view('addTest');         //html filename
         }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }   
    }
    public function updateTest()
    {
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');  
        $username = $this->session->userdata('username');
        if(isset($username)){
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('SelectData'); // model for delete
        $test_id = $this->input->post("test_id");
        $query['result'] = $this->SelectData->test_update($test_id);
        $query['batch_details'] = $this->SelectData->ViewBatch();
        if(!isset($_POST['updateTest']))
        {
            $this->load->view('updateTest',$query);   //html filename
        } 
        else {
            $this->load->helper('form');
            $db = $this->session->userdata('db');//load db      
            $this->load->database($db);//call db
            $this->load->model('AddData');
            $this->load->model('SelectData');
            $batch_name = $this->input->post('batchname');
            $subject_name = $this->input->post('subject');
            $this->session->set_flashdata('success','You have Successfully submitted data.');
            $batch_id = $this->SelectData->batchIDBatch($batch_name);
            //$subj_id = $this->SelectData->subjIDSubj($subject_name);
            
                $test_date1 = $this->input->post('testdate');
               $test_date_1 = explode("/",$test_date1);
                   if(!empty($test_date_1[1])){
                       $d = $test_date_1[1];
                       $m = $test_date_1[0];
                       $y = $test_date_1[2];
                        $date = $y.'-'.$m.'-'.$d; 
                   }
                   else{
                       $date = $test_date_1[0];
                   }
            
            $data = array(
                'test_ID'=>$this->input->post('testid'),
                'test_date'=>$date,
                'test_time'=>$this->input->post('testtime'),
                'batch_id'=>$batch_id,
                'total_marks'=>$this->input->post('totalmarks'),
                'passing_marks'=>$this->input->post('passingmarks'),
                'supervisor_name'=>$this->input->post('supervisorname'),
                'subject_name'=>$subject_name
            );
            $ti = $this->AddData->UpdateTest($data);
            redirect('Test_cont/addTest');
        }
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }
    public function deleteTest(){
        $this->load->helper('url');
        $this->load->library('session');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $this->load->helper('form');
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('deleteData'); // model for delete
        $test_id = $this->input->post("test_id");
        $this->deleteData->deleteTest($test_id); // call function from model
        if($this->db->affected_rows() > 0){
            redirect('Test_cont/addTest'); 
        }
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }
    public function TestMarkDetail($n)
    {     
        $this->load->helper('form');
        $this->load->helper('url');  
        $this->load->library('session');
        $username = $this->session->userdata('username');
        if(isset($username)){
            $db = $this->session->userdata('db');//load db 
            $this->load->database($db);//call db
            $this->load->model('SelectData');
            $test= $this->SelectData->test_detail();  
            $marks = $this->SelectData->marks_detail();
            $student = $this->SelectData->student();
            $pass = 0;
            $fail = 0;$i=0;
            $render = array();
            foreach($test as $value){
                if($value->test_ID == $n){
                    $test_detail[] = $value; 
                    $test_id = $value->test_ID;
                    foreach($marks as $mvalue){
                        $marks_detail[] = $mvalue;
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
                        'test_detail' => $test_detail,
                        'marks_detail' => $marks_detail,
                    );
                    $i++;
                    $pass = 0;
                    $fail = 0;
                }
            }
        $new = array('data' => $data);
        $this->load->view("test_detail_view",$new);
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }
    public function customAlpha($strrr) 
        {
            if ( !preg_match('/^[a-zA-Z ]+$/i',$strrr) )
            {
                return false;
            }
        }
}
?>