<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_cont extends CI_Controller
{
	public function smsDetails()
	{
        $this->load->library('session');
        $this->load->helper('url');  
        $this->load->library('form_validation');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('SelectData');  
        $query['result'] = $this->SelectData->ViewSms();
        $this->load->view('sms',$query);        //html filename
        }else echo "Error 404 : Access Denied";
    }
    public function sendSMS()
    {
        $this->load->library('session');
        $this->load->helper('url');  
        $this->load->library('form_validation');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('SelectData');  
        $query['result'] = $this->SelectData->ViewBatch();
        $this->form_validation->set_rules('batch', 'batch', 'required');
        if($this->form_validation->run() == FALSE)
        {
           $this->load->view('sendSMS',$query);		//html filename
        }
        else
        {  
            $id = $this->input->post('batch');
            $query['result1'] = $this->SelectData->stud_attend_map($id,1);
            $this->load->view('sendSMS',$query);		//html filename
        }       
        }else echo "Error 404 : Access Denied";   
    }  
    public function sendSMSSender()
    {
        $this->load->library('session');
        $this->load->helper('url');  
        $this->load->library('form_validation');
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('AddData');
        //Your authentication key
        $username = "peaceinfotech";
        $password = "peaceinfotech";
        //Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = "akshay";
        $batch_IDname = $this->input->post('batch');
        $contact = $this->input->post('contact');
        $student = $this->input->post('student');
        $send = $this->input->post('send');
        $route = $this->input->post('route');
         $message = $this->input->post('msg'); //Your message to send, Add URL encoding here.
        
        $i=0;
        foreach($contact as $value){
            $c = explode(",",$value);
            $contac[] = $c[0];
               $student[] = $c[1];
        }
        //Multiple mobiles numbers separated by comma
        $mobileNumber = implode(",",$contac);
        $student = implode(",",$student);
        //Define route 
        $route = 3;
        //Prepare you post parameters
        $postData = array(
            'username' => $username,
            'password' => $password,
            'number' => $mobileNumber,
            'message' => $message,
            'senderid' => $senderId,
            'route' => $route
        );
        //API URL
        $url="http://text.bluemedia.in/http-api.php";

        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
        ));

        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        //get response
        $output = curl_exec($ch);
        //Print error if any
        if(curl_errno($ch))
        {
            echo 'error:' . curl_error($ch);
        }
        curl_close($ch);
        $result = (explode(" ",$output));
            if($result[0] == 'msg-id'){
                $data = array(
                'batch'=>$batch_IDname,
                'student_name'=>$student,
                'student_cont'=>$mobileNumber,
                'sms_sent_to'=>$send,
                'message'=>$message,
                'date'=>date('Y-m-d'),
                'time'=>date('H:i:s', strtotime('+5 hours,+30 minutes')),
                'status'=>'sent'
            );
            $this->AddData->smsAdd($data);    
            redirect('Sms_cont/sendSMS');
        }
        else 
        {
            $result = (explode(" ",$output));
            if($result[0] == 'msg-id'){
                $data = array(
                'batch'=>$batch_IDname,
                'student_name'=>$student,
                'student_cont'=>$mobileNumber,
                'sms_sent_to'=>$send,
                'message'=>$message,
                'date'=>date('Y-m-d'),
                'time'=>date('H:i:s', strtotime('+5 hours,+30 minutes')),
                'status'=>'failed'
               );
            $this->AddData->smsAdd($data);
            echo $output;
            }
        }
     }
    function filterDate(){
        $this->load->library('session');
        $this->load->helper('url');  
        $this->load->library('form_validation');
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $to = $this->input->post('to');
        $from = $this->input->post('from');
        $query['result'] = $this->SelectData->filterByDate($to,$from);
        $this->load->view('sms',$query);
    }
    function successSms(){
        $this->load->library('session');
        $this->load->helper('url');  
        $this->load->library('form_validation');
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['result'] = $this->SelectData->ViewSms();
        $this->load->view('sucSms',$query);
    }
    function failesSms(){
        $this->load->library('session');
        $this->load->helper('url');  
        $this->load->library('form_validation');
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['result'] = $this->SelectData->ViewSms();
        $this->load->view('failedSms',$query);
    }
}