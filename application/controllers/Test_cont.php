<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
class Test_cont extends CI_Controller
{
    public function addTest()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $username = $this->session->userdata('username');
        if(isset($username)){
            $db = $this->session->userdata('db');//load db      
            $this->load->database($db);//call db
            $this->load->model('SelectData');
            $query['result'] = $this->SelectData->test_detail();
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

                       $this->load->view('addTest',$query);		//html filename	

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
               $this->session->set_flashdata('success','You have Successfully submitted data.');
               $batch_id = $this->SelectData->batchIDBatch($batch_name);
               //$subj_id = $this->SelectData->subjIDSubj($subject_name);

               $data = array(
                   'test_ID'=>$this->input->post('testid'),
                   'test_date'=>$this->input->post('testdate'),
                   'test_time'=>$this->input->post('testtime'),
                   'batch_id'=>$batch_id,
                   'total_marks'=>$this->input->post('totalmarks'),
                   'passing_marks'=>$this->input->post('passingmarks'),
                   'supervisor_name'=>$this->input->post('supervisorname'),
                   'subject_name'=>$subject_name
               );
               $ti = $this->AddData->addTest($data);
               redirect('Test_cont/addTest');
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
        $this->form_validation->set_rules('testid', 'testid', 'required|numeric');
	$this->form_validation->set_rules('totalmarks', 'totalmarks', 'required|numeric');
	$this->form_validation->set_rules('passingmarks', 'passingmarks', 'required|numeric');
        $this->form_validation->set_rules('batchname', 'batchname', 'required|alpha_dash');
	$this->form_validation->set_rules('subject', 'subject', 'callback_customAlpha');
	$this->form_validation->set_rules('supervisorname', 'supervisorname', 'callback_customAlpha');
        $this->form_validation->set_message('customAlpha', 'Only Alphabets Allowed');
        $this->form_validation->set_message('alpha_dash','Please enter in the following format eg:IX-1');
        if($this->form_validation->run() == FALSE)
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
            
            $data = array(
                'test_ID'=>$this->input->post('testid'),
                'test_date'=>$this->input->post('testdate'),
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