<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
        $this->load->helper('form');
        $this->load->helper('url');
		$this->load->view('login');
    }
    public function mainP()
    {
        $this->load->helper('url');  
        $this->load->view('mainPage');      //html filename
    }     
}