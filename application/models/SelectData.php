<?php
class SelectData extends CI_Model {
    function adminSelect($username,$password){
        $q = $this->db->query("SELECT * FROM `admin` where admin_name = '$username' and admin_password ='$password'");
        if($q->num_rows() >0){
            return TRUE;
        }
        else return FALSE;
        
    }
    function teacher() {
        $q = $this->db->query("SELECT * FROM `teacher` ORDER BY t_ID DESC");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }
    function student() {
        $q = $this->db->query("SELECT * FROM `student_details` ORDER BY stud_ID DESC");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }
    function student_detail_fee($table) {
        $q = $this->db->query("SELECT * FROM `student_details` ORDER BY stud_ID DESC");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $stud_id = $row->stud_ID;
                $q1 = $this->db->query("SELECT * FROM `stud_fee` where stud_id='$stud_id'");
                foreach($q1->result() as $row1){
                    $data1[]=$row1;
                }
                $data[]=$row;
            }
        }
        $new = array(
            'stud' => $data,
            'fee' => $data1,
            'table'=>$table
        );
        return $new;
    }
    function studentProfile($n) {
        $q = $this->db->query("SELECT * FROM `student_details` WHERE stud_ID = '$n'");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
        $q = $this->db->query("SELECT batch_id FROM `batch_student_mapping` WHERE stud_id = '$n'");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                 $batch_id = $row->batch_id;
                $q = $this->db->query("SELECT * FROM `batch` WHERE batch_ID = '$batch_id'");
                foreach($q->result() as $row){
                    $data[]=$row;
                }
            }
        }
        $q = $this->db->query("SELECT * FROM `stud_fee` WHERE stud_id = '$n'");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }
    
    function teacherProfile($n){
        $q = $this->db->query("SELECT * FROM `teacher` WHERE t_ID = '$n'");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
        return ($data);
    }
    function course() {
        $q = $this->db->query("SELECT * FROM `course` ORDER BY course_ID DESC");
        if($q->num_rows() >0){ 
            foreach($q->result() as $row){
                if(!empty($row->subject_id)){ 
                    $bj = array();
                    $subj_id = $row->subject_id;
                    $name = explode(",",$subj_id);
                    $n = count($name);$a=0;
                    for($i=0;$i<$n;$i++){ 
                        $q1 = $this->db->query("SELECT subject_name FROM `engisubject` where engisubj_ID = '$name[$i]'");
                        if($q1->num_rows() >0){
                            foreach($q1->result() as $row1){
                                
                                $bj[$a] = $row1->subject_name;
                                $a++;
                            } 
                            
                        }    
                    }
                    $bj1 = "<pre>".implode(",\n",$bj)."</pre>";
                    unset($bj);
                    $row->subject_id =$bj1;
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
    function engisubject(){
        $q = $this->db->query("SELECT * FROM `engisubject`");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }
    function branch(){
        $q = $this->db->query("SELECT * FROM `branch`");
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
    function batchIDBatch($name){
        $q = $this->db->query("SELECT batch_ID FROM `batch` WHERE batch_name = '$name'");
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
    function AttendCoursSubjTeacher($data){
        $course = $data['course'];
        $subject = $data['subject'];
        $q = $this->db->query("SELECT subject_ID FROM `subject` where subject_name = '$subject'");
            foreach($q->result() as $row){
                $subj = $row->subject_ID;
            }
        $q1 = $this->db->query("SELECT course_ID FROM `course` where course_name = '$course'");
            foreach($q1->result() as $row){
                 $cour = $row->course_ID;
            }
        $q2 = $this->db->query("SELECT * FROM `teacher_course_mapping` where subject_id LIKE '%$subj%' AND course_id = '$cour' ");
            foreach($q2->result() as $row){
                $tcm_id[] = $row->tcm_ID;
                $teach_id[] = $row->teacher_id;
            }
        foreach($teach_id as $id){
           $q1 = $this->db->query("SELECT * FROM  `teacher` WHERE t_ID = '$id'");
            foreach($q1->result() as $row){
                 $name[] = $row;
            }
        }
        $new_data = array(
        'tcm_id' => $tcm_id,
            'name' => $name
        );
        return $new_data;
    }
    function test_detail(){
        $q = $this->db->query("SELECT * FROM `test` ORDER BY test_ID DESC");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $batch_id = $row->batch_id;
                $q1 = $this->db->query("SELECT * FROM `batch` where batch_ID = '$batch_id'");
                foreach($q1->result() as $row1){
                    $row->batch_id = $row1->batch_name;
                }
                $data[]=$row;
            }
        }
        return $data;
    }
    function selectTest($id){
         $q = $this->db->query("SELECT * FROM `test` where test_ID = '$id'");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $batch_id = $row->batch_id;
                $q1 = $this->db->query("SELECT * FROM `batch` where batch_ID = '$batch_id'");
                foreach($q1->result() as $row1){
                    $row->batch_id = $row1->batch_name;
                }
                $data[] = $row;
            }
        }
        $q2 = $this->db->query("SELECT * FROM `batch_student_mapping` where batch_id = '$batch_id'");
        foreach($q2->result() as $row1){
            $stud_id = $row1->stud_id;
            $q3 = $this->db->query("SELECT * FROM `student_details` where stud_ID = '$stud_id'");
            foreach($q3->result() as $row2){
                $name[] = $row2->stud_name." ".$row2->father_name." ".$row2->stud_surname." ".$row2->mother_name;
            }
            $new[] = $row1;
        }
        $n = array(
            'data' => $data,
            'stud' => $new,
            'stud_name'=>$name
        );
        return ($n);
    }
}
?>