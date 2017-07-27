 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
class Expense_cont extends CI_Controller
{
    public function expense()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        $db = $this->session->userdata('db');
        if(isset($username)){
            $this->load->view('expense');           //html filename
        }else echo "Error 404 : Access Denied";      
    }
    public function staffDetails()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        if(isset($username)){
            $this->load->view('staffDetails');     //html filename
        }else echo "Error 404 : Access Denied"; 
    }
    public function updateStaffDetails()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        if(isset($username)){
            $this->load->view('updateStaffDetails');      //html filename
        }else echo "Error 404 : Access Denied"; 
    }
    public function staffPaymentDetails()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        if(isset($username)){
            $this->load->view('staffPaymentDetails');       //html filename
        }else echo "Error 404 : Access Denied";
    }
    public function meals()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('amt', 'amt', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $username = $this->session->userdata('username');
            if(isset($username)){
                $this->load->view('mealDetails');		//html filename	
            }else echo "Error 404 : Access Denied";
		}
		else
        {
            redirect('Expense_cont/meals');   	
		}
    }
    public function maintenance()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('amt', 'amt', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $username = $this->session->userdata('username');
            if(isset($username)){
                $this->load->view('maintenanceDetails');		//html filename	
            }else echo "Error 404 : Access Denied";
		}
		else
        {
            redirect('Expense_cont/maintenance');   	
		}
    }
    public function transport()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('amt', 'amt', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $username = $this->session->userdata('username');
            if(isset($username)){
                $this->load->view('transportDetails');       //html filename
            }else echo "Error 404 : Access Denied";
        }
		else
        {
            redirect('Expense_cont/transport');   	
		}
        
    }
    public function rent()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('amt', 'amt', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $username = $this->session->userdata('username');
            if(isset($username)){
                $this->load->view('rentDetails');		//html filename	
            }else echo "Error 404 : Access Denied";
		}
		else
        {
            redirect('Expense_cont/rent');   	
		}
    }
    public function utilities()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('amt', 'amt', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $username = $this->session->userdata('username');
            if(isset($username)){
                $this->load->view('utilitiesDetails');		//html filename	
            }else echo "Error 404 : Access Denied";
		}
		else
        {
            redirect('Expense_cont/utilities');   	
		}
    }
}
?>