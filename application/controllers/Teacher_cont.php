<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Teacher_cont extends CI_Controller
{  
    public function teacher()
    {
        $this->load->library('session');
        $this->load->helper('url');  
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['result'] = $this->SelectData->teacher(); 
        $username = $this->session->userdata('username');
        if(isset($username)){
            $this->load->view('teacher',$query);       //html filename
        }else echo "Error 404 : Access Denied";
    }
    public function teacherProfile($n)
    {
        $this->load->library('session');
        $this->load->helper('url');
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
         $this->load->model('SelectData');
        $query['result'] = $this->SelectData->teacherProfile($n);
        $username = $this->session->userdata('username');
        if(isset($username)){
            $this->load->view('teacherProfile',$query);    //html filename
        }else echo "Error 404 : Access Denied";
    }
    public function updateTeacherProfile()
    {
        $this->load->library('session');
        $this->load->helper('url');  
        $username = $this->session->userdata('username');
        if(isset($username)){
            $this->load->view('updateTeacherProfile');    //html filename
        }else echo "Error 404 : Access Denied";
    }
    public function addTeacher()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
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
       // print_r($ntype);
        $n = count($ntype); 
        foreach($ntype as $value){
             
            if($value == 'school'){
                $query['result3'] = $this->SelectData->subject();
            }
            else if($value == 'jrcolg_sci'){
                $query['result3'] = $this->SelectData->collegesubject();
            }
            else if($value == 'jrcolg_com'){
                $query['result3'] = $this->SelectData->collegesubject();
            }
            else if($value == 'engicolg'){ 
                $query['result3'] = $this->SelectData->engisubject();
            }
            else if($value == 'comcolg'){ 
                $query['result3'] = $this->SelectData->commercesubject();
            }
        }
        
        
        $query['result'] = $this->SelectData->course();
		$this->form_validation->set_rules('teachersname', 'teachersname', 'callback_customAlpha');
		$this->form_validation->set_rules('dob', 'dob', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('mobile', 'mobile', 'required|numeric|exact_length[10]');
		$this->form_validation->set_rules('qualification', 'qualification', 'required');
        $this->form_validation->set_rules('salary', 'salary', 'required|numeric');
        $this->form_validation->set_rules('address', 'address', 'required');
        /*$this->form_validation->set_rules('standard', 'standard', 'required');
        $this->form_validation->set_rules('engi_branch', 'engi_branch', 'required');
        $this->form_validation->set_rules('commerce_branch', 'commerce_branch', 'required');
        $this->form_validation->set_rules('semester', 'semester', 'required');*/
        $this->form_validation->set_message('customAlpha', 'Only Alphabets Allowed');
		if($this->form_validation->run() == FALSE)
		{
            $username = $this->session->userdata('username');
            if(isset($username)){
                $this->load->view('addTeacher',$query);			//html filename
            }else echo "Error 404 : Access Denied";
		}
		else
        {
            
            $this->load->helper('form');
            $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
            $this->load->model('AddData');
            $this->load->model('ProfileImg');
            $name = strtolower(preg_replace('/\s+/', '', $this->input->post('teachersname')));
            $img_address = 'assets/profile/'.$name.'.jpg';
            $t_name = explode(" ",$this->input->post('teachersname'));
            $data = array(
                't_name' => $t_name[0],
                't_fathername' => $t_name[1],
                't_surname' => $t_name[2],
                't_gender' => $this->input->post('gender'),
                't_dob' => $this->input->post('dob'),
                't_email' => $this->input->post('email'),
                't_contact' => $this->input->post('mobile'),
                'qualification' => $this->input->post('qualification'),
                'salary' => $this->input->post('salary'),
                't_address' => $this->input->post('address'),
                't_profile' => $img_address,
                'join_date' => $this->input->post('joiningdate')
            );
            $this->AddData->addTeacherItem($data);
             $insert_id = $this->db->insert_id();
            $img = $_FILES['photo']['name'] ; 
            $this->ProfileImg->addImg($img,$name);
           // $course = $this->input->post('course');
            $subject = $this->input->post('subject');
            $data1 = array('subject'=>$subject);
            $this->AddData->addTeacherSubjItem($data1,$insert_id);
            $this->session->set_flashdata('success','You have Successfully submitted data.');
            redirect('Teacher_cont/addTeacher');   
		}
    }
    public function customAlpha($str) 
    {
        if (!preg_match('/^[a-zA-Z ]+$/i',$str))
        {
            return false;
        }
    }
}
?>