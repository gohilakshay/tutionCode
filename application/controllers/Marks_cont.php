<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Marks_cont extends CI_Controller
{
    public function addMarks()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('testid', 'testid', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $username = $this->session->userdata('username');
            if(isset($username)){
                $this->load->view('addMarks');			//html filename
            }else echo "Error 404 : Access Denied";
		}
		else
        {
            $test_id = $this->input->post('testid');
            $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
            $this->load->model('SelectData');
            $query['result'] = $this->SelectData->selectTest($test_id);
            $username = $this->session->userdata('username');
            if(isset($username)){
                $this->load->view('addMarks',$query);
            }else echo "Error 404 : Access Denied";
            redirect('Marks_cont/addMarks');   	
		}
    }
    public function marks()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $this->load->model('AddData');
        $test_id = $this->input->post('test_id');
        $stud_id = $this->input->post('stud_id');
        $marks = $this->input->post('marks');
        $stud_id = implode(",",$stud_id);
        $marks = implode(",",$marks);
        $data =array(
            'test_id'=>$test_id,
            'stud_id'=>$stud_id,
            'marks_obtained'=>$marks
        );
        $this->AddData->addMarks($data);
        $this->session->set_flashdata('success','You have Successfully submitted data.');
        $username = $this->session->userdata('username');
        if(isset($username)){
            $this->load->view('addMarks');         //html filename
        }else echo "Error 404 : Access Denied";
    }
}
?>