<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Course_cont extends CI_Controller
{
    public function addCourse()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        
        
        $this->db->close();
        $configdbfly=$this->config->config['sysdb'];
        $configdbfly['username'] = 'root'; /* Default db */
        $configdbfly['password'] = ''; /* Default db */
        $configdbfly['database'] = 'admin_db'; /* Default db */
        $this->load->database($configdbfly);
        $query['result'] = $this->SelectData->dbSelect();
        $this->db->close();
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $dbname = $db['database'];
        foreach($query as $value){
            foreach($value as $value1){
                $dbName = $value1->dbName;
                if($dbName == $dbname){
                    $type=$value1->dbType; //finding the database name and the name stored in the admin tb
                }
            }
        }
        $ntype = explode(",",$type);
        $n = count($ntype);
        $query['result'] = $this->SelectData->course($ntype); 
        foreach($ntype as $value){
            $query['result1'] = $this->SelectData->standard();  
             $query['result2'] = $this->SelectData->branch(); 
            if($value == 'school'){
                $query['result3'] = $this->SelectData->subject();
            }
            else if($value == 'jrcolg_sci'){
                $query['result5'] = $this->SelectData->collegesubject();
            }
            else if($value == 'jrcolg_com'){
                $query['result6'] = $this->SelectData->collegesubject();
            }
            else if($value == 'engicolg'){ 
                $query['result7'] = $this->SelectData->engisubject();
            }
            else if($value == 'comcolg'){ 
                $query['result8'] = $this->SelectData->commercesubject();
            }
        }
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('course_name', 'course_name', 'callback_customAlphanumeric');
        $this->form_validation->set_rules('coursetype','coursetype','required');
        $this->form_validation->set_message('customAlphanumeric','Please enter in the following format eg:STD 9 or Engineering <br> Special characters are not allowed');
        if($this->form_validation->run() == FALSE)
        {
            $username = $this->session->userdata('username');
            if(isset($username)){
                $this->load->view('addCourse',$query);       //html filename   
            }else echo "Error 404 : Access Denied";
        }
        else
        {
            $this->load->helper('form');
            $db = $this->session->userdata('db');//load db 
            $this->load->database($db);//call db
            $this->load->model('AddData');         
            if($this->input->post('engi_branch')!=''){ 
                $branch = $this->input->post('engi_branch'); 
                $semester = $this->input->post('engisemester'); 
            }
            elseif($this->input->post('commerce_branch')!=''){ 
                $branch = $this->input->post('commerce_branch'); 
                $semester = $this->input->post('semester1');
            }
            else {
                $branch = null;
                $semester = NULL;
            }
            $subject = $this->input->post('subject');
            $subject_id = implode(",",$subject);
            $data = array(
                'course_name' => $this->input->post('course_name'),
                'course_type' => $this->input->post('coursetype'),
                'standard_name' => $this->input->post('standard'),
                'branch_name' => $branch,
                'semester' => $semester,
                'subject_id'=>$subject_id,
            );
            print_r($data);
            $this->AddData->addCourseItem($data);
            $this->session->set_flashdata('success','You have Successfully submitted data.');
            redirect('Course_cont/addCourse');      
        }
    }
    public function updateCourse()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        
        
        $this->db->close();
        $configdbfly=$this->config->config['sysdb'];
        $configdbfly['username'] = 'root'; /* Default db */
        $configdbfly['password'] = ''; /* Default db */
        $configdbfly['database'] = 'admin_db'; /* Default db */
        $this->load->database($configdbfly);
        $query['result'] = $this->SelectData->dbSelect();
        $this->db->close();
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $dbname = $db['database'];
        foreach($query as $value){
            foreach($value as $value1){
                $dbName = $value1->dbName;
                if($dbName == $dbname){
                    $type=$value1->dbType; //finding the database name and the name stored in the admin tb
                }
            }
        }
        $ntype = explode(",",$type);
        $n = count($ntype);
        foreach($ntype as $value){
            $query['result1'] = $this->SelectData->standard();  
             $query['result2'] = $this->SelectData->branch(); 
            if($value == 'school'){
                $query['result3'] = $this->SelectData->subject();
            }
            else if($value == 'jrcolg_sci'){
                $query['result5'] = $this->SelectData->collegesubject();
            }
            else if($value == 'jrcolg_com'){
                $query['result6'] = $this->SelectData->collegesubject();
            }
            else if($value == 'engicolg'){ 
                $query['result7'] = $this->SelectData->engisubject();
            }
            else if($value == 'comcolg'){ 
                $query['result8'] = $this->SelectData->commercesubject();
            }
        }
        $course_id = $this->input->post('course_id');
        $query['course'] = $this->SelectData->courseUpdate($course_id);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('course_name', 'course_name', 'callback_customAlphanumeric');
        $this->form_validation->set_rules('coursetype','coursetype','required');
        $this->form_validation->set_message('customAlphanumeric','Please enter in the following format eg:STD 9 or Engineering <br> Special characters are not allowed');
        if($this->form_validation->run() == FALSE)
        {
            $username = $this->session->userdata('username');
            if(isset($username)){
                $this->load->view('updateCourse',$query);       //html filename   
            }else echo "Error 404 : Access Denied";
        }
        else
        {
            $this->load->helper('form');
            $db = $this->session->userdata('db');//load db 
            $this->load->database($db);//call db
            $this->load->model('AddData');         
            if($this->input->post('engi_branch')!=''){ 
                $branch = $this->input->post('engi_branch'); 
                $semester = $this->input->post('engisemester'); 
            }
            elseif($this->input->post('commerce_branch')!=''){ 
                $branch = $this->input->post('commerce_branch'); 
                $semester = $this->input->post('semester1');
            }
            else {
                $branch = null;
                $semester = NULL;
            }
            $subject = $this->input->post('subject');
            $subject_id = implode(",",$subject);
            $data = array(
                'course_name' => $this->input->post('course_name'),
                'course_type' => $this->input->post('coursetype'),
                'standard_name' => $this->input->post('standard'),
                'branch_name' => $branch,
                'semester' => $semester,
                'subject_id'=>$subject_id,
            );
            //print_r($data);
            $this->AddData->updateCourseItem($data);
            $this->session->set_flashdata('success','You have Successfully submitted data.');
            redirect('Course_cont/updateCourse');      
        }
    }
    public function customAlphanumeric($strr){
         if ( !preg_match('/^[0-9a-zA-Z ]+$/',$strr) )
            {
                return false;
            }
    }
}
?>