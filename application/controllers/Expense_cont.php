 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
class Expense_cont extends CI_Controller
{
    public function expense()
    {
        $this->load->helper('url');
        $this->load->view('expense');           //html filename
    }

    // public function staff()
    // {
    //     $this->load->helper('url');  
    //     $this->load->database();
    //     $this->load->model('StaffData');
    //     $query['result']=$this->StaffData->staff();
    //     // print_r($query);
    //     $this->load->view('staffDetails',$query);   
    // }
    // public function staffpayment()
    // {
    //     $this->load->helper('url');
    //     // $this->load->library('form_validation');
    //     $this->load->database();
    //     $this->load->model('SelectData');
    //     $query['result'] =$this->SelectData->staffpayment();
    //     // print_r($query);
    //     $this->load->view('staffPaymentDetails',$query);
          
    // }
    public function staffDetails()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $db = $this->session->userdata('db');//load db   
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['result']=$this->SelectData->staff();
        $this->form_validation->set_rules('staffname','staffname','callback_custom_Alpha');
        $this->form_validation->set_rules('staffcontact', 'staffcontact', 'required|numeric|exact_length[10]');
        $this->form_validation->set_rules('staffaddress', 'staffaddress', 'required');  
        if($this->form_validation->run() == FALSE)
        {
            $this->load->helper('form');
            $this->load->model('AddData');
                if(date("m") == 2){
                    if(date("d") == 28){
                        $this->AddData->staffpaymentDefault();
                    }
                }
                else if(date("m") == 1 ||date("m") == 3 ||date("m") == 5 ||date("m") == 7 ||date("m") == 8 ||date("m") == 10 ||date("m") == 12){
                    if(date("d") == 31){
                        $this->AddData->staffpaymentDefault();
                    }
                }
                else{
                    if(date("d") == 30){
                        $this->AddData->staffpaymentDefault();
                    }
                }
                    
            $this->load->view('staffDetails',$query);
        }
        else
        {
            $this->load->helper('form');
            $this->load->model('AddData');
            $data = array(
            'staff_name'=> $this->input->post('staffname'),
            'staff_salary'=> $this->input->post('staffsalary'),
            'staff_contact'=> $this->input->post('staffcontact'),
            'staff_address'=> $this->input->post('staffaddress'),
            'status'=> 'unpaid'
            );
             $this->AddData->staffDetails($data);
             redirect('Expense_cont/staffDetails');
        }//html filename
    }
    public function updateStaffDetails()
    {
        $this->load->helper('url');
         $this->load->view('updateStaffDetails');
       
    }
    public function staffPaymentDetails()
    {
       
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $db = $this->session->userdata('db');//load db   
        $this->load->database($db);//call db
        
        $this->load->model('SelectData');
        $query['result'] =$this->SelectData->staff();
        
        
        $this->form_validation->set_rules('staffname','staffname','callback_custom_Alpha');
        $this->form_validation->set_rules('staffsalary', 'staffsalary', 'required|numeric');
        if($this->form_validation->run() == FALSE)
        {
             $this->load->view('staffPaymentDetails',$query);
        }
        else
         {
            $this->load->model('AddData');
            $data = array(
            'staff_name'=> $this->input->post('staffname'),
            'salary'=> $this->input->post('staffsalary'),
            'payment_mode'=> $this->input->post('paymentmode'),
            'payment_date'=> $this->input->post('paymentdate'),
            ); 
            $this->AddData->staffPaymentDetails($data);
            
            $this->load->database();
            $this->load->model('SelectData'); 
            $this->SelectData->staffPaidDetails($data);
            $query['result'] =$this->SelectData->staffPaidDetails($data);
             redirect('Expense_cont/staffPaymentDetails',$query);   //html filename
      } 
    }
    public function meals()
    {
        $this->load->helper('url');
         $this->load->library('form_validation');
        $this->load->library('session');
        $db = $this->session->userdata('db');//load db   
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['result']=$this->SelectData->mealsentertain();
        $this->load->library('form_validation');
		$this->form_validation->set_rules('amt', 'amt', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $this->load->view('mealDetails',$query);		//html filename	
		}
		else
        {
            $this->load->helper('form');
            
            $this->load->model('AddData');
            $data = array(
            'message'=> $this->input->post('message'),
            'amount'=> $this->input->post('amt'),
            'payment_mode'=> $this->input->post('paymentmode'),
            'payment_date'=> $this->input->post('paymentdate'),
            );



            $this->AddData-> mealsDetails($data);
            redirect('Expense_cont/meals');   	
		}
    }
    public function maintenance()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $db = $this->session->userdata('db');//load db   
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['result']=$this->SelectData->maintenance();
       
		$this->form_validation->set_rules('amt', 'amt', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $this->load->view('maintenanceDetails',$query);		//html filename	
		}
		else
        {
            $this->load->helper('form');
           
            $this->load->model('AddData');
            $data = array(
            'title'=> $this->input->post('title'),
            'amount'=> $this->input->post('amt'),
            'payment_mode'=> $this->input->post('paymentmode'),
            'payment_date'=> $this->input->post('paymentdate'),
            );



            $this->AddData->maintenanceDetails($data);
            redirect('Expense_cont/maintenance');   	
		}
    }
    public function transport()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $db = $this->session->userdata('db');//load db   
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['result']=$this->SelectData->transport();
        $this->load->library('form_validation');
		$this->form_validation->set_rules('amt', 'amt', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $this->load->view('transportDetails',$query);       //html filename		
        }
		else
        {
            $this->load->helper('form');
           
            $this->load->model('AddData');
            $data = array(
            'title'=> $this->input->post('title'),
            'amount'=> $this->input->post('amt'),
            'payment_mode'=> $this->input->post('paymentmode'),
            'payment_date'=> $this->input->post('paymentdate'),
            );



            $this->AddData->transportDetails($data);
            redirect('Expense_cont/transport');   	
		}
        
    }
    public function rent()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $db = $this->session->userdata('db');//load db   
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['result']=$this->SelectData->rent();
        $this->load->library('form_validation');
		$this->form_validation->set_rules('amt', 'amt', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $this->load->view('rentDetails',$query);		//html filename	
		}
		else
        {
             $this->load->helper('form');
           
            $this->load->model('AddData');
            $data = array(
            'title'=> $this->input->post('title'),
            'amount'=> $this->input->post('amt'),
            'payment_mode'=> $this->input->post('paymentmode'),
            'payment_date'=> $this->input->post('paymentdate'),
            );
            $this->AddData->rentDetails($data);
            redirect('Expense_cont/rent');   	
		}
    }
    public function utilities()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $db = $this->session->userdata('db');//load db   
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['result']=$this->SelectData->utilities();
        $this->load->library('form_validation');
		$this->form_validation->set_rules('amt', 'amt', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $this->load->view('utilitiesDetails',$query);		//html filename	
		}
		else
        {   
            $this->load->helper('form');
            
            $this->load->model('AddData');
            $data = array(
            'title'=> $this->input->post('title'),
            'amount'=> $this->input->post('amt'),
            'payment_mode'=> $this->input->post('paymentmode'),
            'payment_date'=> $this->input->post('paymentdate'),
            );



            $this->AddData->utilitiesDetails($data);
            redirect('Expense_cont/utilities');   	
		}
    }

     public function custom_Alpha($strrr) 
        {
            if ( !preg_match('/^[a-zA-Z ]+$/i',$strrr) )
            {
                return false;
            }
        }  
}
?>