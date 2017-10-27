<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Course_cont extends CI_Controller
{
    public function addCourse()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
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
        $query['result9'] = $ntype;
        $query['result'] = $this->SelectData->course($ntype);
            
        foreach($ntype as $value){
            $query['result1'] = $this->SelectData->standard();  
             $query['result2'] = $this->SelectData->branch(); 
            if($value == 'school'){
                $query['result3'] = $this->SelectData->subject();
            }
            else if($value == 'jrcolg_sci'){
                $query['result5'] = $this->SelectData->jrColgSci();
            }
            else if($value == 'jrcolg_com'){
                $query['result6'] = $this->SelectData->jrColgCom();
            }
            else if($value == 'jrcolg_art'){
                $query['result10'] = $this->SelectData->jrColgArt();
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
            
                $this->load->view('addCourse',$query);       //html filename   
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
            elseif($this->input->post('stream')!=''){
                $branch = $this->input->post('stream'); 
                $semester = NULL;
            }
            else {
                $branch = null;
                $semester = NULL;
            }

            $subject = $this->input->post('subject');
            print_r($subject);
            $subject_id = implode(",",$subject);
            $data = array(
                'course_name' => $this->input->post('course_name'),
                'course_type' => $this->input->post('coursetype'),
                'standard_name' => $this->input->post('standard'),
                'branch_name' => $branch,
                'semester' => $semester,
                'subject_id'=>$subject_id,
            );
            $val = $this->AddData->addCourseItem($data);
            if($val == 0){
                $this->session->set_flashdata('success','Course Already Exits.');
                redirect('Course_cont/addCourse');  
            }
            else{
                $this->session->set_flashdata('success','You have Successfully submitted data.');
                redirect('Course_cont/addCourse');
            }
        }
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        } 
    }
    public function updateCourse()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        
        /*close the connection for new connection*/
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
                $query['result5'] = $this->SelectData->jrColgSci();
            }
            else if($value == 'jrcolg_com'){
                $query['result6'] = $this->SelectData->jrColgCom();
            }
            else if($value == 'jrcolg_art'){
                $query['result10'] = $this->SelectData->jrColgArt();
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
            $this->load->view('updateCourse',$query);       //html filename   
        }
        else
        {
            $this->load->helper('form');
            $db = $this->session->userdata('db');//load db 
            $this->load->database($db);//call db
            $this->load->model('AddData'); 
            if($this->input->post('engi_branch')!= $this->input->post('course_branch')){ 
               $branch = $this->input->post('engi_branch'); 
                $semester = $this->input->post('engisemester'); 
            }
            
             else if($this->input->post('commerce_branch')!=$this->input->post('course_branch')){ 
                 $branch = $this->input->post('commerce_branch'); 
                $semester = $this->input->post('semester1');
            }
            else if($this->input->post('stream')!= $this->input->post('course_branch')){
                $branch = $this->input->post('stream'); 
                $semester = NULL;
            }
            else {
                $branch = null;
                $semester = NULL;
            }
            if(is_numeric($this->input->post('standard')) && $this->input->post('standard')<11){
                $branch = null;
                $semester = NULL;
            }
            else if($this->input->post('standard')>10 && $this->input->post('standard') < 13){
                $branch = $this->input->post('stream');
                $semester = NULL;
            }
            else if ($this->input->post('standard') == 'Engineering'){
                $branch = $this->input->post('engi_branch'); 
                $semester = $this->input->post('engisemester'); 
            }
            else if ($this->input->post('standard') == 'Commerce'){
                $branch = $this->input->post('commerce_branch'); 
                $semester = $this->input->post('semester1');
            }
            $subject = $this->input->post('subject');
            $subject_id = implode(",",$subject);
            $data = array(
                'course_name' => $this->input->post('course_name'),
                'course_ID' => $this->input->post('course_id'),
                'course_type' => $this->input->post('coursetype'),
                'standard_name' => $this->input->post('standard'),
                'branch_name' => $branch,
                'semester' => $semester,
                'subject_id'=>$subject_id,
            );
           
           $this->AddData->updateCourseItem($data);
            $this->session->set_flashdata('success','You have Successfully submitted data.');
            redirect('Course_cont/addCourse');      
        }
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        } 
    }
    public function deleteCourse(){
        $this->load->helper('url');
        $this->load->library('session');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $this->load->helper('form');
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('DeleteData');
        $course = $this->input->post("course_id");
        $this->DeleteData->deleteCourse($course); // call function from model
        if($this->db->affected_rows() > 0){
            redirect('Course_cont/addCourse'); 
        }
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
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