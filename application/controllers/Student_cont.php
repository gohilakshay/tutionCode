<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Student_cont extends CI_Controller
{
    public function student()
    {
        $this->load->library('session');
        $this->load->helper('url'); 
        $username = $this->session->userdata('username');
        if(isset($username)){
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['result'] = $this->SelectData->student();
        $query['result1'] = $this->SelectData->student_batch_map();
        $query['result2'] = $this->SelectData->ViewBatch();
        $this->load->view('student',$query);       //html filename
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";
        }
    }
    public function studentProfile($n)
    {
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['result'] = $this->SelectData->studentProfile($n);
        $this->load->view('studentProfile',$query);     //html filename
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";
        }
    }
    public function updateStudentProfile($n)
    {
        $this->load->library('session');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $db = $this->session->userdata('db');//load db 
        $this->load->library('form_validation');
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['result'] = $this->SelectData->studentProfile($n);
        $query['standard'] = $this->SelectData->standard(); 
        $query['ViewBatch'] = $this->SelectData->ViewBatch();
        
        //$this->form_validation->set_rules('surname', 'surname', 'callback_custom_Alpha');
        $this->form_validation->set_rules('studentname', 'studentname', 'callback_custom_Alpha');
        $this->form_validation->set_rules('fathername', 'fathername', 'callback_custom_Alpha');
        //$this->form_validation->set_rules('mothername', 'mothername', 'callback_custom_Alpha');
        $this->form_validation->set_rules('dob', 'dob', 'required');
        $this->form_validation->set_rules('email', 'email', 'valid_email');
        $this->form_validation->set_rules('contactnumber', 'contactnumber', 'required|numeric|exact_length[10]');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('admissionyear', 'admissionyear', 'required');
        $this->form_validation->set_rules('date', 'date', 'required');
        $this->form_validation->set_rules('school_college', 'school_college', 'required');
        $this->form_validation->set_message('custom_Alpha', 'Only Alphabets Allowed');
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('updateStudentProfile',$query);   //html filename
        }else{
             $this->load->helper('form');
            $db = $this->session->userdata('db');//load db 
            $this->load->database($db);//call db
            $this->load->model('AddData');
            $this->load->model('ProfileImg');
            $name = strtolower(preg_replace('/\s+/', '', $this->input->post('studentname')));
            /*for img to be any extention*/
            if(!empty($_FILES['photo']['name'])){
                $filename = explode(".",$_FILES['photo']['name']);
                $extn = end($filename);
                $img_address = 'assets/profile/'.$name.'.'.$extn;
            }
            else{
               $img_address = $this->input->post('proImg');
            }
                
            $data = array(
                'stud_ID' => $this->input->post('stud_id'),
                'stud_surname' => $this->input->post('surname'),
                'stud_name' => $this->input->post('studentname'),
                'father_name' => $this->input->post('fathername'),
                'mother_name' => $this->input->post('mothername'),
                'stud_gender' => $this->input->post('gender'),
                'stud_dob' => $this->input->post('dob'),
                'stud_email' => $this->input->post('email'),
                'stud_contact' => $this->input->post('contactnumber'),
                'stud_address' => $this->input->post('address'),
                'stud_profile' => $img_address,
                'admission_year' => $this->input->post('admissionyear'),
                'admission_date' => $this->input->post('date'),
                'course_type' => $this->input->post('course_type'),
                'sch_coll_name' => $this->input->post('school_college'),
                'board' => $this->input->post('board'),
                // 'batch_id' => $this->input->post('batch'),
                // 'batch_timing' => $this->input->post('batch_timing'),
                 'standard_name' => $this->input->post('standard'),
                //'place' => $this->input->post('place'),
                'form_date' => $this->input->post('date')
                
            );
            $batch_edit = array(
                'stud_ID' => $this->input->post('stud_id'),
                'batch_id' => $this->input->post('batch'));
            $img = $_FILES['photo']['name'] ; 
            $this->ProfileImg->addImg($img,$name);
             $this->AddData->UpdateStudentItem($data,$batch_edit);
            $this->session->set_flashdata('success','You have Successfully submitted data.');
           redirect('Student_cont/student'); 
        }
            }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";
        }

    }
    public function addStudent()
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
        $query['result'] = $this->SelectData->ViewBatch();
        foreach($ntype as $value){
            $query['result1'] = $this->SelectData->standard(); 
            $query['result2'] = $this->SelectData->branch();
            if($value == 'school'){
                $query['result3'] = $this->SelectData->subject();
            }
            else if($value == 'jrcolg_sci'){
                $query['result3'] = $this->SelectData->jrColgSci();
            }
            else if($value == 'jrcolg_com'){
                $query['result3'] = $this->SelectData->jrColgCom();
            }
            else if($value == 'jrcolg_art'){
                $query['result3'] = $this->SelectData->jrColgArt();
            }
            else if($value == 'engicolg'){ 
                $query['result3'] = $this->SelectData->engisubject();
            }
            else if($value == 'comcolg'){ 
                $query['result3'] = $this->SelectData->commercesubject();
            }
        }
        
        //$this->form_validation->set_rules('surname', 'surname', 'callback_custom_Alpha');
        $this->form_validation->set_rules('studentname', 'studentname', 'callback_custom_Alpha');
        $this->form_validation->set_rules('fathername', 'fathername', 'callback_custom_Alpha');
        //$this->form_validation->set_rules('mothername', 'mothername', 'callback_custom_Alpha');
        $this->form_validation->set_rules('dob', 'dob', 'required');
        $this->form_validation->set_rules('email', 'email', 'valid_email');
        $this->form_validation->set_rules('contactnumber', 'contactnumber', 'required|numeric|exact_length[10]');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('admissionyear', 'admissionyear', 'required');
        $this->form_validation->set_rules('date', 'date', 'required');
        $this->form_validation->set_rules('school_college', 'school_college', 'required');
        $this->form_validation->set_rules('total_fees', 'total_fees', 'required|numeric');
        $this->form_validation->set_rules('discount', 'discount', 'required|numeric');
        $this->form_validation->set_rules('final', 'final', 'required|numeric');
        $this->form_validation->set_rules('received', 'received', 'required|numeric');
        $this->form_validation->set_rules('balance', 'balance', 'required|numeric');
          $this->form_validation->set_message('custom_Alpha', 'Only Alphabets Allowed');
        $this->form_validation->set_rules('place', 'place', 'required');
        $this->form_validation->set_rules('date', 'date', 'required');
        if($this->form_validation->run() == FALSE)
        { 
            $this->load->view('addStudent',$query);
        }
        else
        {
            $this->load->helper('form');
            $db = $this->session->userdata('db');//load db 
            $this->load->database($db);//call db
            $this->load->model('AddData');
            $this->load->model('ProfileImg');
            $name = strtolower(preg_replace('/\s+/', '', $this->input->post('studentname')));
            /*for img to be any extention*/
                $filename = explode(".",$_FILES['photo']['name']);
                    $extn = end($filename);
                $img_address = 'assets/profile/'.$name.'.'.$extn;
            $data = array(
                'stud_surname' => $this->input->post('surname'),
                'stud_name' => $this->input->post('studentname'),
                'father_name' => $this->input->post('fathername'),
                'mother_name' => $this->input->post('mothername'),
                'stud_gender' => $this->input->post('gender'),
                'stud_dob' => $this->input->post('dob'),
                'stud_email' => $this->input->post('email'),
                'stud_contact' => $this->input->post('contactnumber'),
                'stud_address' => $this->input->post('address'),
                'stud_profile' => $img_address,
                'admission_year' => $this->input->post('admissionyear'),
                'admission_date' => $this->input->post('date'),
                'course_type' => $this->input->post('course_type'),
                'sch_coll_name' => $this->input->post('school_college'),
                'board' => $this->input->post('board'),
                // 'batch_id' => $this->input->post('batch'),
                // 'batch_timing' => $this->input->post('batch_timing'),
                 'standard_name' => $this->input->post('standard'),
                'place' => $this->input->post('place'),
                'form_date' => $this->input->post('date')
                
            );
            $img = $_FILES['photo']['name'] ; 
            $this->ProfileImg->addImg($img,$name);
             $this->AddData->addStudentItem($data);
            $n = $this->db->insert_id();
            $data1 = array(
                'stud_ID'=>$n,
            	'total_fee' => $this->input->post('total_fees'),
                'installment_option' => $this->input->post('Installment'),
                'installment_type' => $this->input->post('installmenttype'),
                'discount' => $this->input->post('discount'),
                'final_fee' => $this->input->post('final'),
                'amountper_installment' => $this->input->post('result'),
                'payment_mode' => $this->input->post('paymentmode'),
                'recieved_fee' => $this->input->post('received'),
                'balance_fee' => $this->input->post('balance'),
                'chq_date' => $this->input->post('chq_date'),
                'bank_name' => $this->input->post('bank_name'),
                'chq_no' => $this->input->post('chq_no'),
                'transc_id' => $this->input->post('transc_id'),
                );
            $this->AddData->addStudentfeeItem($data1);
             $batch = array(
                 'batch_id' => $this->input->post('batch'),
                 'stud_ID'=>$n
                           );
            $this->AddData->addStudentBatchItem($batch);
            $this->session->set_flashdata('success','You have Successfully submitted data.');
            redirect('Student_cont/addStudent'); 
        }
            }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";
        }
    }
    public function custom_Alpha($strrr) 
        {
            if ( !preg_match('/^[a-zA-Z ]+$/i',$strrr) )
            {
                return false;
            }
        }  
     public function feeDetail($table)
    {
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        if(isset($username)){
            $db = $this->session->userdata('db');//load db 
            $this->load->database($db);//call db
            $this->load->model('SelectData');
            $query['result'] = $this->SelectData->student_detail_fee($table);
            $this->load->view('feeDetail',$query);         //html filename
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";
        }
    }
    public function Payfee(){
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        if(isset($username)){
            $db = $this->session->userdata('db');//load db 
            $this->load->database($db);//call db
            $this->load->model('AddData');
            $this->load->model('SelectData');
            $studentid = $this->input->post('studentid');
            $input_name = $studentname = preg_replace('/\s+/', '',strtolower($this->input->post('studentname')));
            $amount=$this->input->post('amount');
            $query = $this->SelectData->studentProfile($studentid);
            $stud_name = $query[0]->stud_surname.$query[0]->stud_name.$query[0]->father_name.$query[0]->mother_name;
            if($input_name == $stud_name){
                $recieved_fee = $amount + $query[2]->recieved_fee."<br>";
                $balance_fee =  $query[2]->balance_fee - $amount;
                $data = array(
                    'stud_id' => $studentid,
                    'recieved_fee' => $recieved_fee,
                    'balance_fee' => $balance_fee,
                );
                $this->AddData->updateStudFee($data);
                redirect('Student_cont/feeDetail/3');         //html filename
            }else echo "<h2>Error : Student ID and Name does not Match</h2>";
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";
        }
    }
}
?>