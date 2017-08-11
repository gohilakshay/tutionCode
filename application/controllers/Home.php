<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->session->unset_userdata('username'); 
        $this->load->view('login');
    }
    public function mainP()
    {
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        $db = $this->session->userdata('db');
        $this->load->database($db);
        if(isset($username)){
            $this->load->view('mainPage');
        }else echo "Error 404 : Access Denied";
       
    }
    public function tomainP()
    {
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        /*Encryption starts*/
        /*$str = $this->input->post('password'); 
        $salt = "JafeelAhmed";
        $enc = sha1($salt);
        $s = $str.$enc;
        $password = md5($s);*/
        /*Encryption ends*/
        if(isset($_POST['addDb'])){
            $db_data =array(
                'dbName' => $this->input->post('databasename'),
                'dbType' => $this->input->post('databasetype'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $this->load->model('CreateTable');
            $this->CreateTable->addDb($db_data);
            $this->session->set_flashdata('success','You have Successfully Created Database.');
        }
        $username = $this->session->userdata('username');
        $db = $this->session->userdata('db');
        $this->load->database($db);
        if(isset($username)){
            $this->load->view('createInitTable');
        }else echo "Error 404 : Access Denied";
       
    }     
}