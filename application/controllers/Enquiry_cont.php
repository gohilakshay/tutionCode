<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry_cont extends CI_Controller
{
	public function enquiry()
	{
        $this->load->helper('url');
		$this->load->view('enquiry');
    }
    public function enquiryReply()
    {
        $this->load->helper('url');  
        $this->load->view('enquiryreply');      //html filename
    }     
}