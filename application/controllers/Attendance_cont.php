<?php
/*
details about attendance of student and teacher 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Attendance_cont extends CI_Controller
{
     public function markStudentAttendance()
    {
         $this->load->library('session');
         $this->load->helper('url');
         $username = $this->session->userdata('username');   //session mane
         if(isset($username)){
            $this->load->model('SelectData');
             $this->load->library('form_validation');
             $db = $this->session->userdata('db');   //load db   
             $this->load->database($db); //call db
             /*validation starts*/
             $this->form_validation->set_message('customAlpha', 'Only Alphabets Allowed');
             $this->form_validation->set_message('alpha_dash', 'Please enter in the following format eg:IX-1');
             $query['result'] = $this->SelectData->ViewBatch(); 
             /*validation ends*/
             if(! isset($_POST['markattend']))
             { 
                 $this->load->view('addStudentAttendance',$query);		//view file with query arrgument passed
             }
        //form after giving right output
		else
        {   
            $batch = explode(",",$this->input->post('batchname'));
            $batch_name = $batch[0];  //input
            $batch_timing = $batch[1];
            $this->load->model('SelectData');   //to select data from db
            $this->load->model('AddData');  //to insert or update data from db
            //getting batch_ID from bbatch name and time
            $res = $this->SelectData->batchIDStudAttend($batch_name,$batch_timing);
            $data = array(
                'batch_id'=>$res,
                /*'faculty_name'=>$this->input->post('facultyname'),*/
                'attend_date'=>$this->input->post('date')
            );
            //insert into stud_attend table
            $this->AddData->addStudentAttendItem($data);    //passing $data to AddData model
            $this->session->set_flashdata('success','You have Successfully submitted data.');//if success show alert
            $attend_id = $this->db->insert_id();    //laster inserted ID from above insert
            //Select student detail from id->stud_id and attend_id
            $query['result1'] = $this->SelectData->stud_attend_map($res,$attend_id);
            $this->load->view('addStudentAttendance',$query);  	//html filename
		}
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        } 
    }
    public function StudentAttendance()
    {
        $this->load->helper('url');
        $this->load->library('session');
        $username = $this->session->userdata('username');   //session mane
        if(isset($username)){
        $db = $this->session->userdata('db');   //load db     
        $this->load->database($db);     //call db
        $this->load->model('AddData');      //to insert or update data from db
        $stud_id = $this->input->post('stud_id');
        //$stud_id = implode(",",$stud_id);
        $attend_id = $this->input->post('attend_id');
        $attending = $this->input->post('attend');
        $data=array(
            'stud_id'=>$stud_id,
            'attend_id'=>$attend_id,
            'attend'=>$attending,
        );
        $this->AddData->markStudentAttendItem($data);   //insert in stud_attend_mapping
        redirect('Attendance_cont/markStudentAttendance');  //redirect to addStudentAttendance.php
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        } 
    }
    public function viewStudentAttendance(){
        $this->load->helper('url');
        $this->load->library('session');
        $username = $this->session->userdata('username');   //session mane
        if(isset($username)){
        $this->load->library('form_validation');
        $db = $this->session->userdata('db');   //load db     
        $this->load->database($db); //call db
        $this->load->model('SelectData');   //call db
        $query['result'] = $this->SelectData->student_attend_batch();   //replacing batch_id with batch_name in student
        $this->load->view('studentAttendView',$query);  //html filename
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }    
    }
    public function viewAttendanceDetail($n){
        $this->load->helper('url');
        $this->load->library('session');
        $username = $this->session->userdata('username');   //session mane
        if(isset($username)){
        $this->load->library('form_validation');
        $db = $this->session->userdata('db');   //load db     
        $this->load->database($db); //call db
        $this->load->model('SelectData');   //call db
        $query['result'] = $this->SelectData->attedBatch($n);   //select from stud_attend_mapping
        $this->load->view('studAttendDetails',$query);  //html filename
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }    
    }
    function OneStudentAttendance($id){
       $this->load->helper('url');
        $this->load->library('session');
        $username = $this->session->userdata('username');   //session mane
        if(isset($username)){
            $this->load->library('form_validation');
            $db = $this->session->userdata('db');   //load db     
            $this->load->database($db); //call db
            $this->load->model('SelectData');
            $stud_attend_mapping = $this->SelectData->stud_attend_mapping();   //select from stud_attend_mapping
            $studentAttendDetails['attendDetails'] = array();
            foreach($stud_attend_mapping as $stud_id){
                $studIds = explode(",",$stud_id->stud_id);
                if(in_array($id,$studIds)){
                    $attendStud = explode(",",$stud_id->absent_stud_id);
                     $student_attend = $this->SelectData->student_attend_oneAttendOneStudent($stud_id->attend_id);   //select from student_attend
                    if(in_array($id,$attendStud)){
                       array_push($studentAttendDetails['attendDetails'],array('dayDetails'=>$student_attend,'attendP/A'=>'absent'));
                    }
                    else{
                        array_push($studentAttendDetails['attendDetails'],array('dayDetails'=>$student_attend,'attendP/A'=>'present'));
                    }
                    
                }
            }
            $this->load->view('oneStudAttend',$studentAttendDetails);  //html filename
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        } 
    }
    public function markTeacherAttendance()
    {
        $this->load->helper('url');
        $this->load->library('session');
        $username = $this->session->userdata('username');   //session mane
        if(isset($username)){
        $db = $this->session->userdata('db');   //load db    
        $this->load->database($db); //call db
        $this->load->model('SelectData');
        
        $this->db->close();
        $configdbfly=$this->config->config['sysdb'];
        /*localHost*/
        if($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == "[::1]"){
                    $configdbfly['username'] = 'root'; /* Default db */
                    $configdbfly['password'] = ''; /* Default db */
        }
        /*server*/
        else{
            $configdbfly['username'] = 'root'; /* Default db */
            $configdbfly['password'] = 'N5sZmB2KTdI1'; /* Default db */
        }
        $configdbfly['database'] = 'admin_db';  /* Default db */
        $this->load->database($configdbfly);
        $query['result'] = $this->SelectData->dbSelect();
        $this->db->close();
        $db = $this->session->userdata('db');   //load db      
        $this->load->database($db); //call db
        $dbname = $db['database'];
        foreach($query as $value){
            foreach($value as $value1){
                $dbName = $value1->dbName;
                if($dbName == $dbname){
                    $type=$value1->dbType;  //finding the database name and the name stored in the admin tb
                }
            }
        }
        $ntype = explode(",",$type);    //seperating the database type and inserting into array $ntype
        $subjectNameId['subject'] =$this->SelectData->teacher_subject_mapping_attend();
        $this->load->library('form_validation');
        /*form validating begin*/
        $this->form_validation->set_rules('subject', 'subject', 'required');
        $this->form_validation->set_message('customAlpha', 'Only Alphabets Allowed');
		$this->form_validation->set_message('alpha_dash', 'Please enter in the following format science-1');
        /*ends*/
		if($this->form_validation->run() == FALSE)
		{
            $username = $this->session->userdata('username');
            if(isset($username)){
            $this->load->view('addTeacherAttendance',$subjectNameId);   //html filename before inserting values in html form
             }else echo "Error 404 : Access Denied";
		}
        /*after inserting values in html form*/
		else
        {
            $this->load->model('SelectData');   //to select data from db
            $this->load->model('AddData');  //to insert or update data from db
            $data = array(
                    'subject' => $this->input->post('subject'),
                     'dbtype' =>$ntype,                     
                );
            $teacher_map = $this->SelectData->AttendSubjTeacher($data); //select subject_id according to subject name and dbtype
            $t_name['result'] = $teacher_map['name'];   //subject name to an array
            $data1 = array(
                'tcm_id' => $teacher_map['tcm_id'],
                'timing' =>$this->input->post('timing'),
                'date' => $this->input->post('date')
            );
            $this->AddData->TeacherAttend($data1);  //insert in teacher_attend
            $this->session->set_flashdata('success','You have Successfully submitted data.'); //if successfully inserted
            $t_attend_id = $this->db->insert_id();
            array_push($t_name['result'],$t_attend_id);
            $this->load->view('addTeacherAttendance',$t_name); 	//html filename
		}
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }   
    }
    public function TeacherAttendance()
    {
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('AddData');  //insert or update data in html 
        $username = $this->session->userdata('username');   //session mane
        if(isset($username)){
        $db = $this->session->userdata('db');   //load db      
        $this->load->database($db); //call db
        $t_ID = $this->input->post('teach_id');
        $t_ID = implode(",",$t_ID); //teacher_id in one variable seperated by "," 
        $attending = $this->input->post('attend');
        $t_attend_id = $this->input->post('t_attend_id');
        $attending = implode(",",$attending);//abent teacher_id in one variable seperated by ","
        $data=array(
            't_id'=>$t_ID,
            't_attend_id'=>$t_attend_id,
            'absent_teacher_attend_id'=>$attending,
        );
        $this->AddData->markTeacherAttendItem($data);   //insert in t_attend_mapping
        redirect('Attendance_cont/markTeacherAttendance');             //html filename
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }
    public function viewTeacherAttendance(){
        $this->load->helper('url');
        $this->load->library('session');
        $username = $this->session->userdata('username');   //session mane
        if(isset($username)){
        $this->load->library('form_validation');
        $db = $this->session->userdata('db');   //load db     
        $this->load->database($db); //call db
        $this->load->model('SelectData');   //load model to select data from db
        $query['result'] = $this->SelectData->teacher_attend(); //select all teacher from teacher_attend table
        $this->load->view('teacherAttendView',$query); //html filename
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }
    public function viewTeacherAttendanceDetail($n){
        $this->load->helper('url');
        $this->load->library('session');
        $username = $this->session->userdata('username');   //session mane
        if(isset($username)){
        $this->load->library('form_validation');
        $db = $this->session->userdata('db');//load db     
        $this->load->database($db);//call db
        $this->load->model('SelectData');   //load model to select data from db
        $query['result'] = $this->SelectData->teacherAttendMap($n); //select all from t_attend_mapping table
        $query['teacher_detail'] = $this->SelectData->teacher(); //select all from t_attend_mapping table
        $this->load->view('teacherAttendDetails',$query);   //html filename
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }
    /*used for validation of the input values from html form*/
    public function customAlpha($str) 
    {
        if ( !preg_match('/^[a-zA-Z ]+$/i',$str) )
        {
            return false;
        }
    }
}
?>