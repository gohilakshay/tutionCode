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
        $configdbfly['username'] = 'root'; /* Default db */
        $configdbfly['password'] = ''; /* Default db */
        $configdbfly['database'] = 'admin_db'; /* Default db */
        $this->load->database($configdbfly);
        /* session login*/
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->load->model('SelectData');
        $query = $this->SelectData->SuperadminSelect($username,$password);
        $query1['result'] = $this->SelectData->dbSelect();
       if($query == 1){
           $session = $this->session->set_userdata('username',$username);
           $this->load->view('createDatabse',$query1);
       }
        else if(isset($session)){
            $this->load->view('createDatabse',$query1);
        }
        else {
            $query = $this->SelectData->adminSelect($username,$password);
            if($query == 1){
                $session = $this->session->set_userdata('username',$username);
                $this->load->view('mainPage');
            }
            else {
                echo "Error 404 : Access Denied";
            }
        }
        /* session checked*/       
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