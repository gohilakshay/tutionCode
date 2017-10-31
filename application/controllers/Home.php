<?php
/* index page */
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
        $this->load->helper('form');    // load form helper
        $this->load->helper('url');     //load baseurl & siteurl helper
        $this->load->library('session');    // load session library
        $username = $this->session->userdata('username'); //set session username
        if(isset($username)){
            if(isset($_POST['signout'])){  
                $this->session->unset_userdata('username');     // destroy session
            $this->load->view('login');
            }
            else{ 
                $db = $this->session->userdata('db');  // set session for database
                $this->load->database($db);//to avoid no database error load inside if
                $this->load->view('mainPage'); //html page
            }
        }
        else{
            
            $this->session->unset_userdata('username'); // destroy session
            $this->load->view('login');  //html page   
        }
        
    } 
    /* delete databse */
    function DeleteLogout(){
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->session->unset_userdata('username'); //destroy session
            $this->load->view('login'); //html page   
    }
    /* load main page*/
    public function mainP()
    {
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        $db = $this->session->userdata('db');
        /* check for session */
        if(isset($username)){
            $this->load->database($db);//to avoid no database error load inside if
           // print_r($db); to check if db is working
            $this->load->view('mainPage');
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";  // if session dosent exist       
        }
       
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
        /* if superadmin */
        if(isset($_POST['addDb'])){
            /* ","  seperated multiple selected database type */
            $databasetype = implode(",",$this->input->post('databasetype')); 
            $db_data =array(
                'dbName' => $this->input->post('databasename'),
                'dbType' => $databasetype,
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $this->load->model('CreateTable');
            $this->CreateTable->addDb($db_data); // insert database values in admin 
            $this->session->set_flashdata('success','You have Successfully Created Database.');
        }
        $username = $this->session->userdata('username');
        $db = $this->session->userdata('db'); // select database type from session
        if(isset($username)){
            $this->load->database($db); // load selected database
            $this->load->view('createInitTable'); // html file
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
       
    }     
}