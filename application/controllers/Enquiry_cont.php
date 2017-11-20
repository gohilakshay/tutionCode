<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry_cont extends CI_Controller
{
	public function enquiry()
	{
        $this->load->library('session');
        $this->load->helper('url');
           $this->load->library('pagination');
        $username = $this->session->userdata('username');
        if(isset($username)){
            $db = $this->session->userdata('db');//load db      
            $this->load->database($db);//call db
            $this->load->model('SelectData');
            $limit = 10; 
            if (!empty($_GET['enquiryFilter'])) {
                $count = $this->SelectData->enquiryCount($_GET['enquiryFilter']);
                $studCount = $count->num_rows();
            }else if(!empty($_GET['extraSearch'])){
                $date = $_GET['todate'];
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
                 $date2 = $_GET['statusSearch'];
            $date3 = explode("/",$date2);
            if(!empty($date3[1])){
                $d = $date3[1];
                $m = $date3[0];
                $y = $date3[2];
                $date3 = $y.'-'.$m.'-'.$d; 
            }
            else{
                $date3 = $date3[0];
            }
                 $date4 = $_GET['fromDate'];
            $date5 = explode("/",$date4);
            if(!empty($date5[1])){
                $d = $date5[1];
                $m = $date5[0];
                $y = $date5[2];
                $date5 = $y.'-'.$m.'-'.$d; 
            }
            else{
                $date5 = $date5[0];
            }
                
                
                $count = $this->SelectData->enquirySearchCount($date1,$date5,$date3,$limit, $offset);
                $studCount = $count->num_rows();
            }
            else{
                
                $count = $this->SelectData->enquiry();
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
            if (!empty($_GET['enquiryFilter'])) {
                $count = $this->SelectData->enquiryCount($_GET['enquiryFilter'],$limit, $offset);
                $this->load->view('enquiry', array(
                    'totalResult' => $totalRecords,
                    'result' => $count->result(),
                    'links' => $links,
                    'offset' => $offset
                ));
            }else if(!empty($_GET['extraSearch'])){
                $count = $this->SelectData->enquirySearchCount($_GET['todate'],$_GET['fromDate'],$_GET['statusSearch'],$limit, $offset);
                $this->load->view('enquiry', array(
                    'totalResult' => $totalRecords,
                    'result' => $count->result(),
                    'links' => $links,
                    'offset' => $offset
                ));
            }
            else{
                
                $count = $this->SelectData->enquiry($limit, $offset);
               $this->load->view('enquiry', array(
                    'totalResult' => $totalRecords,
                    'result' => $count->result(),
                    'links' => $links,
                   'offset' => $offset
                ));
            }  
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        } 
    }
    public function enquiryReply($id)
    {
        $this->load->library('session');
        $this->load->helper('url');  
        $username = $this->session->userdata('username');
        if(isset($username)){
            $db = $this->session->userdata('db');//load db 
            $this->load->database($db);//call db
            $this->load->view('enquiryreply',$enquiry);      //html filename
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        } 
    }
    public function enquiryInfo($id)
    {
        $this->load->library('session');
        $this->load->helper('url');  
        $username = $this->session->userdata('username');
        if(isset($username)){
            $db = $this->session->userdata('db');//load db      
            $this->load->database($db);//call db
            $this->load->model('SelectData');
            $enquiry['result'] = $this->SelectData->enquiryselect($id);
            $this->load->view('enquiryInfo',$enquiry);      //html filename
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        } 
    }
    public function enquirySend()
    {
        if(isset($_POST['save'])){
            $this->load->library('session');
            $db = $this->session->userdata('db');//load db      
            $this->load->database($db);//call db
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('AddData');
            
            $date = $this->input->post('enq_date');
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
            $date2 = $this->input->post('followup_date');
            $date3 = explode("/",$date2);
            if(!empty($date3[1])){
                $d = $date3[1];
                $m = $date3[0];
                $y = $date3[2];
                $date3 = $y.'-'.$m.'-'.$d; 
            }
            else{
                $date3 = $date3[0];
            }
            
            $data = array (
                'name' => $this->input->post('enquirename'),
                'senderEmail' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'subject' => $this->input->post('subject'),
                'repledBy' => $this->input->post('repliedby'),
                'reply' => $this->input->post('reply'),
                'status' => $this->input->post('status'),
                'enq_date' => $date1,
                'fees' => $this->input->post('fees'),
                'reference' => $this->input->post('reference'),
                'college' => $this->input->post('college'),
                'gender' => $this->input->post('gender'),
                'query' => $this->input->post('query'),
                'address' => $this->input->post('address'),
                'followup_date' => $date3,
                'action' => 'saved'
            );
            $this->AddData->enquirySave($data);
            redirect('Enquiry_cont/enquiry');
        }
        else{
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->helper('form');
            $Name = $this->input->post('enquirename');
            $email = $this->input->post('email');
            $Phone = $this->input->post('mobile');
            $Subject = $this->input->post('subject');
            $replyBy = $this->input->post('repliedby');
            $Message = $this->input->post('reply');
            /*add the email sent data to db also*/
            $this->load->model('AddData');
            $date = $this->input->post('enq_date');
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
            $date2 = $this->input->post('followup_date');
            $date3 = explode("/",$date2);
            if(!empty($date3[1])){
                $d = $date3[1];
                $m = $date3[0];
                $y = $date3[2];
                $date3 = $y.'-'.$m.'-'.$d; 
            }
            else{
                $date3 = $date3[0];
            }
            $data = array (
                'name' => $this->input->post('enquirename'),
                'senderEmail' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'subject' => $this->input->post('subject'),
                'repledBy' => $this->input->post('repliedby'),
                'reply' => $this->input->post('reply'),
                'status' => $this->input->post('status'),
                'enq_date' => $date1,
                'fees' => $this->input->post('fees'),
                'reference' => $this->input->post('reference'),
                'college' => $this->input->post('college'),
                'query' => $this->input->post('query'),
                'address' => $this->input->post('address'),
                'followup_date' => $date3,
                'action'=>'sent'
            );
            $this->AddData->enquirySave($data);
        
        
        /*Send email API*/
        require("assets/classes/class.phpmailer.php");
	
        $mail = new PHPMailer(); // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
    //	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "mail.peaceinfotech.com"; 
         // $mail ->SMTPSecure = 'ssl';
      //  $mail ->Host = "smtp.gmail.com";
      //  $mail ->Port = 465; // or 587
      //  $mail ->IsHTML(true);// mail.smtp.com
        $mail->Port = 587; // or 587
        $mail->IsHTML(true);
        $mail->Username = "akshay@peaceinfotech.com";
        $mail->Password = "akshay321";
        $mail->SetFrom("akshay@peaceinfotech.com");
        $mail->Subject = "Enquiry";
        $mail->Body = " <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;

        }
        th, td {
        padding: 5px;
        text-align: left;    
        }
        </style>

        <table style='width:50%'>

        <tr><th>Name</th><td>$Name</td></tr>
        <tr><th>Email-Id</th><td>$email</td></tr>
        <tr><th>Phone</th><td>$Phone</td></tr>
        <tr><th>Subject</th><td>$Subject</td></tr>
        <tr><th>ReplyBy</th><td>$replyBy</td></tr>
        <tr><th>Message</th><td>$Message</td></tr>

        </table> 
          ";
        $mail->AddAddress('akshay@peaceinfotech.com');
        $mail->AddCC($email);

         if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
         } else {
            echo "<script type='text/javascript'>
              alert('Contacted successfully');
                </script>";
             redirect("Enquiry_cont/enquiry");
         }
        }
    }
    public function DeleteEnquiry(){
        $this->load->helper('url');
        $this->load->library('session');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $this->load->helper('form');
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('DeleteData'); // model for delete
        $e_id = $this->input->post("e_id");
        $this->DeleteData->DeleteEnqy($e_id); // call function from model
        if($this->db->affected_rows() > 0){
//            echo "<script>alert('deleted Successfully')</script>;";
            $name=site_url().'/Enquiry_cont/enquiry';
            echo "<script>window.location.href='$name';</script>"; 
        }
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        } 
    
    }
    public function updateEnquiry(){
        $this->load->helper('url');
        $this->load->library('session');
        $username = $this->session->userdata('username');
        if(isset($username)){
            $this->load->helper('form');
            $db = $this->session->userdata('db');//load db 
            $this->load->database($db);//call db
            $id = $this->input->post("e_id");
            $this->load->model('SelectData');
            $enquiry['result'] = $this->SelectData->enquiryselect($id);
            $this->load->view('enquiryInfo',$enquiry);
            if(isset($_POST['edit'])){
                $this->load->model('AddData');
                $date = $this->input->post('enq_date');
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
                $date2 = $this->input->post('followup_date');
                $date3 = explode("/",$date2);
                if(!empty($date3[1])){
                    $d = $date3[1];
                    $m = $date3[0];
                    $y = $date3[2];
                    $date3 = $y.'-'.$m.'-'.$d; 
                }
                else{
                    $date3 = $date3[0];
                }
                $data = array(
                    'enquiry_ID'=>$this->input->post("e_id"),
                    'name' => $this->input->post('enquirename'),
                    'senderEmail' => $this->input->post('email'),
                    'mobile' => $this->input->post('mobile'),
                    'subject' => $this->input->post('subject'),
                    'repledBy' => $this->input->post('repliedby'),
                    'reply' => $this->input->post('reply'),
                    'status' => $this->input->post('status'),
                    'enq_date' => $date1,
                    'fees' => $this->input->post('fees'),
                    'reference' => $this->input->post('reference'),
                    'college' => $this->input->post('college'),
                    'query' => $this->input->post('query'),
                    'address' => $this->input->post('address'),
                    'followup_date' => $date3
                );
                $this->AddData->UpdateEnq($data);
                $name=site_url().'/Enquiry_cont/enquiry';
                 $this->session->set_flashdata('success','You have Successfully submitted data.');
                echo "<script>window.location.href='$name';</script>";
            }/*else {
                $this->load->view('enquiryInfo',$enquiry);      //html filename      
            } */
    
        }
        else {
                $name=site_url().'/Home';
                echo "<script>window.location.href='$name';</script>";         
            }
    }
}