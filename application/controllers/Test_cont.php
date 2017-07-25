<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
class Test_cont extends CI_Controller
{
    public function addTest()
    {
         $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['result'] = $this->SelectData->test_detail();
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
            $username = $this->session->userdata('username');
            if(isset($username)){
                $this->load->view('addTest',$query);		//html filename	
            }else echo "Error 404 : Access Denied";
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
           // $subj_id = $this->SelectData->subjIDSubj($subject_name); //YET TO BE COMPLETE BECAUSE SUBJETS NOT ENTERED
            
            $data = array(
                'test_ID'=>$this->input->post('testid'),
                'test_date'=>$this->input->post('testdate'),
                'test_time'=>$this->input->post('testtime'),
                'batch_id'=>$batch_id,
                'total_marks'=>$this->input->post('totalmarks'),
                'passing_marks'=>$this->input->post('passingmarks'),
                'supervisor_name'=>$this->input->post('supervisorname'),
                'subject_id'=>'notYet'
            );
            $ti = $this->AddData->addTest($data);
            redirect('Test_cont/addTest');
		}
    }
    public function testDetails()
    {
         $this->load->library('session');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        if(isset($username)){
            $this->load->view('addTest');         //html filename
         }else echo "Error 404 : Access Denied";   
    }
    public function updateTest()
    {
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');  
        $username = $this->session->userdata('username');
        if(isset($username)){
            $this->load->view('updateTest');   //html filename
        }else echo "Error 404 : Access Denied";  
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