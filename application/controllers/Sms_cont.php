<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_cont extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
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
        $query['bulksms'] = $this->SelectData->ViewBulkSms();
        $this->load->view('sms',$query);        //html filename
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }
    public function sendSMS($button1)
    {
        $this->load->library('session');
        $this->load->helper('url');  
        $this->load->library('form_validation');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        if($button1==3){
            $query['button2'] = $button1;
            if(isset($_POST['excel_submit'])){
            $this->load->model('AddData');
             $filename = $_FILES['excel_file']["tmp_name"];
            $file = fopen($filename, "r");
             while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
             {
                    $data = array(
                        'name' => $importdata[0],
                        'contact' =>$importdata[1],
                        'location' =>$importdata[2],
                        'created_date' => date('Y-m-d'),
                        'list_name' => $this->input->post('list_name'),
                        );
                 $this->AddData->insertCSV($data);
             }                    
            fclose($file);
            
            $this->session->set_flashdata('success', 'Imported successfully !!!!');
               $this->load->view('sendSMS',$query);
            }
            $query['ListContact'] = $this->SelectData->ListContactView();
           $query['importContact'] = $this->SelectData->ImportContactView();
            $this->load->view('sendSMS',$query);
            
        }
            else if($button1==4){
                $query['button2'] = $button1;
                $query['ListContact'] = $this->SelectData->ListContactView();
                $ListName = $this->input->post('listSelect');
                $query['importContact'] = $this->SelectData->ImportContactView($ListName);
                $this->load->view('sendSMS',$query);
            }
        else{    
        $query['result'] = $this->SelectData->ViewBatch();
        $query['teacher'] = $this->SelectData->teacher();
            $query['button2'] = $button1;
        //array_push($query['result'],$button1);
            if($_POST['batch']){
        $this->form_validation->set_rules('batch', 'batch', 'required');
            }/*if($_POST['teacher']){
        $this->form_validation->set_rules('teacher', 'teacher', 'required');
            }*/
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
        }
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }  
    /*for student */
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
        $password = "1234@";
        //Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = "classG";
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
            $pcontac[] = $c[2];
               $student[] = $c[1];
        }
        //Multiple mobiles numbers separated by comma
        
        if($send == 'both'){
            $mobileS = implode(",",$contac);
            $mobileP = implode(",",$pcontac);
            $mobileNumber = $mobileP.",".$mobileS;
        }
        else if($send == 'parents'){
            $mobileP = implode(",",$pcontac);
            $mobileNumber = $mobileP;
        }
        else{
            $mobileS = implode(",",$contac);
            $mobileNumber = $mobileS;
        }
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
            redirect('Sms_cont/sendSMS/1');
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
    /*for techer */
    public function sendTeacherSMSSender()
    {
        $this->load->library('session');
        $this->load->helper('url');  
        $this->load->library('form_validation');
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('AddData');
        //Your authentication key
        $username = "peaceinfotech";
        $password = "1234@";
        //Sender ID,While using route4 sender id should be 6 characters long.
        $clasname = $this->db->database;
        $patterns = array (
          '/\W+/', // match any non-alpha-numeric character sequence, except underscores
          '/\d+/', // match any number of decimal digits
          '/_+/',  // match any number of underscores
          '/\s+/'  // match any number of white spaces
        );

        $replaces = array (
          '', // remove
          '', // remove
          '', // remove
          ' ' // leave only 1 space
        );
        $SendId = trim(preg_replace($patterns, $replaces, strip_tags($clasname) ) );
        
         $senderId = substr($SendId,0,6);
         $teacher_IDname = $this->input->post('teacherid');
         $contact = $this->input->post('t_contact');
        //$student = $this->input->post('student');
        //$send = $this->input->post('send');
        $route = $this->input->post('route');
         $message = $this->input->post('msg'); //Your message to send, Add URL encoding here.
        $i=0;
        foreach($contact as $value){
            $c = explode(",",$value);
            $contac[] = $c[0];
               $teacher_name[] = $c[1];
        }
        //Multiple mobiles numbers separated by comma
        $mobileNumber = implode(",",$contac);
        $teacher_name = implode(",",$teacher_name);
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
                //'batch'=>$batch_IDname,
                'teacher_name'=>$teacher_name,
                'teacher_cont'=>$mobileNumber,
                //'sms_sent_to'=>$send,
                'message'=>$message,
                'date'=>date('Y-m-d'),
                'time'=>date('H:i:s', strtotime('+5 hours,+30 minutes')),
                'status'=>'sent'
            );
            $this->AddData->smsAdd($data);    
            redirect('Sms_cont/sendSMS/2');
        }
        else 
        {
            $result = (explode(" ",$output));
            if($result[0] == 'msg-id'){
                $data = array(
               // 'batch'=>$batch_IDname,
                'teacher_name'=>$teacher_name,
                'teacher_cont'=>$mobileNumber,
                //'sms_sent_to'=>$send,
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
    /*for bulk sms*/
    function sendBulkSMSSender(){
        $this->load->library('session');
        $this->load->helper('url');  
        $this->load->library('form_validation');
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('AddData');
        //Your authentication key
        $username = "peaceinfotech";
        $password = "1234@";
        //Sender ID,While using route4 sender id should be 6 characters long.
         $senderId = "classG";
        // $teacher_IDname = $this->input->post('teacherid');
         $contact = $this->input->post('contact');
        //$student = $this->input->post('student');
        //$send = $this->input->post('send');
        $route = $this->input->post('route');
         $message = $this->input->post('msg'); //Your message to send, Add URL encoding here.
        $i=0;
        foreach($contact as $value){
            $c = explode(",",$value);
            $contac[] = $c[0];
               $cont_name[] = $c[1];
        }
        //Multiple mobiles numbers separated by comma
        $mobileNumber = implode(",",$contac);
        $cont_name = implode(",",$cont_name);
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
                //'batch'=>$batch_IDname,
                'cont_name'=>$cont_name,
                'contact'=>$mobileNumber,
                //'sms_sent_to'=>$send,
                'message'=>$message,
                'date'=>date('Y-m-d'),
                'time'=>date('H:i:s', strtotime('+5 hours,+30 minutes')),
                'status'=>'sent'
            );
            $this->AddData->smsBulkAdd($data);    
            redirect('Sms_cont/sendSMS/4');
        }
        else 
        {
            $result = (explode(" ",$output));
            if($result[0] == 'msg-id'){
                $data = array(
               // 'batch'=>$batch_IDname,
                'cont_name'=>$cont_name,
                'contact'=>$mobileNumber,
                //'sms_sent_to'=>$send,
                'message'=>$message,
                'date'=>date('Y-m-d'),
                'time'=>date('H:i:s', strtotime('+5 hours,+30 minutes')),
                'status'=>'failed'
               );
            $this->AddData->smsBulkAdd($data);
            echo $output;
            }
        }
    }
    function filterDate(){
        $this->load->helper('url');
        $this->load->library('session');
        $username = $this->session->userdata('username');
        if(isset($username)){  
        $this->load->library('form_validation');
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $to = $this->input->post('to');
        $from = $this->input->post('from');
        $query['result'] = $this->SelectData->filterByDate($to,$from);
        $this->load->view('sms',$query);
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }     
    }
    function successSms(){
        $this->load->library('session');
        $this->load->helper('url'); 
        $username = $this->session->userdata('username');
        if(isset($username)){ 
        $this->load->library('form_validation');
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['result'] = $this->SelectData->ViewSms();
        $query['bulksms'] = $this->SelectData->ViewBulkSms();
        $this->load->view('sucSms',$query);
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }  
    }
    function failesSms(){
        $this->load->library('session');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        if(isset($username)){  
        $this->load->library('form_validation');
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['result'] = $this->SelectData->ViewSms();
        $query['bulksms'] = $this->SelectData->ViewBulkSms();    
        $this->load->view('failedSms',$query);
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }
    }
    function DeleteList(){
        $this->load->helper('url');
        $this->load->library('session');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $this->load->helper('form');
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('deleteData'); // model for delete
        $listName = $this->input->post("listName");
        $this->deleteData->DeleteList($listName); // call function from model
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', 'Deleted successfully !!!!');
            redirect('Sms_cont/sendSMS/3'); 
        }
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        } 
    }
}