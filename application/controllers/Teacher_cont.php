<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Teacher_cont extends CI_Controller
{  
    public function teacher()
    {
        $this->load->library('session');
        $this->load->helper('url');  
        $username = $this->session->userdata('username');
        if(isset($username)){
            $db = $this->session->userdata('db');//load db      
            $this->load->database($db);//call db
            $this->load->model('SelectData');
            $query['result'] = $this->SelectData->teacher(); 
            $this->load->view('teacher',$query);       //html filename
       }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }
    public function teacherProfile($n)
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
            $query['result'] = $this->SelectData->teacherProfile($n,$ntype);
            $this->load->view('teacherProfile',$query);    //html filename
       }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }
    public function updateTeacherProfile($tid)
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
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
            foreach($ntype as $value){
                $query['dbtype'] = $value;
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
            $query['result'] = $this->SelectData->teacherProfile($tid,$ntype);
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

                $this->load->view('updateTeacherProfile',$query);    //html filename

            }else {
                 $this->load->helper('form');
                $db = $this->session->userdata('db');//load db      
            $this->load->database($db);//call db
                $this->load->model('AddData');
                $this->load->model('ProfileImg');
                $name = strtolower(preg_replace('/\s+/', '', $this->input->post('teachersname')));
                /*for img to be any format */
                if(!empty($_FILES['photo']['name'])){
                    $filename = explode(".",$_FILES['photo']['name']);
                    $extn = end($filename);
                    $img_address = 'assets/profile/'.$name.'.'.$extn;
                }
                else{
                    $img_address = $this->input->post('proImg');
                }
                $data = array(
                    't_ID' => $this->input->post('teacher_id'),
                    't_name' => $this->input->post('teachersname'),
                    't_fathername' => $this->input->post('surname'),
                    't_surname' => NULL,
                    't_gender' => $this->input->post('gender'),
                    't_dob' => $this->input->post('dob'),
                    't_email' => $this->input->post('email'),
                    't_contact' => $this->input->post('mobile'),
                    'qualification' => $this->input->post('qualification'),
                    'salary' => $this->input->post('salary'),
                    't_address' => $this->input->post('address'),
                    't_profile' => $img_address,
                    'join_date' => $this->input->post('joiningdate'),
                );
                $this->AddData->UpdateTeacherItem($data);
                $insert_id = $this->db->insert_id();
                $img = $_FILES['photo']['name']; 
                $this->ProfileImg->addImg($img,$name);
                if(!empty($this->input->post('subject'))){
                    $engi_branch = $this->input->post('engi_branch');
                    $engisemester = $this->input->post('engisemester');
                    $commerce_branch = $this->input->post('commerce_branch');
                    $semester1 = $this->input->post('semester1');
                    $stream = $this->input->post('stream');
                    if(!empty($engi_branch)){ $branch_name = $engi_branch;} 
                    else if(!empty($commerce_branch)){ $branch_name = $commerce_branch;}
                    else if(!empty($stream)){ $branch_name = $stream;}
                    else $branch_name = NULL;
                    if(!empty($engisemester)){ $semester_name = $engisemester;}
                    else if(!empty($semester1)){ $semester_name = $semester1;}
                    else $semester_name = NULL;
                    $subject = implode(",",$this->input->post('subject'));
                    $data1 = array(
                        'teacher_id' => $this->input->post('teacher_id'),
                        'subject_id'=> $subject,
                        'standard_name'=>$this->input->post('standard'),
                        'branch_name'=>$branch_name,
                        'semester_name'=>$semester_name
                    );
                    $this->AddData->UpdateTeacherSubjItem($data1);
                }
                $this->session->set_flashdata('success','You have Successfully submitted data.');
                redirect('Teacher_cont/teacher');  
            }
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }
    public function addTeacher()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
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
            foreach($ntype as $value){
                $query['dbtype'] = $value;
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


            //$query['result'] = $this->SelectData->course();
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

                    $this->load->view('addTeacher',$query);			//html filename

            }
            else
            {

                $this->load->helper('form');
                $db = $this->session->userdata('db');//load db      
            $this->load->database($db);//call db
                $this->load->model('AddData');
                $this->load->model('ProfileImg');
                $name = strtolower(preg_replace('/\s+/', '', $this->input->post('teachersname')));
                /*for img to be any extention*/
                $filename = explode(".",$_FILES['photo']['name']);
                    $extn = end($filename);
                $img_address = 'assets/profile/'.$name.'.'.$extn;
                //$t_name = explode(" ",$this->input->post('teachersname'));
                $data = array(
                    't_name' => $this->input->post('teachersname'),
                    't_fathername' => $this->input->post('surname'),
                    't_surname' => $t_name[2],
                    't_gender' => $this->input->post('gender'),
                    't_dob' => $this->input->post('dob'),
                    't_email' => $this->input->post('email'),
                    't_contact' => $this->input->post('mobile'),
                    'qualification' => $this->input->post('qualification'),
                    'salary' => $this->input->post('salary'),
                    't_address' => $this->input->post('address'),
                    't_profile' => $img_address,
                    'join_date' => $this->input->post('joiningdate'),
                    'salary_status' => 'unpaid'
                );
                $this->AddData->addTeacherItem($data);
                 $insert_id = $this->db->insert_id();
                $img = $_FILES['photo']['name'] ; 
                $this->ProfileImg->addImg($img,$name);
                $engi_branch = $this->input->post('engi_branch');
                $engisemester = $this->input->post('engisemester');
                $commerce_branch = $this->input->post('commerce_branch');
                $semester1 = $this->input->post('semester1');
                $stream = $this->input->post('stream');
                if(!empty($engi_branch)){ $branch_name = $engi_branch;} 
                else if(!empty($commerce_branch)){ $branch_name = $commerce_branch;}
                else if(!empty($stream)){ $branch_name = $stream;} 
                if(!empty($engisemester)){ $semester_name = $engisemester;}
                else if(!empty($semester1)){ $semester_name = $semester1;}
                $subject = implode(",",$this->input->post('subject'));
                $data1 = array(
                    'teacher_id' => $insert_id,
                    'subject_id'=> $subject,
                    'standard_name'=>$this->input->post('standard'),
                    'branch_name'=>$branch_name,
                    'semester_name'=>$semester_name
                );

                $this->AddData->addTeacherSubjItem($data1);
                $this->session->set_flashdata('success','You have Successfully submitted data.');
                redirect('Teacher_cont/addTeacher');   
            }
            }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }
    public function TeacherPaymentDetails(){
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $db = $this->session->userdata('db');//load db   
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['result'] =$this->SelectData->teacher();
        $this->form_validation->set_rules('teachername','teachername','numeric');
        $this->form_validation->set_rules('salary', 'salary', 'required|numeric');
        if($this->form_validation->run() == FALSE)
        {
            $this->load->helper('form');
            $this->load->model('AddData');
                if(date("m") == 2){
                    if(date("d") == 28){
                        $this->AddData->teacherpaymentDefault();
                    }
                }
                else if(date("m") == 1 ||date("m") == 3 ||date("m") == 5 ||date("m") == 7 ||date("m") == 8 ||date("m") == 10 ||date("m") == 12){
                    if(date("d") == 31){
                        $this->AddData->teacherpaymentDefault();
                    }
                }
                else{
                    if(date("d") == 30){
                        $this->AddData->teacherpaymentDefault();
                    }
                }
             $this->load->view('teacherPayment',$query);
        }
        else
         {
            $this->load->model('AddData');
            $data = array(
            'teacher_id'=> $this->input->post('teacherid'),
            'salary'=> $this->input->post('salary'),
            'payment_mode'=> $this->input->post('paymentmode'),
            'payment_date'=> $this->input->post('paymentdate'),
            'chq_no'=> $this->input->post('chq_no'),
            'bank_name'=> $this->input->post('bank_name'),
            'chq_date'=> $this->input->post('chq_date'),
            'transc_id'=> $this->input->post('transc_id'),
            ); 
            $this->AddData->teacherPaymentDetails($data);
            $this->session->set_flashdata('success','You have Successfully submitted data.');
            $this->load->database();
            $this->load->model('SelectData'); 
            $this->SelectData->teacher();
            $query['result'] =$this->SelectData->teacher();
             redirect('Teacher_cont/TeacherPaymentDetails',$query);   //html filename
      } 
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }
    public function TeacherPaymentHistory($id){
        $this->load->helper('url');
        $this->load->library('session');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $db = $this->session->userdata('db');//load db   
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['payhistory'] =$this->SelectData->teacherExpense($id);
        $this->load->view('teacherExpenseView',$query);
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
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