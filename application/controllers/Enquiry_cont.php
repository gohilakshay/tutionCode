<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry_cont extends CI_Controller
{
	public function enquiry()
	{
        $this->load->library('session');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $enquiry['result'] = $this->SelectData->enquiry();
        if(isset($username)){
            $this->load->view('enquiry',$enquiry);
        }else echo "Error 404 : Access Denied";
    }
    public function enquiryReply($id)
    {
        $this->load->library('session');
        $this->load->helper('url');  
        $username = $this->session->userdata('username');
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $enquiry['result'] = $this->SelectData->enquiryselect($id);
        if(isset($username)){
           // $this->session->set_flashdata('success','You have Successfully submitted data.');
            $this->load->view('enquiryreply',$enquiry);      //html filename
        }else echo "Error 404 : Access Denied";
    }
    public function enquirySend()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $Name = $this->input->post('enquirename');
        $email = $this->input->post('email');
        $Phone = $this->input->post('mobile');
        $Subject = $this->input->post('subject');
        $replyBy = $this->input->post('repliedby');
        $Message = $this->input->post('reply');
        
        
        
        
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