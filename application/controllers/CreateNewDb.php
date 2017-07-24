<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CreateNewDb extends CI_Controller
{
	public function createDb()
	{
        $this->load->helper('form');
        $this->load->helper('url');
		$this->load->view('createDatabse');        //html filename
    }
    public function deleteDb()
	{
        $this->load->helper('form');
        $this->load->helper('url');
		$this->load->view('deleteDatabase');        //html filename
    } 
}