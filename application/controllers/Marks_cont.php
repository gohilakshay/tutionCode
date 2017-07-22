<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
class Marks_cont extends CI_Controller
{
    public function addMarks()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('testid', 'testid', 'required|numeric');
		if($this->form_validation->run() == FALSE)
		{
            $this->load->view('addMarks');			//html filename
		}
		else
        {
            $test_id = $this->input->post('testid');
            $this->load->database();
            $this->load->model('SelectData');
            $query['result'] = $this->SelectData->selectTest($test_id);
            $this->load->view('addMarks',$query);
            //redirect('Marks_cont/addMarks');   	
		}
    }
    public function marks()
    {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('AddData');
        $test_id = $this->input->post('test_id');
        $stud_id = $this->input->post('stud_id');
        $marks = $this->input->post('marks');
        $stud_id = implode(",",$stud_id);
        $marks = implode(",",$marks);
        $data =array(
            'test_id'=>$test_id,
            'stud_id'=>$stud_id,
            'marks_obtained'=>$marks
        );
        $this->AddData->addMarks($data);
        $this->load->view('addMarks');         //html filename
    }
}
?>