 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
class Expense_cont extends CI_Controller
{
    public function expense()
    {
        $this->load->helper('url');
        $this->load->view('expense');           //html filename
    }
    public function staffDetails()
    {
        $this->load->helper('url');
        $this->load->view('staffDetails');     //html filename
    }
    public function updateStaffDetails()
    {
        $this->load->helper('url');
        $this->load->view('updateStaffDetails');      //html filename
    }
    public function staffPaymentDetails()
    {
        $this->load->helper('url');
        $this->load->view('staffPaymentDetails');       //html filename
    }
    public function meals()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('amt', 'amt', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $this->load->view('mealDetails');		//html filename	
		}
		else
        {
            redirect('Expense_cont/meals');   	
		}
    }
    public function maintenance()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('amt', 'amt', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $this->load->view('maintenanceDetails');		//html filename	
		}
		else
        {
            redirect('Expense_cont/maintenance');   	
		}
    }
    public function transport()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('amt', 'amt', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $this->load->view('transportDetails');       //html filename		
        }
		else
        {
            redirect('Expense_cont/transport');   	
		}
        
    }
    public function rent()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('amt', 'amt', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $this->load->view('rentDetails');		//html filename	
		}
		else
        {
            redirect('Expense_cont/rent');   	
		}
    }
    public function utilities()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('amt', 'amt', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $this->load->view('utilitiesDetails');		//html filename	
		}
		else
        {
            redirect('Expense_cont/utilities');   	
		}
    }
}
?>