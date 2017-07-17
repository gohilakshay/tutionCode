<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Batch_cont extends CI_Controller
{
    public function addBatch()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('batchname', 'batchname', 'required|alpha_dash');
        $this->form_validation->set_rules('batch_timing', 'batch_timing', 'required');
        $this->form_validation->set_message('alpha_dash','Please enter in the following format eg:IX-1');
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('addBatches');       //html filename 
        }
        else
        {
            $this->load->helper('form');
            $this->load->database();
            $this->load->model('AddData');
            $data = array(
                'batch_name' => $this->input->post('batchname'),
                'batch_timing' => $this->input->post('batch_timing'),
                'course_name' => $this->input->post('course')
            );
            $this->AddData->addBatchItem($data);
            redirect('Batch_cont/addBatch');      
        }
        
    }
    public function batch()
    {
        $this->load->helper('url');
        $this->load->view('addBatches');         //html filename
    }
    public function customAlphanumeric($strr){
         if ( !preg_match('/^[0-9a-zA-Z ]+$/',$strr) )
            {
                return false;
            }
    }
}
?>