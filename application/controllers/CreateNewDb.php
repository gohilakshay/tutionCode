<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CreateNewDb extends CI_Controller
{
	public function createDb()
	{
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        //$this->load->database();
        //$this->db->database;
        $configdbfly=$this->config->config['sysdb'];
        $configdbfly['database'] = 'TutionCode'; /* Change db */
        $this->load->database($configdbfly);
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $this->load->model('SelectData');
        $query = $this->SelectData->adminSelect($username,$password);
       if($query == 1){
           $session = $this->session->set_userdata('username',$username);
           $this->load->view('createDatabse');
       }
        else if(isset($session)){
            $this->load->view('createDatabse');
        }
        else echo "Error 404 : Access Denied";
    }
    public function deleteDb()
	{
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        if(isset($username)){
		$this->load->view('deleteDatabase');        //html filename
         }else echo "Error 404 : Access Denied";      
    } 
}