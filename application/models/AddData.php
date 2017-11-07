<?php defined('BASEPATH') OR exit('No direct script access allowed');
class AddData extends CI_Model {
    function addBatchItem($data){
        $query = $this->db->get_where('batch', array('batch_name' => $data['batch_name']));
        if(!empty($query->result())){
            return 0;
        }
        else{
            $this->db->insert('batch', $data);
            return 1;
        }
    }
    function UpdateBatchItem($data){
        $batch_id = $data['batch_ID'];
        $this->db->where('batch_ID',$batch_id);
        $this->db->update('batch',$data);
        return;
    }
    function addTeacherItem($data){
        $this->db->insert('teacher', $data);
        return;
    }
    function UpdateTeacherItem($data){
        echo $t_id= $data['t_ID'];
        $this->db->where('t_ID',$t_id);
        $this->db->update('teacher',$data);
        return;
    }  
    
    function addOtherItem($data){
        $this->db->insert('others', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    function addTeacherSubjItem($data1){
        $this->db->insert('teacher_subject_mapping', $data1);
        return;
    }
    function UpdateTeacherSubjItem($data1){
        $t_id= $data1['teacher_id'];
        $this->db->where('teacher_id',$t_id);
        $this->db->update('teacher_subject_mapping',$data1);
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
    function UpdateStudentItem($data,$batch_edit){
        $stud_id = $data['stud_ID'];
        $this->db->where('stud_ID',$stud_id);
        $this->db->update('student_details',$data);
        $stud_id = $batch_edit['stud_ID'];
        $this->db->where('stud_id',$stud_id);
        $this->db->update('batch_student_mapping',$batch_edit);

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
        $query = $this->db->get_where('course', array('course_name' => $data['course_name']));
        if(!empty($query->result())){
            return 0;
        }
        else{
            $this->db->insert('course', $data);
            return 1;
        }
    }
    function updateCourseItem($data){
        $course_id = $data['course_ID'];
        $this->db->where('course_ID',$course_id);
        $this->db->update('course',$data);
        return;
    }
    function updateOtherItem($data,$newData){
        $this->db->where('subject_name',$data);
        $this->db->update('others',$newData);
        return;
    }
    //insert into stud_attend table
    function addStudentAttendItem($data){
        $this->db->insert('student_attend', $data);
        return;
    }
    //insert in stud_attend_mapping
    function markStudentAttendItem($data){
        $n = count($data['stud_id']); //count no. of student in batch
       $stud_id = $data['stud_id'];
         $s_id = implode(",",$stud_id);//join all student_id by ","
       $attending = $data['attend'];//get absent student_id  
        $attend_id = $data['attend_id'];
         $absent_id = implode(",",$attending);//join all ABSENT student_id by ","
        $new_data = array(
            'stud_id'=>$s_id,
            'attend_id'=>$attend_id,
            'absent_stud_id'=>$absent_id
        );
        $this->db->insert('stud_attend_mapping', $new_data);//insert Data
        return;
    }
    //insert in teacher_attend
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
    //insert in t_attend_mapping
    function markTeacherAttendItem($data){
         $this->db->insert('t_attend_mapping', $data);
        return;
    }
    function addTest($data){
        $this->db->db_debug = FALSE; //disable debugging for queries
        if(! $this->db->insert('test', $data)){
            $this->db->db_debug = $db_debug; //restore setting
            return 0;
        }
        else {
            $this->db->db_debug = $db_debug; //restore setting
            return 1;
        }
         
        return;
    }
    function UpdateTest($data){
        $test_id = $data['test_ID'];
        $this->db->where('test_ID',$test_id );
        $this->db->update('test',$data);
        return;
    }
    function UpdateEnq($data){
        $enq_id = $data['enquiry_ID'];
        $this->db->where('enquiry_ID',$enq_id );
        $this->db->update('enquiry',$data);
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
        $this->db->update('teacher');  //table name
        return;
    }
    function uploadfile($data){
        $this->db->insert('upload',$data);
        return;
    }
    function smsAdd($data){
        $this->db->insert('sms',$data);
        return;
    }
    function smsBulkAdd($data){
        $this->db->insert('smsBulk',$data);
        $status = $data['status'];
        $insert_id = $this->db->insert_id();
        $sms = array('bulkID' => $insert_id,'status'=>$status);
        $this->db->insert('sms',$sms);
        return;
    }
    function enquirySave($data){
        $this->db->insert('enquiry', $data);
        return;
    }
    public function insertCSV($data)
    {
        $this->db->insert('import', $data);
        return TRUE;
    }
}
?>