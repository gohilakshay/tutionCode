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
        $this->load->helper('url');  
        $this->load->library('session');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->load->database();
        $this->load->model('SelectData');
        $query = $this->SelectData->adminSelect($username,$password);
       if($query == 1){
           $session = $this->session->set_userdata('username',$username);
           $this->load->view('mainPage');
       }
        else if(isset($session)){
            $this->load->view('mainPage');
        }
        else echo "Error 404 : Access Denied";
    }     
}