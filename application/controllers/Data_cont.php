<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_cont extends CI_Controller
{
    function add()
    {
    $this->load->helper('form');
    $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
    $this->load->model('AddData');
    $data = array(
        'class_name' => $this->input->post('name'),
        'teacher_name' => $this->input->post('price')
    );
    $this->AddData->addItem($data);
    }   
}
?>