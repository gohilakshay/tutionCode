<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry_cont extends CI_Controller
{
	public function enquiry()
	{
        $this->load->library('session');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        if(isset($username)){
            $db = $this->session->userdata('db');//load db      
            $this->load->database($db);//call db
            $this->load->model('SelectData');
            $enquiry['result'] = $this->SelectData->enquiry();
            $this->load->view('enquiry',$enquiry);
        }else echo "Error 404 : Access Denied";
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
        }else echo "Error 404 : Access Denied";
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
        }else echo "Error 404 : Access Denied";
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
            $data = array (
                'name' => $this->input->post('enquirename'),
                'senderEmail' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'subject' => $this->input->post('subject'),
                'repledBy' => $this->input->post('repliedby'),
                'reply' => $this->input->post('reply'),
                'status' => $this->input->post('status'),
                'enq_date' => $this->input->post('enq_date'),
                'fees' => $this->input->post('fees'),
                'reference' => $this->input->post('reference'),
                'college' => $this->input->post('college'),
                'gender' => $this->input->post('gender'),
                'query' => $this->input->post('query'),
                'address' => $this->input->post('address'),
                'followup_date' => $this->input->post('followup_date'),
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
            $data = array (
                'name' => $this->input->post('enquirename'),
                'senderEmail' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'subject' => $this->input->post('subject'),
                'repledBy' => $this->input->post('repliedby'),
                'reply' => $this->input->post('reply'),
                'status' => $this->input->post('status'),
                'enq_date' => $this->input->post('enq_date'),
                'fees' => $this->input->post('fees'),
                'reference' => $this->input->post('reference'),
                'college' => $this->input->post('college'),
                'query' => $this->input->post('query'),
                'address' => $this->input->post('address'),
                'followup_date' => $this->input->post('followup_date'),
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
            echo "<script>alert('deleted Successfully')</script>;";
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
                $data = array(
                    'enquiry_ID'=>$this->input->post("e_id"),
                    'name' => $this->input->post('enquirename'),
                    'senderEmail' => $this->input->post('email'),
                    'mobile' => $this->input->post('mobile'),
                    'subject' => $this->input->post('subject'),
                    'repledBy' => $this->input->post('repliedby'),
                    'reply' => $this->input->post('reply'),
                    'status' => $this->input->post('status'),
                    'enq_date' => $this->input->post('enq_date'),
                    'fees' => $this->input->post('fees'),
                    'reference' => $this->input->post('reference'),
                    'college' => $this->input->post('college'),
                    'query' => $this->input->post('query'),
                    'address' => $this->input->post('address'),
                    'followup_date' => $this->input->post('followup_date')
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