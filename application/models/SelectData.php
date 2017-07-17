<?php

class SelectData extends CI_Model {
    function teacher() {
        $q = $this->db->query("SELECT * FROM `teacher`");
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
}
?>