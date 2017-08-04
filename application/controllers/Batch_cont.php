<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Batch_cont extends CI_Controller
{
    public function addBatch()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $query['result'] = $this->SelectData->ViewBatch();
        $query['result1'] = $this->SelectData->SelectBatchCourse(); 
        $this->form_validation->set_rules('batchname', 'batchname', 'required|alpha_dash');
        $this->form_validation->set_rules('batch_timing', 'batch_timing', 'required');
        $this->form_validation->set_message('alpha_dash','Please enter in the following format eg:IX-1');
        if($this->form_validation->run() == FALSE)
        {
            $username = $this->session->userdata('username');
            if(isset($username)){
                $this->load->view('addBatches',$query); 
                }else echo "Error 404 : Access Denied";//html filename 
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
            $this->AddData->addBatchItem($data);
            $this->session->set_flashdata('success','You have Successfully submitted data.');
            redirect('Batch_cont/addBatch');      
        }
        
    }
    public function updateBatches()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $this->load->model('SelectData');
        $username = $this->session->userdata('username');
        $this->load->model('SelectData');
        $query['result1'] = $this->SelectData->SelectBatchCourse();
        $this->form_validation->set_rules('batchname', 'batchname', 'required|alpha_dash');
        $this->form_validation->set_rules('batch_timing', 'batch_timing', 'required');
        $this->form_validation->set_message('alpha_dash','Please enter in the following format eg:IX-1');
        if($this->form_validation->run() == FALSE)
        {
            if(isset($username)){
                $batch_id = $this->input->post('batch_id');
                $query['result'] = $this->SelectData->UpdateBatch($batch_id);
                $this->load->view('updateBatches',$query);   //html filename
            }
            else echo "Error 404 : Access Denied"; 
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
            $this->AddData->UpdateBatchItem($data);
            $this->session->set_flashdata('success','You have Successfully submitted data.');
            redirect('Batch_cont/addBatch');      
        } 
    }
    public function DeleteBatches(){
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $db = $this->session->userdata('db');//load db 
        $this->load->database($db);//call db
        $this->load->model('deleteData'); // model for delete
        $batch_id = $this->input->post("batch_id");
        $this->deleteData->deleteBatch($batch_id); // call function from model
        if($this->db->affected_rows() > 0){
            redirect('Batch_cont/addBatch'); 
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