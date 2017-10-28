<?php 
class DbCreate extends CI_Controller{
/* function create_db()
{
    $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
    $this->load->model('CreateTable');
    $this->CreateTable->create_db();
}*/   
function delete_db()
{
    $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
    $this->load->model('CreateTable');
    $this->CreateTable->delete_db();
}   
function table()
{
    $this->load->helper('url');
    $this->load->library('session');
    $username = $this->session->userdata('username');
    if(isset($username)){
    $db = $this->session->userdata('db');//load db      
    $this->load->database($db);//call db
    $this->load->model('CreateTable');
    //$this->CreateTable->create_branch();
    //$this->CreateTable->create_semester();
    //$this->CreateTable->create_engisubject();
    //$this->CreateTable->create_collegesubject();
    //$this->CreateTable->create_Commercesubject();
    $this->CreateTable->create_batch();
    $this->CreateTable->create_batch_student_mapping();
    $this->CreateTable->create_batch_course_mapping();
    $this->CreateTable->create_student_attend();
    $this->CreateTable->create_stud_attend_mapping();
    $this->CreateTable->create_stud_fee();
    $this->CreateTable->create_fee_stud_mapping();
    $this->CreateTable->create_fee_cal();
    $this->CreateTable->create_student_details();
    //$this->CreateTable->create_standard();
    //$this->CreateTable->create_field_semester();
    $this->CreateTable->create_field_std_mapping();
    $this->CreateTable->create_course();
    $this->CreateTable->create_schedules();
    $this->CreateTable->create_teacher();
    $this->CreateTable->create_teacher_expense();
    //$this->CreateTable->create_subject();
    $this->CreateTable->create_teacher_stubject_mapping();
    $this->CreateTable->create_test();
    $this->CreateTable->create_marks();
    $this->CreateTable->create_t_attend_mapping();
    $this->CreateTable->create_t_attend();
    $this->CreateTable->create_expense();
    $this->CreateTable->create_staff();
    $this->CreateTable->create_meals_entertain();
    $this->CreateTable->create_maintenance();
    $this->CreateTable->create_transport();
    $this->CreateTable->create_utilities();
    $this->CreateTable->create_staff_details();
    $this->CreateTable->create_rent();
    $this->CreateTable->createUpload();
    $this->CreateTable->createEnquiry();
    $this->CreateTable->createSms();
    $this->CreateTable->createImport();
    $this->CreateTable->createSmsBulk();
    $this->CreateTable->create_others();
    $this->CreateTable->createEvents();
    $this->load->view('mainPage');
    }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
}   
}
?>