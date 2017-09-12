<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload_FileCont extends CI_Controller
{ 
    public function upload(){
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        $db = $this->session->userdata('db');
        if(isset($username)){
            $this->load->view('UploadFile');
        }else echo "Error 404 : Access Denied";
    }
    public function uploadfile(){
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        echo $this->input->post('filename');
        $this->load->model('UploadFileModel');
        $name = strtolower(preg_replace('/\s+/', '', $this->input->post('filename')));
        $file_address = 'assets/profile/'.$name.'.jpg';
        $file = $_FILES['filename']['name'] ;
        $n = $this->UploadFileModel->addFile($file,$name);
        if($n == 1){
            $data = array(
                'filename' => $this->input->post('filename'),
                'discription'=>$this->input->post('description'),
                'date'=>$this->input->post('date'),
                'facultyname'=>$this->input->post('facultyname'),
                'fileLink'=>$file_address
            );
            $this->load->model('AddData');
            $this->AddData->uploadfile($data);
            redirect('Upload_FileCont/upload');
        }
        else
        {echo "<h1> Upload Failed </h1>" ;}
    }
}

?>