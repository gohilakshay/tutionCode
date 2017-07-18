<?php

class SelectData extends CI_Model {
    function teacher() {
        $q = $this->db->query("SELECT * FROM `teacher` ORDER BY t_ID DESC");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }
    function course() {
        $q = $this->db->query("SELECT * FROM `course` ORDER BY course_ID DESC");
        $bj = array();
        if($q->num_rows() >0){ 
            foreach($q->result() as $row){
                if(!empty($row->subject_id)){ 
                    $subj_id = $row->subject_id;
                    $name = explode(",",$subj_id);
                    $n = count($name);$a=0;
                    for($i=0;$i<$n;$i++){ 
                        $q1 = $this->db->query("SELECT subject_name FROM `subject` where subject_ID = '$name[$i]'");
                        if($q1->num_rows() >0){
                            foreach($q1->result() as $row1){
                              $bj[$a] = $row1->subject_name;
                                $a++;
                            }
                            $bj1 = implode(" ",$bj);
                        }
                         $row->subject_id =$bj1;
                    }
                } 
                $data[]=$row;
            }
        }
       
        return $data;
    }
    function standard(){
        $q = $this->db->query("SELECT * FROM `standard`");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }
    function batchIDStudAttend($name,$time){
        $q = $this->db->query("SELECT batch_ID FROM `batch` WHERE batch_name = '$name' AND batch_timing = '$time'");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data=$row->batch_ID;
            }
        }
      return $data;
    }
    function stud_attend_map($id,$attend_id){
            $q = $this->db->query("SELECT stud_id FROM `batch_student_mapping` WHERE batch_id = '$id'");
            if($q->num_rows() >0){
                foreach($q->result() as $row){
                     $stud_id = $row->stud_id;
                    $q = $this->db->query("SELECT * FROM `student_details` WHERE stud_ID = '$stud_id'");
                    if($q->num_rows() >0){
                        foreach($q->result() as $row){
                            $data[]= $row;
                        }}
                }
            }
        array_push($data,$attend_id);
          return $data;
    }
    function ViewBatch(){
        $q = $this->db->query("SELECT * FROM `batch` ORDER BY batch_ID DESC");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }
    function SelectBatchCourse(){
        $q = $this->db->query("SELECT * FROM `course` ORDER BY course_ID DESC");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }
}
?>