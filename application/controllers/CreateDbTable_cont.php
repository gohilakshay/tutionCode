<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class CreateDbTable_cont extends CI_Controller
{
    function standard()
    {
        $this->load->helper('form');
        $this->load->library('session');
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
    }
    function semester()
    {
        $this->load->helper('form');
        $this->load->library('session');
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
    }
    function branch()
    {
        $this->load->helper('form');
        $this->load->library('session');
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
    }
    function subject()
    {
        $this->load->helper('form');
        $this->load->library('session');
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
    }
    
}