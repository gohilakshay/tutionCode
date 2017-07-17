<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
class Attendance_cont extends CI_Controller
{
     public function markStudentAttendance()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->database();
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
            $batch_name = $this->input->post('batchname');
            $batch_timing = $this->input->post('batchtiming');
            $this->load->model('SelectData');
            $this->load->model('AddData');
            $res = $this->SelectData->batchIDStudAttend($batch_name,$batch_timing);
            $data = array(
                'batch_id'=>$res,
                'faculty_name'=>$this->input->post('facultyname'),
                'attend_date'=>$this->input->post('date')
            );
            $this->AddData->addStudentAttendItem($data);
            $attend_id = $this->db->insert_id();
            $query['result'] = $this->SelectData->stud_attend_map($res,$attend_id);
            $this->load->view('addStudentAttendance',$query);  	
		}
    }
    public function StudentAttendance()
    {
        $this->load->helper('url');
         $this->load->database();
        $this->load->model('AddData');
        $stud_id = $this->input->post('stud_id');
        //$stud_id = implode(",",$stud_id);
        $attend_id = $this->input->post('attend_id');
        $attending = $this->input->post('attend');
        $data=array(
            'stud_id'=>$stud_id,
            'attend_id'=>$attend_id,
            'attend'=>$attending,
        );
        $this->AddData->markStudentAttendItem($data);
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
    public function customAlpha($str) 
    {
        if ( !preg_match('/^[a-zA-Z ]+$/i',$str) )
        {
            return false;
        }
    }
}
?>