<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
class Scheduler_cont extends CI_Controller
{
     public function index()
    {
          $this->load->library('session');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
            $this->load->view('scheduler.php');
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
     }
}