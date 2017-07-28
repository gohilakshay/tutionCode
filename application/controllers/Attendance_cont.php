<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
class Attendance_cont extends CI_Controller
{
     public function markStudentAttendance()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $db = $this->session->userdata('db');//load db   
        $this->load->database($db);//call db
        $this->form_validation->set_rules('batchname', 'batchname', 'required|alpha_dash');
        $this->form_validation->set_rules('facultyname', 'facultyname', 'callback_customAlpha');
        $this->form_validation->set_message('customAlpha', 'Only Alphabets Allowed');
		$this->form_validation->set_message('alpha_dash', 'Please enter in the following format eg:IX-1');
		if($this->form_validation->run() == FALSE)
		{
            $username = $this->session->userdata('username');
            if(isset($username)){
                $this->load->view('addStudentAttendance');	
            }else echo "Error 404 : Access Denied";//html filename	
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
            $this->session->set_flashdata('success','You have Successfully submitted data.');
            $attend_id = $this->db->insert_id();
            $query['result'] = $this->SelectData->stud_attend_map($res,$attend_id);
            $this->load->view('addStudentAttendance',$query);  	
		}
    }
    public function StudentAttendance()
    {
        $this->load->helper('url');
        $this->load->library('session');
        $db = $this->session->userdata('db');//load db     
        $this->load->database($db);//call db
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
        redirect('Attendance_cont/markStudentAttendance');
    }
    
    public function markTeacherAttendance()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('subject', 'subject', 'required|alpha_dash');
        $this->form_validation->set_message('customAlpha', 'Only Alphabets Allowed');
		$this->form_validation->set_message('alpha_dash', 'Please enter in the following format science-1');
		if($this->form_validation->run() == FALSE)
		{
            $username = $this->session->userdata('username');
            if(isset($username)){
            $this->load->view('addTeacherAttendance');
             }else echo "Error 404 : Access Denied";//html filename	
		}
		else
        {
            $db = $this->session->userdata('db');//load db    
            $this->load->database($db);//call db
            $this->load->model('SelectData');
            $this->load->model('AddData');
            $data = array(
                    'subject' => $this->input->post('subject'),
                     'course' =>$this->input->post('course'),                     
                );
            $teacher_map = $this->SelectData->AttendCoursSubjTeacher($data);
            $t_name['result'] = $teacher_map['name'];
            $data1 = array(
                'tcm_id' => $teacher_map['tcm_id'],
                'timing' =>$this->input->post('timing'),
                'date' => $this->input->post('date')
            );
            $this->AddData->TeacherAttend($data1);
            $this->session->set_flashdata('success','You have Successfully submitted data.');
            $t_attend_id = $this->db->insert_id();
            array_push($t_name['result'],$t_attend_id);
            $this->load->view('addTeacherAttendance',$t_name); 	
		}
    }
    public function TeacherAttendance()
    {
        $this->load->helper('url');
        $this->load->model('AddData');
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $t_ID = $this->input->post('teach_id');
        $t_ID = implode(",",$t_ID);
        $attending = $this->input->post('attend');
        $t_attend_id = $this->input->post('t_attend_id');
        $attending = implode(",",$attending);
        $data=array(
            't_id'=>$t_ID,
            't_attend_id'=>$t_attend_id,
            'absent_teacher_id'=>$attending,
        );
        print_r($data);
        $this->AddData->markTeacherAttendItem($data);
        redirect('Attendance_cont/markTeacherAttendance');             //html filename
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