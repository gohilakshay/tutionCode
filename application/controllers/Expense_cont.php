 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
class Expense_cont extends CI_Controller
{
    public function expense()
    {
        $this->load->helper('url');
        $this->load->library('session');
        $username = $this->session->userdata('username');
        if(isset($username)){
            $db = $this->session->userdata('db');//load db   
            $this->load->database($db);//call db
            $this->load->view('expense');
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }
    public function staffDetails()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('pagination');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $db = $this->session->userdata('db');//load db   
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        //$query['result']=$this->SelectData->staff();
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
             $limit = 10; 
            if (!empty($_GET['staffFilter'])) {
                $count = $this->SelectData->StaffCount($_GET['staffFilter']);
                $studCount = $count->num_rows();
            }else{
                
                $count = $this->SelectData->staff();
                $studCount = $count->num_rows();
            }
            $totalRecords = $count->num_rows();
            $config["total_rows"] = $totalRecords;
            $config["per_page"] = $limit;
            $config['use_page_numbers'] = TRUE;
            $config['page_query_string'] = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['num_links'] = 5;
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] ="</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";
            $config['first_url'] = '?per_page=1'; 
            $this->pagination->initialize($config);
            $str_links = $this->pagination->create_links();
            $links = explode('&nbsp;', $str_links);
            $offset = 0;
            if (!empty($_GET['per_page'])) {
                $pageNo = $_GET['per_page'];
                $offset = ($pageNo - 1) * $limit;
            }
           if (!empty($_GET['staffFilter'])) {
                $count = $this->SelectData->StaffCount($_GET['staffFilter'],$limit, $offset);
               $this->load->view('staffDetails', array(
                    'totalResult' => $totalRecords,
                    'result' => $count->result(),
                    'links' => $links,
                    'offset' => $offset
                   
                ));
            }
            else{
                $count = $this->SelectData->staff($limit, $offset);
                $this->load->view('staffDetails', array(
                    'totalResult' => $totalRecords,
                    'result' => $count->result(),
                    'links' => $links,
                    'offset' => $offset
                ));
            }        
         //   $this->load->view('staffDetails',$query);
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
            $this->session->set_flashdata('success','You have Successfully submitted data.');
            redirect('Expense_cont/staffDetails');
        }//html filename
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }
    public function updateStaffDetails()
    {
        $this->load->helper('url');
        $this->load->library('session');
        $username = $this->session->userdata('username');
        if(isset($username)){
            $db = $this->session->userdata('db');//load db   
            $this->load->database($db);//call db
            $this->load->view('expense');
        $this->load->view('updateStaffDetails');
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }
    public function staffPaymentDetails()
    {
       
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $username = $this->session->userdata('username');
        if(isset($username)){
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
             $date = $this->input->post('paymentdate');
             $date1 = explode("/",$date);
             if(!empty($date1[1])){
                 $d = $date1[1];
                 $m = $date1[0];
                 $y = $date1[2];
                 $date1 = $y.'-'.$m.'-'.$d; 
             }
             else{
                 $date1 = $date1[0];
             }
            $data = array(
                'staff_name'=> $this->input->post('staffname'),
                'salary'=> $this->input->post('staffsalary'),
                'payment_mode'=> $this->input->post('paymentmode'),
                'payment_date'=> $date1,
            ); 
            $this->AddData->staffPaymentDetails($data);
            $this->session->set_flashdata('success','You have Successfully submitted data.');
            $this->load->database();
            $this->load->model('SelectData'); 
            $this->SelectData->staffPaidDetails();
            $query['result'] =$this->SelectData->staffPaidDetails();
             redirect('Expense_cont/staffPaymentDetails',$query);   //html filename
      } 
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }
    public function meals()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('pagination');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $db = $this->session->userdata('db');//load db   
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        //$query['result']=$this->SelectData->mealsentertain();
        $this->load->library('form_validation');
		$this->form_validation->set_rules('amt', 'amt', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $limit = 10; 
            if (!empty($_GET['mealFilter'])) {
                $count = $this->SelectData->MealsentertainCount($_GET['mealFilter']);
                $studCount = $count->num_rows();
            }else{
                
                $count = $this->SelectData->mealsentertain();
                $studCount = $count->num_rows();
            }
            $totalRecords = $count->num_rows();
            $config["total_rows"] = $totalRecords;
            $config["per_page"] = $limit;
            $config['use_page_numbers'] = TRUE;
            $config['page_query_string'] = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['num_links'] = 5;
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] ="</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";
            $config['first_url'] = '?per_page=1'; 
            $this->pagination->initialize($config);
            $str_links = $this->pagination->create_links();
            $links = explode('&nbsp;', $str_links);
            $offset = 0;
            if (!empty($_GET['per_page'])) {
                $pageNo = $_GET['per_page'];
                $offset = ($pageNo - 1) * $limit;
            }
           if (!empty($_GET['mealFilter'])) {
                $count = $this->SelectData->MealsentertainCount($_GET['mealFilter'],$limit, $offset);
               $this->load->view('mealDetails', array(
                    'totalResult' => $totalRecords,
                    'result' => $count->result(),
                    'links' => $links,
                    'offset' => $offset
                   
                ));
            }
            else{
                $count = $this->SelectData->mealsentertain($limit, $offset);
                $this->load->view('mealDetails', array(
                    'totalResult' => $totalRecords,
                    'result' => $count->result(),
                    'links' => $links,
                    'offset' => $offset
                ));
            }
         //   $this->load->view('mealDetails',$query);		//html filename	
		}
		else
        {
            $this->load->helper('form');
            
            $this->load->model('AddData');
            $date = $this->input->post('paymentdate');
            $date1 = explode("/",$date);
            if(!empty($date1[1])){
                $d = $date1[1];
                $m = $date1[0];
                $y = $date1[2];
                $date1 = $y.'-'.$m.'-'.$d; 
            }
            else{
                $date1 = $date1[0];
            }
            $data = array(
            'message'=> $this->input->post('message'),
            'amount'=> $this->input->post('amt'),
            'payment_mode'=> $this->input->post('paymentmode'),
            'payment_date'=> $date1,
            );
            $this->AddData-> mealsDetails($data);
            $this->session->set_flashdata('success','You have Successfully submitted data.');
            redirect('Expense_cont/meals');   	
		}
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }
    public function maintenance()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('pagination');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $db = $this->session->userdata('db');//load db   
        $this->load->database($db);//call db
        $this->load->model('SelectData');
       // $query['result']=$this->SelectData->maintenance();
       
		$this->form_validation->set_rules('amt', 'amt', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $limit = 10; 
            if (!empty($_GET['maintainFilter'])) {
                $count = $this->SelectData->MaintenanceCount($_GET['maintainFilter']);
                $studCount = $count->num_rows();
            }else{
                
                $count = $this->SelectData->maintenance();
                $studCount = $count->num_rows();
            }
            $totalRecords = $count->num_rows();
            $config["total_rows"] = $totalRecords;
            $config["per_page"] = $limit;
            $config['use_page_numbers'] = TRUE;
            $config['page_query_string'] = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['num_links'] = 5;
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] ="</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";
            $config['first_url'] = '?per_page=1'; 
            $this->pagination->initialize($config);
            $str_links = $this->pagination->create_links();
            $links = explode('&nbsp;', $str_links);
            $offset = 0;
            if (!empty($_GET['per_page'])) {
                $pageNo = $_GET['per_page'];
                $offset = ($pageNo - 1) * $limit;
            }
           if (!empty($_GET['maintainFilter'])) {
                $count = $this->SelectData->MaintenanceCount($_GET['maintainFilter'],$limit, $offset);
               $this->load->view('maintenanceDetails', array(
                    'totalResult' => $totalRecords,
                    'result' => $count->result(),
                    'links' => $links,
                    'offset' => $offset
                   
                ));
            }
            else{
                $count = $this->SelectData->maintenance($limit, $offset);
                $this->load->view('maintenanceDetails', array(
                    'totalResult' => $totalRecords,
                    'result' => $count->result(),
                    'links' => $links,
                    'offset' => $offset
                ));
            }
          //  $this->load->view('maintenanceDetails',$query);		//html filename	
		}
		else
        {
            $this->load->helper('form');
            $this->load->model('AddData');
            $date = $this->input->post('paymentdate');
            $date1 = explode("/",$date);
            if(!empty($date1[1])){
                $d = $date1[1];
                $m = $date1[0];
                $y = $date1[2];
                $date1 = $y.'-'.$m.'-'.$d; 
            }
            else{
                $date1 = $date1[0];
            }
            $data = array(
            'title'=> $this->input->post('title'),
            'amount'=> $this->input->post('amt'),
            'payment_mode'=> $this->input->post('paymentmode'),
            'payment_date'=> $date1,
            );
            $this->AddData->maintenanceDetails($data);
            $this->session->set_flashdata('success','You have Successfully submitted data.');
            redirect('Expense_cont/maintenance');   	
		}
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }
    public function transport()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('pagination');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $db = $this->session->userdata('db');//load db   
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        //$query['result']=$this->SelectData->transport();
        $this->load->library('form_validation');
		$this->form_validation->set_rules('amt', 'amt', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $limit = 10; 
            if (!empty($_GET['transportFilter'])) {
                $count = $this->SelectData->TransportCount($_GET['transportFilter']);
                $studCount = $count->num_rows();
            }else{
                
                $count = $this->SelectData->transport();
                $studCount = $count->num_rows();
            }
            $totalRecords = $count->num_rows();
            $config["total_rows"] = $totalRecords;
            $config["per_page"] = $limit;
            $config['use_page_numbers'] = TRUE;
            $config['page_query_string'] = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['num_links'] = 5;
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] ="</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";
            $config['first_url'] = '?per_page=1'; 
            $this->pagination->initialize($config);
            $str_links = $this->pagination->create_links();
            $links = explode('&nbsp;', $str_links);
            $offset = 0;
            if (!empty($_GET['per_page'])) {
                $pageNo = $_GET['per_page'];
                $offset = ($pageNo - 1) * $limit;
            }
           if (!empty($_GET['transportFilter'])) {
                $count = $this->SelectData->TransportCount($_GET['transportFilter'],$limit, $offset);
               $this->load->view('transportDetails', array(
                    'totalResult' => $totalRecords,
                    'result' => $count->result(),
                    'links' => $links,
                    'offset' => $offset
                   
                ));
            }
            else{
                $count = $this->SelectData->transport($limit, $offset);
                $this->load->view('transportDetails', array(
                    'totalResult' => $totalRecords,
                    'result' => $count->result(),
                    'links' => $links,
                    'offset' => $offset
                ));
            }
         //   $this->load->view('transportDetails',$query);       //html filename		
        }
		else
        {
            $this->load->helper('form');
           
            $this->load->model('AddData');
            $date = $this->input->post('paymentdate');
            $date1 = explode("/",$date);
            if(!empty($date1[1])){
                $d = $date1[1];
                $m = $date1[0];
                $y = $date1[2];
                $date1 = $y.'-'.$m.'-'.$d; 
            }
            else{
                $date1 = $date1[0];
            }
            $data = array(
            'title'=> $this->input->post('title'),
            'amount'=> $this->input->post('amt'),
            'payment_mode'=> $this->input->post('paymentmode'),
            'payment_date'=> $date1,
            );
            $this->AddData->transportDetails($data);
            $this->session->set_flashdata('success','You have Successfully submitted data.');
            redirect('Expense_cont/transport');   	
		}
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }
    public function rent()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('pagination');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $db = $this->session->userdata('db');//load db   
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        //$query['result']=$this->SelectData->rent();
        $this->load->library('form_validation');
		$this->form_validation->set_rules('amt', 'amt', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $limit = 10; 
            if (!empty($_GET['rentFilter'])) {
                $count = $this->SelectData->RentCount($_GET['rentFilter']);
                $studCount = $count->num_rows();
            }else{
                
                $count = $this->SelectData->rent();
                $studCount = $count->num_rows();
            }
            $totalRecords = $count->num_rows();
            $config["total_rows"] = $totalRecords;
            $config["per_page"] = $limit;
            $config['use_page_numbers'] = TRUE;
            $config['page_query_string'] = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['num_links'] = 5;
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] ="</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";
            $config['first_url'] = '?per_page=1'; 
            $this->pagination->initialize($config);
            $str_links = $this->pagination->create_links();
            $links = explode('&nbsp;', $str_links);
            $offset = 0;
            if (!empty($_GET['per_page'])) {
                $pageNo = $_GET['per_page'];
                $offset = ($pageNo - 1) * $limit;
            }
           if (!empty($_GET['rentFilter'])) {
                $count = $this->SelectData->RentCount($_GET['rentFilter'],$limit, $offset);
               $this->load->view('rentDetails', array(
                    'totalResult' => $totalRecords,
                    'result' => $count->result(),
                    'links' => $links,
                    'offset' => $offset
                   
                ));
            }
            else{
                $count = $this->SelectData->rent($limit, $offset);
                $this->load->view('rentDetails', array(
                    'totalResult' => $totalRecords,
                    'result' => $count->result(),
                    'links' => $links,
                    'offset' => $offset
                ));
            }
           // $this->load->view('rentDetails',$query);		//html filename	
		}
		else
        {
             $this->load->helper('form');
           
            $this->load->model('AddData');
            $date = $this->input->post('paymentdate');
            $date1 = explode("/",$date);
            if(!empty($date1[1])){
                $d = $date1[1];
                $m = $date1[0];
                $y = $date1[2];
                $date1 = $y.'-'.$m.'-'.$d; 
            }
            else{
                $date1 = $date1[0];
            }
            $data = array(
            'title'=> $this->input->post('title'),
            'amount'=> $this->input->post('amt'),
            'payment_mode'=> $this->input->post('paymentmode'),
            'payment_date'=> $date1,
            );
            $this->AddData->rentDetails($data);
            $this->session->set_flashdata('success','You have Successfully submitted data.');
            redirect('Expense_cont/rent');   	
		}
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }
    public function utilities()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('pagination');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $db = $this->session->userdata('db');//load db   
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        //$query['result']=$this->SelectData->utilities();
        $this->load->library('form_validation');
		$this->form_validation->set_rules('amt', 'amt', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $limit = 10; 
            if (!empty($_GET['utilityFilter'])) {
                $count = $this->SelectData->UtilitiesCount($_GET['utilityFilter']);
                $studCount = $count->num_rows();
            }else{
                
                $count = $this->SelectData->utilities();
                $studCount = $count->num_rows();
            }
            $totalRecords = $count->num_rows();
            $config["total_rows"] = $totalRecords;
            $config["per_page"] = $limit;
            $config['use_page_numbers'] = TRUE;
            $config['page_query_string'] = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['num_links'] = 5;
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] ="</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";
            $config['first_url'] = '?per_page=1'; 
            $this->pagination->initialize($config);
            $str_links = $this->pagination->create_links();
            $links = explode('&nbsp;', $str_links);
            $offset = 0;
            if (!empty($_GET['per_page'])) {
                $pageNo = $_GET['per_page'];
                $offset = ($pageNo - 1) * $limit;
            }
           if (!empty($_GET['utilityFilter'])) {
                $count = $this->SelectData->UtilitiesCount($_GET['utilityFilter'],$limit, $offset);
               $this->load->view('utilitiesDetails', array(
                    'totalResult' => $totalRecords,
                    'result' => $count->result(),
                    'links' => $links,
                //   'result1' => $this->SelectData->SelectBatchCourse(),
                    'offset' => $offset
                   
                ));
            }
            else{
                $count = $this->SelectData->utilities($limit, $offset);
                $this->load->view('utilitiesDetails', array(
                    'totalResult' => $totalRecords,
                    'result' => $count->result(),
                    'links' => $links,
                   // 'result1' => $this->SelectData->SelectBatchCourse(),
                    'offset' => $offset
                ));
            }
          //  $this->load->view('utilitiesDetails',$query);		//html filename	
		}
		else
        {   
            $this->load->helper('form');
            $this->load->model('AddData');
            $date = $this->input->post('paymentdate');
            $date1 = explode("/",$date);
            if(!empty($date1[1])){
                $d = $date1[1];
                $m = $date1[0];
                $y = $date1[2];
                $date1 = $y.'-'.$m.'-'.$d; 
            }
            else{
                $date1 = $date1[0];
            }
            $data = array(
            'title'=> $this->input->post('title'),
            'amount'=> $this->input->post('amt'),
            'payment_mode'=> $this->input->post('paymentmode'),
            'payment_date'=> $date1,
            );
            $this->AddData->utilitiesDetails($data);
            $this->session->set_flashdata('success','You have Successfully submitted data.');
            redirect('Expense_cont/utilities');   	
		}
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
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