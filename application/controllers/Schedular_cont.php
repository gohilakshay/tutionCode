<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedular_cont extends CI_Controller
{
	public function schedular()
	{
        $this->load->helper('url');
		$this->load->view('schedular');
    }
}