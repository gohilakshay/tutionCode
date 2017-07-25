<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CreateNewDb extends CI_Controller
{
	public function createDb()
	{
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        /* select multiple db start */
        $configdbfly=$this->config->config['sysdb'];
        $configdbfly['database'] = 'admin_db'; /* Change db */
        $this->load->database($configdbfly);
        $this->load->model('SelectDb');
        $new = 'tutioncode';
        $db = $this->SelectDb->select($new); //tutionCode db name
        $this->db->close(); //close previous connection
        $configdbfly['database'] = $db;
        $this->load->database($configdbfly);
        /* multi dp end; db selected*/
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