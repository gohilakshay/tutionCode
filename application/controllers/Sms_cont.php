<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_cont extends CI_Controller
{
	public function smsDetails()
	{
        $this->load->library('session');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        if(isset($username)){
            $this->load->view('sms');        //html filename
        }else echo "Error 404 : Access Denied";
    }
    public function sendSMS()
    {
        $this->load->library('session');
        $this->load->helper('url');  
        $username = $this->session->userdata('username');
        if(isset($username)){
            $this->load->view('sendSMS');      //html filename
        }else echo "Error 404 : Access Denied";
    }     
}