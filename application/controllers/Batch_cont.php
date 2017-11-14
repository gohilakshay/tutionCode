<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Batch_cont extends CI_Controller
{
    
    public function addBatch()
    {
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $db = $this->session->userdata('db');//load db 
        $username = $this->session->userdata('username');
        if(isset($username)){
            $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['result'] = $this->SelectData->ViewBatch();
        $query['result1'] = $this->SelectData->SelectBatchCourse(); 
        $this->form_validation->set_rules('batchname', 'batchname', 'required');
        $this->form_validation->set_rules('batch_timing', 'batch_timing', 'required');
        if($this->form_validation->run() == FALSE)
        {           
            $limit = 10; 
            if (!empty($_GET['batchFilter'])) {
                $count = $this->SelectData->BatchCount($_GET['batchFilter']);
                $studCount = $count->num_rows();
            }else{

                $count = $this->SelectData->batch();
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
           if (!empty($_GET['batchFilter'])) {
                $count = $this->SelectData->BatchCount($_GET['batchFilter'],$limit, $offset);
               $this->load->view('addBatches', array(
                    'totalResult' => $totalRecords,
                    'result' => $count->result(),
                    'links' => $links,
                   'result1' => $this->SelectData->SelectBatchCourse(),
                    'offset' => $offset

                ));
            }
            else{

                    $count = $this->SelectData->batch($limit, $offset);
                   $this->load->view('addBatches', array(
                        'totalResult' => $totalRecords,
                        'result' => $count->result(),
                        'links' => $links,
                       'result1' => $this->SelectData->SelectBatchCourse(),
                        'offset' => $offset

                    ));
            }
        }
        else
        {
            $this->load->helper('form');
            $db = $this->session->userdata('db');//load db      
            $this->load->database($db);//call db
            $this->load->model('AddData');
            $data = array(
                'batch_name' => $this->input->post('batchname'),
                'batch_timing' => $this->input->post('batch_timing'),
                'course_name' => $this->input->post('course')
            );
            $val = $this->AddData->addBatchItem($data);
            if($val == 0){
                $this->session->set_flashdata('success','Batch Already Exits.');
                redirect('Batch_cont/addBatch');  
            }
            else{
                $this->session->set_flashdata('success','You have Successfully submitted data.');
                redirect('Batch_cont/addBatch'); 
            }     
        }
        }
        else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        } 
        
    }


    public function updateBatches()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['result1'] = $this->SelectData->SelectBatchCourse();
        $this->form_validation->set_rules('batchname', 'batchname', 'required');
        $this->form_validation->set_rules('batch_timing', 'batch_timing', 'required');
        
        if($this->form_validation->run() == FALSE)
        {
            $batch_id = $this->input->post('batch_id');
            $query['result'] = $this->SelectData->UpdateBatch($batch_id);
            $this->load->view('updateBatches',$query);   //html filename
        }
        else
        {
            $this->load->helper('form');
            $db = $this->session->userdata('db');//load db      
            $this->load->database($db);//call db
            $this->load->model('AddData');
            $data = array(
                'batch_ID' => $this->input->post('batch_id'), 
                'batch_name' => $this->input->post('batchname'),
                'batch_timing' => $this->input->post('batch_timing'),
                'course_name' => $this->input->post('course')
            );
            $this->AddData->UpdateBatchItem($data);
            $this->session->set_flashdata('success','You have Successfully submitted data.');
            redirect('Batch_cont/addBatch');      
        }
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        }  
    }
    public function DeleteBatches(){
        $this->load->helper('url');
        $this->load->library('session');
        $username = $this->session->userdata('username');
        if(isset($username)){
        $this->load->helper('form');
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('deleteData'); // model for delete
        $batch_id = $this->input->post("batch_id");
        $result = $this->deleteData->deleteBatch($batch_id); // call function from model
        if($result == 0){
            $this->session->set_flashdata('success','Sorry Batch Cannot be DELETED.');
            redirect('Batch_cont/addBatch'); 
        }
        else{
            $this->session->set_flashdata('success','You have Successfully submitted data.');
            redirect('Batch_cont/addBatch'); 
        }
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        } 
    }
    //to view all the students in perticular batch
    public function Student_batch_view($batchid){
        $notuse="notused";
        $this->load->library('session');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        if(isset($username)){
            $db = $this->session->userdata('db');//load db      
            $this->load->database($db);//call db
            $this->load->model('SelectData');
            $query['batch_student_mapping'] = $this->SelectData->stud_attend_map($batchid,$notuse);
            $this->load->view('batch_student_view',$query); 
        }else {
            $name=site_url().'/Home';
            echo "<script>window.location.href='$name';</script>";         
        } 
    }
    public function customAlphanumeric($strr){
         if ( !preg_match('/^[0-9a-zA-Z ]+$/',$strr) )
            {
                return false;
            }
    }
}
?>