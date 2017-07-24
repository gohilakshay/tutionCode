<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry_cont extends CI_Controller
{
	public function enquiry()
	{
        $this->load->library('session');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        if(isset($username)){
            $this->load->view('enquiry');
        }else echo "Error 404 : Access Denied";
    }
    public function enquiryReply()
    {
        $this->load->library('session');
        $this->load->helper('url');  
        $username = $this->session->userdata('username');
        if(isset($username)){
            $this->load->view('enquiryreply');      //html filename
        }else echo "Error 404 : Access Denied";
    }     
}