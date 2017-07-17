<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
class Marks_cont extends CI_Controller
{
    public function addMarks()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('testid', 'testid', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $this->load->view('addMarks');			//html filename
		}
		else
        {
            redirect('Test/addMarks');   	
		}
    }
    public function marks()
    {
        $this->load->helper('url');
        $this->load->view('addMarks');         //html filename
    }
}
?>