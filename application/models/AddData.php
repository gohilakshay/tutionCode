<?php defined('BASEPATH') OR exit('No direct script access allowed');
class AddData extends CI_Model {
    function addBatchItem($data){
        $this->db->insert('batch', $data);
        return;
    }
    function addTeacherItem($data){
        $this->db->insert('teacher', $data);
        return;
    }
    function addTeacherSubjItem($data1,$insert_id){
        $course_name = $data1['course'];
        $subject_name = $data1['subject'];
        $n = count($subject_name);
        $query = $this->db->get_where('course',array('course_name'=>$course_name));
        foreach($query->result() as $value){
            $course_id = $value->course_ID;
        }
        $subject_id=array();
        for($i=0;$i<$n;$i++){
            $query1 = $this->db->get_where('subject',array('subject_name'=>$subject_name[$i]));
            foreach($query1->result() as $value){ 
                $subject_id[$i]=$value->subject_ID;
            }
        }
        $subject= implode(",",$subject_id);
         $new = array('teacher_id'=>$insert_id,'course_id'=>$course_id,'subject_id'=>$subject);
         $this->db->insert('teacher_course_mapping', $new);
    }
    function addStudentItem($data){
        $this->db->insert('student_details', $data);
        return;
    }
    function addStudentfeeItem($data1){
        $this->db->insert('stud_fee', $data1);
        
        return;
    }
    function addCourseItem($data,$data1){
        $subject_name = $data1;
        $n = count($subject_name);
        $subject_id=array();
        for($i=0;$i<$n;$i++){
            $query1 = $this->db->get_where('subject',array('subject_name'=>$subject_name[$i]));
            foreach($query1->result() as $value){ 
                $subject_id[$i]=$value->subject_ID;
            }
        }
         $subject= implode(",",$subject_id);
        $subject_array = array('subject_id'=>$subject);
        $data =$data+$subject_array;
       // array_push($data,$subject_array);
        print_r($data);
        $this->db->insert('course', $data);
        
        return;
    }
}
?>