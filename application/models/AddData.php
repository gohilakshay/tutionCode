<?php defined('BASEPATH') OR exit('No direct script access allowed');
class AddData extends CI_Model {
    function addBatchItem($data){
        $this->db->insert('batch', $data);
        return;
    }
    function UpdateBatchItem($data){
        $batch_name = $data['batch_name'];
        $this->db->where('batch_name',$batch_name);
        $this->db->update('batch',$data);
        return;
    }
    function addTeacherItem($data){
        $this->db->insert('teacher', $data);
        return;
    }
    function addTeacherSubjItem($data1){
        $this->db->insert('teacher_subject_mapping', $data1);
        return;
    }
    function teacherPaymentDetails($data){
         $this->db->insert('teacher_expense', $data);
        $teacher_id = $data['teacher_id'];
        $this->db->set('salary_status', 'paid'); //value that used to update column  
        $this->db->where('t_ID', $teacher_id); //which row want to upgrade  
        $this->db->update('teacher');  //table name
        return;
    }
    function addStudentItem($data){
        $this->db->insert('student_details', $data);
        return;
    }
    function addStudentfeeItem($data1){
        $this->db->insert('stud_fee', $data1);
        return;
    }
    function updateStudFee($data){
         $stud_id = $data['stud_id'];
        $this->db->set($data); //value that used to update column  
        $this->db->where('stud_id', $stud_id); //which row want to upgrade  
        $this->db->update('stud_fee');  //table name
        return;
    }
    function addStudentBatchItem($data){
        $this->db->insert('batch_student_mapping',$data);
        return;
    }
    function addCourseItem($data){
        $this->db->insert('course', $data);
        return;
    }
    function updateCourseItem($data){
        $course_name = $data['course_name'];
        $this->db->where('course_name',$course_name);
        $this->db->update('course',$data);
        return;
    }
    function addStudentAttendItem($data){
        $this->db->insert('student_attend', $data);
        return;
    }
    function markStudentAttendItem($data){
        $n = count($data['stud_id']);
       $stud_id = $data['stud_id'];
         $s_id = implode(",",$stud_id);
       $attending = $data['attend'];
        $attend_id = $data['attend_id'];
         $absent_id = implode(",",$attending);
        $new_data = array(
            'stud_id'=>$s_id,
            'attend_id'=>$attend_id,
            'absent_stud_id'=>$absent_id
        );
        $this->db->insert('stud_attend_mapping', $new_data);
        return;
    }
    function TeacherAttend($data){
        $tcm_id = implode(",",$data['tcm_id']);
        $new_data = array(
            'date' => $data['date'],
            'tcm_id' => $tcm_id,
            'timing' => $data['timing']
        );
        $this->db->insert('teacher_attend', $new_data);
       // print_r($new_data);
    }
    function markTeacherAttendItem($data){
         $this->db->insert('t_attend_mapping', $data);
        return;
    }
    function addTest($data){
         $this->db->insert('test', $data);
        return;
    }
    function addMarks($data){
         $this->db->insert('marks', $data);
        return;
    }
    function staffDetails($data){
        $this->db->insert('staff_details', $data);
        return;
    }
    function utilitiesDetails($data){
        $this->db->insert('utilities', $data);
        return;
    }
     function transportDetails($data){
        $this->db->insert('transport', $data);
        return;
    }
    
    function mealsDetails($data){
        $this->db->insert('meals_entertain', $data);
        return;
    }
     function maintenanceDetails($data){
        $this->db->insert(' maintenance', $data);
        return;
    }
     function rentDetails($data){
        $this->db->insert('rent', $data);
        return;
    }
    function staffPaymentDetails($data){
        $this->db->insert('staff', $data);
        $name = $data['staff_name'];
        $this->db->set('status', 'paid'); //value that used to update column  
        $this->db->where('staff_name', $name); //which row want to upgrade  
        $this->db->update('staff_details');  //table name
        return;
    }
    function staffpaymentDefault(){
        $this->db->set('status', 'unpaid'); //value that used to update column  
        //$this->db->where('staff_name', $name); //which row want to upgrade  
        $this->db->update('staff_details');  //table name
        return;
    }
    function teacherpaymentDefault(){
        $this->db->set('salary_status', 'unpaid'); //value that used to update column  
        //$this->db->where('staff_name', $name); //which row want to upgrade  
        $this->db->update('teacher_expense');  //table name
        return;
    }
    function uploadfile($data){
        $this->db->insert('upload',$data);
        return;
    }
}
?>