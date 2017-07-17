<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_cont extends CI_Controller
{
    function add()
    {
    $this->load->helper('form');
    $this->load->database();
    $this->load->model('AddData');
    $data = array(
        'class_name' => $this->input->post('name'),
        'teacher_name' => $this->input->post('price')
    );
    $this->AddData->addItem($data);
    }   
}
?>