<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
class Test_cont extends CI_Controller
{
    public function addTest()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('testid', 'testid', 'required|numeric');
		$this->form_validation->set_rules('totalmarks', 'totalmarks', 'required|numeric');
		$this->form_validation->set_rules('passingmarks', 'passingmarks', 'required|numeric');
        $this->form_validation->set_rules('batchname', 'batchname', 'required|alpha_dash');
		$this->form_validation->set_rules('subject', 'subject', 'callback_customAlpha');
		$this->form_validation->set_rules('supervisorname', 'supervisorname', 'callback_customAlpha');
        $this->form_validation->set_message('customAlpha', 'Only Alphabets Allowed');
        $this->form_validation->set_message('alpha_dash','Please enter in the following format eg:IX-1');
		if($this->form_validation->run() == FALSE)
		{
            $this->load->view('addTest');		//html filename	
		}
		else
        {
            redirect('Test/addTest');   	
		}
    }
    public function testDetails()
    {
        $this->load->helper('url');
        $this->load->view('addTest');         //html filename
    }
}
?>