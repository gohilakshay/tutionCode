<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_cont extends CI_Controller
{
	public function smsDetails()
	{
        $this->load->helper('url');
		$this->load->view('sms');        //html filename
    }
    public function sendSMS()
    {
        $this->load->helper('url');  
        $this->load->view('sendSMS');      //html filename
    }     
}