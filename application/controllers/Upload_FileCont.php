<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload_FileCont extends CI_Controller
{ 
    public function upload(){
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
         $this->load->library('pagination');
        $username = $this->session->userdata('username');
        if(isset($username)){
            $db = $this->session->userdata('db');
            $this->load->database($db);
            $this->load->model('SelectData');
//            $uploadView['files'] = $this->SelectData->uploadView();
            
            $limit = 10; 
            if (!empty($_GET['uploadFilter'])) {
                $count = $this->SelectData->uploadViewCount($_GET['uploadFilter']);
                $studCount = $count->num_rows();
            }else{
                
                $count = $this->SelectData->uploadView1();
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
           if (!empty($_GET['uploadFilter'])) {
                $count = $this->SelectData->uploadViewCount($_GET['uploadFilter'],$limit, $offset);
               $this->load->view('UploadFile', array(
                    'totalResult' => $totalRecords,
                    'files' => $count->result(),
                    'links' => $links,
                   'offset' => $offset
                ));
            }else{
                
                $count = $this->SelectData->uploadView1($limit, $offset);
               $this->load->view('UploadFile', array(
                    'totalResult' => $totalRecords,
                    'files' => $count->result(),
                    'links' => $links,
                   'offset' => $offset
                ));
            } 
            
//            $this->load->view('UploadFile',$uploadView);
        }else echo "Error 404 : Access Denied";
    }
    public function uploadfile(){
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->input->post('filename');
        $file_typeArray = $_FILES['filename']['name'] ;
        $extintion = end(explode(".",$file_typeArray));
        $this->load->model('UploadFileModel');
        $name = strtolower(preg_replace('/\s+/', '', $this->input->post('filename')));
        $file_address = 'assets/upload/'.$name.'.'.$extintion;
        $file = $_FILES['filename']['name'] ;
        $n = $this->UploadFileModel->addFile($file,$name);
        print_r($n);
        if($n == 1){
              $date = $this->input->post('date');
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
                'filename' => $this->input->post('filename'),
                'discription'=>$this->input->post('description'),
                'date'=>$date1,
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
    function DeleteUploads(){
        $this->load->helper('url');
        $this->load->library('session');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $this->load->helper('form');
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('deleteData'); // model for delete
        $upload_id = $this->input->post("upload_id");
        $result = $this->deleteData->deleteUpload($upload_id); // call function from model
            $this->session->set_flashdata('success','You have Successfully Deleted data.');
            redirect('Upload_FileCont/upload'); 
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        } 
    }
}

?>