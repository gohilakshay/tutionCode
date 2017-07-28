<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Student_cont extends CI_Controller
{
    public function student()
    {
        $this->load->library('session');
        $this->load->helper('url'); 
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['result'] = $this->SelectData->student();
        $username = $this->session->userdata('username');
        if(isset($username)){
            $this->load->view('student',$query);       //html filename
        }else echo "Error 404 : Access Denied";
    }
    public function studentProfile($n)
    {
        $this->load->library('session');
        $this->load->helper('url');
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['result'] = $this->SelectData->studentProfile($n);
        $username = $this->session->userdata('username');
        if(isset($username)){
            $this->load->view('studentProfile',$query);     //html filename
        }else echo "Error 404 : Access Denied";
    }
    public function updateStudentProfile()
    {
        $this->load->library('session');
        $this->load->helper('url');  
        $username = $this->session->userdata('username');
        if(isset($username)){
            $this->load->view('updateStudentProfile');   //html filename
        }else echo "Error 404 : Access Denied";  
    }
    public function addStudent()
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
        $n = count($ntype);
        $query['result'] = $this->SelectData->ViewBatch();
        foreach($ntype as $value){
            $query['result1'] = $this->SelectData->standard(); 
            $query['result2'] = $this->SelectData->branch();
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
        
        $this->form_validation->set_rules('surname', 'surname', 'callback_custom_Alpha');
        $this->form_validation->set_rules('studentname', 'studentname', 'callback_custom_Alpha');
        $this->form_validation->set_rules('fathername', 'fathername', 'callback_custom_Alpha');
        $this->form_validation->set_rules('mothername', 'mothername', 'callback_custom_Alpha');
        $this->form_validation->set_rules('dob', 'dob', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
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
            $username = $this->session->userdata('username');
            if(isset($username)){
                $this->load->view('addStudent',$query);
            }else echo "Error 404 : Access Denied";
                    
        }
        else
        {
            $this->load->helper('form');
            $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
            $this->load->model('AddData');
            $this->load->model('ProfileImg');
            $name = strtolower(preg_replace('/\s+/', '', $this->input->post('studentname')));
            $img_address = 'assets/profile/'.$name.'.jpg';
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
                );
            $this->AddData->addStudentfeeItem($data1);
             $batch = array(
                 'batch_id' => $this->input->post('batch'),
                 'stud_ID'=>$n
                           );
            $this->AddData->addStudentBatchItem($batch);
            redirect('Student_cont/addStudent');      
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
       $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['result'] = $this->SelectData->student_detail_fee($table);
        $username = $this->session->userdata('username');
        if(isset($username)){
            $this->load->view('feeDetail',$query);         //html filename
        }else echo "Error 404 : Access Denied";
    }
}
?>