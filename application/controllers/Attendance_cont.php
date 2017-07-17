<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
class Attendance_cont extends CI_Controller
{
     public function markStudentAttendance()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('batchname', 'batchname', 'required|alpha_dash');
        $this->form_validation->set_rules('facultyname', 'facultyname', 'callback_customAlpha');
        $this->form_validation->set_message('customAlpha', 'Only Alphabets Allowed');
		$this->form_validation->set_message('alpha_dash', 'Please enter in the following format eg:IX-1');
		if($this->form_validation->run() == FALSE)
		{
            $this->load->view('addStudentAttendance');		//html filename	
		}
		else
        {
            redirect('Attendance_cont/markStudentAttendance');   	
		}
    }
    public function studentattendance()
    {
        $this->load->helper('url');
        $this->load->view('addStudentAttendance');            //html filename
    }
    
    public function markTeacherAttendance()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('subject', 'subject', 'required|alpha_dash');
        $this->form_validation->set_rules('staffname', 'staffname', 'callback_customAlpha');
        $this->form_validation->set_message('customAlpha', 'Only Alphabets Allowed');
		$this->form_validation->set_message('alpha_dash', 'Please enter in the following format science-1');
		if($this->form_validation->run() == FALSE)
		{
            $this->load->view('addTeacherAttendance');		//html filename	
		}
		else
        {
            redirect('Attendance_cont/markTeacherAttendance');   	
		}
    }
    public function teacherattendance()
    {
        $this->load->helper('url');
        $this->load->view('addTeacherAttendance');            //html filename
    }
}
?>