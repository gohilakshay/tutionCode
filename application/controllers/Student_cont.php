 <?php defined('BASEPATH') OR exit('No direct script access allowed');

class Student_cont extends CI_Controller
{
    public function student()
    {
        $this->load->helper('url');  
        $this->load->view('student');       //html filename
    }
    public function studentProfile()
    {
        $this->load->helper('url');
        $this->load->view('studentProfile');     //html filename
    }
    public function updateStudentProfile()
    {
        $this->load->helper('url');  
        $this->load->view('updateStudentProfile');   //html filename
    }
    public function addStudent()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('surname', 'surname', 'callback_custom_Alpha');
        $this->form_validation->set_rules('studentname', 'studentname', 'callback_custom_Alpha');
        $this->form_validation->set_rules('fathername', 'fathername', 'callback_custom_Alpha');
        $this->form_validation->set_rules('mothername', 'mothername', 'callback_custom_Alpha');
         
        $this->form_validation->set_rules('dob', 'dob', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('contactnumber', 'contactnumber', 'required|numeric|exact_length[10]');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('admissionyear', 'admissionyear', 'required');
        $this->form_validation->set_rules('date', 'date', 'required');
        $this->form_validation->set_rules('school_college', 'school_college', 'required');
        $this->form_validation->set_rules('total_fees', 'total_fees', 'required|numeric');
        $this->form_validation->set_rules('discount', 'discount', 'required|numeric');
        $this->form_validation->set_rules('final', 'final', 'required|numeric');
        $this->form_validation->set_rules('received', 'received', 'required|numeric');
        $this->form_validation->set_rules('balance', 'balance', 'required|numeric');
          $this->form_validation->set_message('custom_Alpha', 'Only Alphabets Allowed');
        $this->form_validation->set_rules('place', 'place', 'required');
        $this->form_validation->set_rules('date', 'date', 'required');
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('addStudent');        
        }
        else
        {
            $this->load->helper('form');
            $this->load->database();
            $this->load->model('AddData');
            $this->load->model('ProfileImg');
            $name = strtolower(preg_replace('/\s+/', '', $this->input->post('studentname')));
            $img_address = 'assets/profile/'.$name.'.jpg';
            $data = array(
                'stud_surname' => $this->input->post('surname'),
                'stud_name' => $this->input->post('studentname'),
                'father_name' => $this->input->post('fathername'),
                'mother_name' => $this->input->post('mothername'),
                'stud_gender' => $this->input->post('gender'),
                'stud_dob' => $this->input->post('dob'),
                'stud_email' => $this->input->post('email'),
                'stud_contact' => $this->input->post('contactnumber'),
                'stud_address' => $this->input->post('address'),
                'stud_profile' => $img_address,
                'admission_year' => $this->input->post('admissionyear'),
                'admission_date' => $this->input->post('date'),
                'course_type' => $this->input->post('course_type'),
                'sch_coll_name' => $this->input->post('school_college'),
                'board' => $this->input->post('board'),
                // 'batch_id' => $this->input->post('batch'),
                // 'batch_timing' => $this->input->post('batch_timing'),
                // 'standard' => $this->input->post('standard'),
                'place' => $this->input->post('place'),
                'form_date' => $this->input->post('date')
                
            );
            $img = $_FILES['photo']['name'] ; 
            $this->ProfileImg->addImg($img,$name);
             $this->AddData->addStudentItem($data);
            $n = $this->db->insert_id();
            $data1 = array(
                'stud_ID'=>$n,
            	'total_fee' => $this->input->post('total_fees'),
                'installment_option' => $this->input->post('Installment'),
                'installment_type' => $this->input->post('installmenttype'),
                'discount' => $this->input->post('discount'),
                'final_fee' => $this->input->post('final'),
                'amountper_installment' => $this->input->post('result'),
                'payment_mode' => $this->input->post('paymentmode'),
                'recieved_fee' => $this->input->post('received'),
                'balance_fee' => $this->input->post('balance'),
                );
           
            
            $this->AddData->addStudentfeeItem($data1);
            redirect('Student_cont/addStudent');      
        }
    }
    public function custom_Alpha($strrr) 
        {
            if ( !preg_match('/^[a-zA-Z ]+$/i',$strrr) )
            {
                return false;
            }
        }  
     public function feeDetail()
    {
        $this->load->helper('url');
        $this->load->view('feeDetail');         //html filename
    }
}
?>