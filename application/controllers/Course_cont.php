<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Course_cont extends CI_Controller
{
   public function addCourse()
    {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('SelectData');
        $query['result'] = $this->SelectData->course();  
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('course_name', 'course_name', 'callback_customAlphanumeric');
        $this->form_validation->set_rules('coursetype','coursetype','required');
        $this->form_validation->set_message('customAlphanumeric','Please enter in the following format eg:STD 9 or Engineering <br> Special characters are not allowed');
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('addCourse',$query);       //html filename   
        }
        else
        {
            $this->load->helper('form');
            $this->load->database();
            $this->load->model('AddData');
            if($this->input->post('engi_branch')!=''){ 
                $branch = $this->input->post('engi_branch'); 
                $semester = $this->input->post('semester'); 
            }
            elseif($this->input->post('commerce_branch')!=''){ 
                $branch = $this->input->post('commerce_branch'); 
                $semester = $this->input->post('semester1');
            }
            else {
                $branch = null;
                $semester = NULL;
            }
            $data = array(
                'course_name' => $this->input->post('course_name'),
                'course_type' => $this->input->post('coursetype'),
                'standard' => $this->input->post('standard'),
                'branch' => $branch,
                'semester' => $semester
            );
            $subject = $this->input->post('subject');
            $this->AddData->addCourseItem($data,$subject);
            redirect('Course_cont/addCourse');      
        }
    }
    /*public function course()
    {
        $this->load->helper('url');
        $this->load->view('addCourse');         //html filename
    } */
    public function customAlphanumeric($strr){
         if ( !preg_match('/^[0-9a-zA-Z ]+$/',$strr) )
            {
                return false;
            }
    }
}
?>