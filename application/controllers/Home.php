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
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        if(isset($username)){
            $this->load->view('mainPage');
        }else echo "Error 404 : Access Denied";
       
    }     
}