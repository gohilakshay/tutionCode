<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedular_cont extends CI_Controller
{
	public function schedular()
	{
        $this->load->library('session');
        $this->load->helper('url');
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $username = $this->session->userdata('username');
        if(isset($username)){
            $this->load->view('schedular');
        }else echo "Error 404 : Access Denied";
    }
}
?>