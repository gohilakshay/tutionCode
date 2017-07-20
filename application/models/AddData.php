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
           echo $course_id = $value->course_ID;
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
    function addStudentBatchItem($data){
        $this->db->insert('batch_student_mapping',$data);
        return;
    }
    function addCourseItem($data){
        /*$subject_name = $data1;
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
        print_r($data);*/
        $this->db->insert('course', $data);
        
        return;
    }
    function addStudentAttendItem($data){
        $this->db->insert('student_attend', $data);
        return;
    }
    function markStudentAttendItem($data){
        $n = count($data['stud_id']);
       $stud_id = $data['stud_id'];
        echo $s_id = implode(",",$stud_id);
       $attending = $data['attend'];
        $attend_id = $data['attend_id'];
        echo $absent_id = implode(",",$attending);
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
}
?>