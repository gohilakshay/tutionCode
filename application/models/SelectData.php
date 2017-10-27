<?php
class SelectData extends CI_Model {
    function SuperadminSelect($username,$password){
        $q = $this->db->query("SELECT * FROM `admin_user` where admin_name = '$username' and admin_password ='$password'");
        if($q->num_rows() >0){
            return TRUE;
        }
        else return FALSE;       
    }
    function adminSelect($username,$password){
        $q = $this->db->query("SELECT * FROM `admin` where username = '$username' and password ='$password'");
        if($q->num_rows() >0){
            return TRUE;
        }
        else return FALSE;       
    }
    function dbSelect(){
        $q = $this->db->query("SELECT * FROM `admin` ");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
        return $data;       
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
    function teacherExpense($id) {
        $q = $this->db->query("SELECT * FROM `teacher_expense` WHERE teacher_id = '$id' ORDER BY t_exp_ID DESC");
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
    function student_batch_map() {
        $q = $this->db->query("SELECT * FROM `batch_student_mapping`");
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
    
    function teacherProfile($n,$dbtype){
        $q = $this->db->query("SELECT * FROM `teacher` WHERE t_ID = '$n'");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
        $q = $this->db->query("SELECT * FROM `teacher_subject_mapping` WHERE teacher_id = '$n'");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $bj = array();
                $subj_id = $row->subject_id;
                $name = explode(",",$subj_id);
                $n = count($name);$a=0;
                for($i=0;$i<$n;$i++){
                    foreach($dbtype as $value){
                        if($row->standard_name <= 10 && $value == 'school' && $row->branch_name == NULL){
                            
                            $q1 = $this->db->query("SELECT subject_name FROM `subject` where subject_ID = '$name[$i]'");
                            if($q1->num_rows() >0){
                                foreach($q1->result() as $row1){
                                    $bj[$a] = $row1->subject_name;
                                    $a++;
                                }           
                            }
                           
                        }
                        else if($row->standard_name >= 11 && $value == 'jrcolg_sci' && $row->branch_name == 'Science'){
                            $q1 = $this->db->query("SELECT subject_name FROM `jrColgSci` where    colgsubj_ID = '$name[$i]'");
                            if($q1->num_rows() >0){
                                foreach($q1->result() as $row1){
                                    $bj[$a] = $row1->subject_name;
                                    $a++;
                                }           
                            }
                        }
                        else if($row->standard_name >= 11 && $value == 'jrcolg_com'  && $row->branch_name == 'Commerce'){
                            $q1 = $this->db->query("SELECT subject_name FROM `jrColgCom` where    colgsubj_ID = '$name[$i]'");
                            if($q1->num_rows() >0){
                                foreach($q1->result() as $row1){
                                    $bj[$a] = $row1->subject_name;
                                    $a++;
                                }           
                            }
                        }
                        else if($row->standard_name >= 11 && $value == 'jrcolg_art'  && $row->branch_name == 'Art'){
                            $q1 = $this->db->query("SELECT subject_name FROM `jrColgArt` where    colgsubj_ID = '$name[$i]'");
                            if($q1->num_rows() >0){
                                foreach($q1->result() as $row1){
                                    $bj[$a] = $row1->subject_name;
                                    $a++;
                                }           
                            }
                        }
                        else if($row->standard_name == 'Engineering' && $value == 'engicolg'){
                            $q1 = $this->db->query("SELECT subject_name FROM `engisubject` where    engisubj_ID = '$name[$i]'");
                            if($q1->num_rows() >0){
                                foreach($q1->result() as $row1){
                                    $bj[$a] = $row1->subject_name;
                                    $a++;
                                }           
                            }
                        }
                        else if($row->standard_name == 'Commerce' && $value == 'comcolg'){
                            $q1 = $this->db->query("SELECT subject_name FROM `commercesubject` where    Commercesubj_ID = '$name[$i]'");
                            if($q1->num_rows() >0){
                                foreach($q1->result() as $row1){
                                    $bj[$a] = $row1->subject_name;
                                    $a++;
                                }           
                            }
                        }
                    }    
                }
                $bj1 = "<pre style='width:200px;'>".implode(",\n",$bj)."</pre>";
                unset($bj);
                $row->subject_id =$bj1;
                $data[]=$row;
            }
            return ($data);
        }
    }  
    //select all teacher from teacher_attend table
    function teacher_attend(){
        $q = $this->db->query("SELECT * FROM `teacher_attend` ORDER BY date DESC");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }
    //select all from t_attend_mapping table
    function teacherAttendMap($n){
        $q = $this->db->query("SELECT * FROM `t_attend_mapping` WHERE t_attend_id = '$n'");
        $new = array();
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
       return($data);
    }
    function course($ntype) {
        $dbtype = $ntype;
         $n = count($dbtype);$a=0;
                $q = $this->db->query("SELECT * FROM `course` ORDER BY course_ID DESC");
                if($q->num_rows() >0){ 
                    foreach($q->result() as $row){
                        $subj_id = $row->subject_id;
                        $subj_id = explode(",",$subj_id);
                        $std_name = $row->standard_name;
                        if($std_name <= '10'){
                            foreach($subj_id as $subid){
                                $q1 = $this->db->query("SELECT subject_name FROM `subject` where    subject_ID = '$subid'");
                                if($q1->num_rows() >0){
                                    foreach($q1->result() as $row1){
                                   
                                        $bj[$a] = $row1->subject_name;
                                        $a++;
                                    } 
                            
                                }    
                            }
                            $bj1 = "<pre style='width:200px;'>".implode(",\n",$bj)."</pre>";
                            unset($bj);
                            $row->subject_id =$bj1;
                            $data[] = $row;
                        }
                        else if($std_name == '11'){
                            
                            foreach($subj_id as $subid){
                                
                                if($row->branch_name == 'Commerce'){
                                    $q1 = $this->db->query("SELECT subject_name FROM `jrColgCom` where    colgsubj_ID = '$subid'");
                                    foreach($q1->result() as $row1){
                                   
                                        $bj[$a] = $row1->subject_name;
                                        $a++;
                                    } 
                            
                                }
                                else if($row->branch_name == 'Art'){
                                    $q1 = $this->db->query("SELECT subject_name FROM `jrColgArt` where    colgsubj_ID = '$subid'");
                                    foreach($q1->result() as $row1){
                                   
                                        $bj[$a] = $row1->subject_name;
                                        $a++;
                                    } 
                            
                                }
                                else
                                {
                                    $q1 = $this->db->query("SELECT subject_name FROM `jrColgSci` where    colgsubj_ID = '$subid'");
                                    if($q1->num_rows() >0){
                                        foreach($q1->result() as $row1){

                                            $bj[$a] = $row1->subject_name;
                                            $a++;
                                        } 

                                    }   
                                }
                            }
                            $bj1 = "<pre style='width:200px;'>".implode(",\n",$bj)."</pre>";
                            unset($bj);
                            $row->subject_id =$bj1;
                            $data[] = $row;
                        }
                        else if($std_name == '12'){
                            foreach($subj_id as $subid){
                                
                                if($row->branch_name == 'Commerce'){
                                    $q1 = $this->db->query("SELECT subject_name FROM `jrColgCom` where    colgsubj_ID = '$subid'");
                                    foreach($q1->result() as $row1){
                                   
                                        $bj[$a] = $row1->subject_name;
                                        $a++;
                                    } 
                            
                                }
                                else if($row->branch_name == 'Art'){
                                    $q1 = $this->db->query("SELECT subject_name FROM `jrColgArt` where    colgsubj_ID = '$subid'");
                                    foreach($q1->result() as $row1){
                                   
                                        $bj[$a] = $row1->subject_name;
                                        $a++;
                                    } 
                            
                                }
                                else
                                {
                                    $q1 = $this->db->query("SELECT subject_name FROM `jrColgSci` where    colgsubj_ID = '$subid'");
                                    if($q1->num_rows() >0){
                                        foreach($q1->result() as $row1){

                                            $bj[$a] = $row1->subject_name;
                                            $a++;
                                        } 

                                    }   
                                }
                            }
                            $bj1 = "<pre style='width:200px;'>".implode(",\n",$bj)."</pre>";
                            unset($bj);
                            $row->subject_id =$bj1;
                            $data[] = $row;
                        }
                        else if($std_name == 'Engineering'){
                            foreach($subj_id as $subid){
                                $q1 = $this->db->query("SELECT subject_name FROM `engisubject` where    engisubj_ID = '$subid'");
                                if($q1->num_rows() >0){
                                    foreach($q1->result() as $row1){
                                   
                                        $bj[$a] = $row1->subject_name;
                                        $a++;
                                    } 
                            
                                }    
                            }
                            $bj1 = "<pre style='width:200px;'>".implode(",\n",$bj)."</pre>";
                            unset($bj);
                            $row->subject_id =$bj1;
                            $data[] = $row;
                        }
                        else if($std_name == 'Commerce'){
                            foreach($subj_id as $subid){
                                $q1 = $this->db->query("SELECT subject_name FROM `commercesubject` where    Commercesubj_ID = '$subid'");
                                if($q1->num_rows() >0){
                                    foreach($q1->result() as $row1){
                                   
                                        $bj[$a] = $row1->subject_name;
                                        $a++;
                                    } 
                            
                                }    
                            }
                            $bj1 = "<pre style='width:200px;'>".implode(",\n",$bj)."</pre>";
                            unset($bj);
                            $row->subject_id =$bj1;
                            $data[] = $row;
                        }
                    }   
                }
                return $data;         
    }
    /*
    update course
    */    
    function courseUpdate($id){
        $a=0;
                $q = $this->db->query("SELECT * FROM `course` WHERE course_ID = '$id'");
                if($q->num_rows() >0){ 
                    foreach($q->result() as $row){
                        $subj_id = $row->subject_id;
                        $subj_id = explode(",",$subj_id);
                        $std_name = $row->standard_name;
                        if($std_name <= '10'){
                            foreach($subj_id as $subid){
                                $q1 = $this->db->query("SELECT subject_name FROM `subject` where    subject_ID = '$subid'");
                                if($q1->num_rows() >0){
                                    foreach($q1->result() as $row1){
                                   
                                        $bj[$a] = $row1->subject_name;
                                        $a++;
                                    } 
                            
                                }    
                            }
                            $bj1 = implode(",",$bj);
                            unset($bj);
                            $row->subject_id =$bj1;
                            $data[] = $row;
                        }
                        else if($std_name == '11'){
                            foreach($subj_id as $subid){
                                
                                
                                if($row->branch_name == 'Commerce'){
                                    $q1 = $this->db->query("SELECT subject_name FROM `jrColgCom` where    colgsubj_ID = '$subid'");
                                    foreach($q1->result() as $row1){
                                   
                                        $bj[$a] = $row1->subject_name;
                                        $a++;
                                    } 
                            
                                }
                                else if($row->branch_name == 'Art'){
                                    $q1 = $this->db->query("SELECT subject_name FROM `jrColgArt` where    colgsubj_ID = '$subid'");
                                    foreach($q1->result() as $row1){
                                   
                                        $bj[$a] = $row1->subject_name;
                                        $a++;
                                    } 
                            
                                }
                                else
                                {
                                    $q1 = $this->db->query("SELECT subject_name FROM `jrColgSci` where    colgsubj_ID = '$subid'");
                                    if($q1->num_rows() >0){
                                        foreach($q1->result() as $row1){

                                            $bj[$a] = $row1->subject_name;
                                            $a++;
                                        } 

                                    }   
                                }
                            }
                            $bj1 = implode(",",$bj);
                            unset($bj);
                            $row->subject_id =$bj1;
                            $data[] = $row;
                        }
                        else if($std_name == '12'){
                            foreach($subj_id as $subid){
                                
                                if($row->branch_name == 'Commerce'){
                                    $q1 = $this->db->query("SELECT subject_name FROM `jrColgCom` where    colgsubj_ID = '$subid'");
                                    foreach($q1->result() as $row1){
                                   
                                        $bj[$a] = $row1->subject_name;
                                        $a++;
                                    } 
                            
                                }
                                else if($row->branch_name == 'Art'){
                                    $q1 = $this->db->query("SELECT subject_name FROM `jrColgArt` where    colgsubj_ID = '$subid'");
                                    foreach($q1->result() as $row1){
                                   
                                        $bj[$a] = $row1->subject_name;
                                        $a++;
                                    } 
                            
                                }
                                else
                                {
                                    $q1 = $this->db->query("SELECT subject_name FROM `jrColgSci` where    colgsubj_ID = '$subid'");
                                    if($q1->num_rows() >0){
                                        foreach($q1->result() as $row1){

                                            $bj[$a] = $row1->subject_name;
                                            $a++;
                                        } 

                                    } 
                                }
                            }
                            $bj1 = implode(",",$bj);
                            unset($bj);
                            $row->subject_id =$bj1;
                            $data[] = $row;
                        }
                        else if($std_name == 'Engineering'){
                            foreach($subj_id as $subid){
                                $q1 = $this->db->query("SELECT subject_name FROM `engisubject` where    engisubj_ID = '$subid'");
                                if($q1->num_rows() >0){
                                    foreach($q1->result() as $row1){
                                   
                                        $bj[$a] = $row1->subject_name;
                                        $a++;
                                    } 
                            
                                }    
                            }
                            $bj1 = implode(",",$bj);
                            unset($bj);
                            $row->subject_id =$bj1;
                            $data[] = $row;
                        }
                        else if($std_name == 'Commerce'){
                            foreach($subj_id as $subid){
                                $q1 = $this->db->query("SELECT subject_name FROM `commercesubject` where    Commercesubj_ID = '$subid'");
                                if($q1->num_rows() >0){
                                    foreach($q1->result() as $row1){
                                   
                                        $bj[$a] = $row1->subject_name;
                                        $a++;
                                    } 
                            
                                }    
                            }
                            $bj1 = implode(",",$bj);
                            unset($bj);
                            $row->subject_id =$bj1;
                            $data[] = $row;
                        }
                    }   
                }
        return $data;  
    }
    /*
    start of different school,jrcolg,engi,comm  dbTypes
    */
    function standard(){
        $q = $this->db->query("SELECT * FROM `standard`");
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
    /*function semester(){
        $q = $this->db->query("SELECT * FROM `semester`");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }*/
    
    function subject(){
        $q = $this->db->query("SELECT * FROM `subject`");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }
    /*function collegesubject(){
        $q = $this->db->query("SELECT * FROM `collegesubject`");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }*/
    function jrColgCom(){
        $q = $this->db->query("SELECT * FROM `jrColgCom`");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }
    function jrColgArt(){
        $q = $this->db->query("SELECT * FROM `jrColgArt`");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }
    function jrColgSci(){
        $q = $this->db->query("SELECT * FROM `jrColgSci`");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }
    
    /*function collegesubject(){
        $q = $this->db->query("SELECT * FROM `collegesubject`");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }*/
    function engisubject(){
        $q = $this->db->query("SELECT * FROM `engisubject`");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }
    function commercesubject(){
        $q = $this->db->query("SELECT * FROM `commercesubject`");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }
    /*
    end of different school,jrcolg,engi,comm  dbTypes
    */
    //getting batch_ID from bbatch name and time 
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
    //Select student detail from id->stud_id and attend_id
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
    //replacing batch_id with batch_name in student
    function student_attend_batch(){
        $q = $this->db->query("SELECT * FROM `student_attend` ORDER BY attend_date DESC");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $q1 = $this->db->query("SELECT batch_name FROM batch WHERE batch_ID = '$row->batch_id'");
                foreach($q1->result() as $r){
                     $row->batch_id = $r->batch_name;
                }
               
                $data[]=$row;
            }
        }
        return $data;
    }
    function student_attend_oneAttendOneStudent($attendId){
        $q = $this->db->query("SELECT * FROM `student_attend` WHERE attend_ID = '$attendId'");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $q1 = $this->db->query("SELECT batch_name FROM batch WHERE batch_ID = '$row->batch_id'");
                foreach($q1->result() as $r){
                     $row->batch_id = $r->batch_name;
                }
               
                $data[]=$row;
            }
        }
        return $data;
    }
    //select from stud_attend_mapping
    function attedBatch($n){
         $q = $this->db->query("SELECT * FROM `stud_attend_mapping` WHERE attend_id = '$n'");
        $new = array();
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $studid = explode(",",$row->stud_id);
                $length = count($studid);
                for($i=0;$i<$length;$i++){
                    $q1 = $this->db->query("SELECT stud_name FROM `student_details` WHERE stud_id = '$studid[$i]'");
                 foreach($q1->result() as $row1){
                       $new = $row1->stud_name;
                 }
                }
                $data[]=$row;
            }
        }
       return($data);
    }
    function stud_attend_mapping(){
        $q = $this->db->query("SELECT * FROM `stud_attend_mapping`");
                 foreach($q->result() as $row){
                       $data[] = $row;
                 }
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
    function UpdateBatch($id){
        $q = $this->db->query("SELECT * FROM `batch` WHERE batch_ID = '$id'");
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
    //select subject_id according to subject name and dbtype
    function AttendSubjTeacher($data){
        $dbtype = $data['dbtype'];
        $subject = $data['subject'];
        foreach($dbtype as $value){
            if($value == 'school'){
                $q = $this->db->query("SELECT subject_ID FROM `subject` where subject_name =    '$subject'");
                foreach($q->result() as $row){
                    $subj = $row->subject_ID;
                }
            }
            else if($value == 'jrcolg_sci'){
                $q = $this->db->query("SELECT colgsubj_ID FROM `jrColgSci` where subject_name =     '$subject'");
                foreach($q->result() as $row){
                    $subj = $row->colgsubj_ID;
                }
            }
            else if($value == 'jrcolg_com'){
                $q = $this->db->query("SELECT colgsubj_ID FROM `jrColgCom` where subject_name =    '$subject'");
                foreach($q->result() as $row){
                    $subj = $row->colgsubj_ID;
                }
            }
            else if($value == 'jrcolg_art'){
                $q = $this->db->query("SELECT colgsubj_ID FROM `jrColgArt` where subject_name =    '$subject'");
                foreach($q->result() as $row){
                    $subj = $row->colgsubj_ID;
                }
            }
            else if($value == 'engicolg'){
                $q = $this->db->query("SELECT engisubj_ID FROM `engisubject` where subject_name =    '$subject'");
                foreach($q->result() as $row){
                   $subj = $row->engisubj_ID;
                }
            }
            else if($value == 'comcolg'){
                $q = $this->db->query("SELECT Commercesubj_ID FROM `commercesubject` where subject_name = '$subject'");
                foreach($q->result() as $row){
                     $subj = $row->Commercesubj_ID;
                }
            }
        }
        
        $q2 = $this->db->query("SELECT * FROM `teacher_subject_mapping`");
            foreach($q2->result() as $row){
                $subjIds = explode(",",$row->subject_id);
                if(in_array($subj,$subjIds)){
                    $tcm_id[] = $row->tcm_ID;
                $teach_id[] = $row->teacher_id;
                }
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
    function teacher_subject_mapping_attend(){
        $q1 = $this->db->query("SELECT * FROM  `teacher_subject_mapping` ");
            foreach($q1->result() as $row){
                if($row->standard_name <= 10 && is_numeric($row->standard_name)){
                    $subIds = explode(",",$row->subject_id);
                    foreach($subIds as $ids){
                        $q1 = $this->db->query("SELECT subject_ID,subject_name FROM  `subject` WHERE subject_id = '$ids'");
                        foreach($q1->result() as $row1){
                            $subject[] = $row1;
                        }
                    }
                } 
                else if($row->standard_name > 10 && $row->standard_name <= 12){
                    if($row->branch_name == 'Science'){
                        $subIds = explode(",",$row->subject_id);
                        foreach($subIds as $ids){
                            $q1 = $this->db->query("SELECT colgsubj_ID,subject_name FROM  `jrColgSci` WHERE colgsubj_ID = '$ids'");
                            foreach($q1->result() as $row1){
                                $subject[] = $row1;
                            }
                        }
    
                    }
                    else if($row->branch_name == 'Commerce'){
                        $subIds = explode(",",$row->subject_id);
                        foreach($subIds as $ids){
                            $q1 = $this->db->query("SELECT colgsubj_ID,subject_name FROM  `jrColgCom` WHERE colgsubj_ID = '$ids'");
                            foreach($q1->result() as $row1){
                                $subject[] = $row1;
                            }
                        }
    
                    }
                    else if($row->branch_name == 'Art'){
                        $subIds = explode(",",$row->subject_id);
                        foreach($subIds as $ids){
                            $q1 = $this->db->query("SELECT colgsubj_ID,subject_name FROM  `jrColgArt` WHERE colgsubj_ID = '$ids'");
                            foreach($q1->result() as $row1){
                                $subject[] = $row1;
                            }
                        }
    
                    }
                }
                else if($row->standard_name == 'Engineering'){
                    $subIds = explode(",",$row->subject_id);
                        foreach($subIds as $ids){
                            $q1 = $this->db->query("SELECT engisubj_ID,subject_name FROM  `engisubject` WHERE engisubj_ID = '$ids'");
                            foreach($q1->result() as $row1){
                                $subject[] = $row1;
                            }
                        }
   
                 }
                else if($row->standard_name == 'Commerce'){
                    $subIds = explode(",",$row->subject_id);
                        foreach($subIds as $ids){
                            $q1 = $this->db->query("SELECT Commercesubj_ID,subject_name FROM  `commercesubject` WHERE Commercesubj_ID = '$ids'");
                            foreach($q1->result() as $row1){
                                $subject[] = $row1;
                            }
                        }
   
                 }
            }
        return $subject;
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
    function marks_detail(){
        $q = $this->db->query("SELECT * FROM `marks` ORDER BY marks_ID DESC");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
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

    function bar() 
     {
                   
          $categoryArray=array();
          $dataseries1=array();
          $dataseries2=array();
          $dataseries3=array(); 
          $res = $this->db->query("SELECT DISTINCT category,value1,value2,value3 FROM  `bar`");
         if($res->num_rows() >0){
          foreach ($res->result_array() as $row) {
            array_push($categoryArray, array(
            "label" => $row["category"]
          )
        );
        array_push($dataseries1, array(
          "value" => $row["value1"]
          )
        );

        array_push($dataseries2, array(
          "value" => $row["value2"]
          )
        );
        array_push($dataseries3, array(
          "value" => $row["value3"]
          )
        );
       
        $data[]=$row;
      }      
      }  
       return $data; 
    }


    public function staff()
    {
        $sql = $this->db->query("SELECT * FROM staff_details order by staffDetail_ID DESC");
        if($sql->num_rows() > 0){
             foreach($sql->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }   
     public function utilities()
    {
        $sql = $this->db->query("SELECT * FROM utilities order by utilities_ID DESC");
        if($sql->num_rows() > 0){
             foreach($sql->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }   
    public function transport()
    {
        $sql = $this->db->query("SELECT * FROM transport order by transport_ID DESC");
        if($sql->num_rows() > 0){
             foreach($sql->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    } 
       
    public function mealsentertain()
    {
        $sql = $this->db->query("SELECT * FROM meals_entertain order by meals_entertain_ID DESC");
        if($sql->num_rows() > 0){
             foreach($sql->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }  
     public function maintenance()
    {
        $sql = $this->db->query("SELECT * FROM maintenance order by maintenance_ID DESC");
        if($sql->num_rows() > 0){
             foreach($sql->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }   
     public function rent()
    {
        $sql = $this->db->query("SELECT * FROM rent order by rent_ID DESC");
        if($sql->num_rows() > 0){
             foreach($sql->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }
    // public function staffpayment()
    // {
    //     $sql = $this->db->query("SELECT * FROM staff_details order by staff_ID DESC");
    //     if($sql->num_rows() > 0){
    //          foreach($sql->result() as $row){
    //             $data[]=$row;
    //         }

    //      } 
    //       // return $data;
    //      $sql = $this->db->query("SELECT * FROM staff");
    //     if($sql->num_rows() > 0){
    //          foreach($sql->result() as $row){
    //             $data[]=$row;
    //         }
    //     }

    //      return $data;
    // } 
    function staffPaidDetails(){
        // echo $data['staff_name'];
        $sql = $this->db->query("SELECT * FROM staff");
        if($sql->num_rows() > 0){
             foreach($sql->result() as $row){
                $data[]=$row;
            }
        }
          return $data;
    }
    function enquiry(){
        $sql = $this->db->query("SELECT * FROM enquiry");
        if($sql->num_rows() > 0){
             foreach($sql->result() as $row){
                $data[]=$row;
            }
        }
          return $data;
    }
    function enquiryselect($id){
        $sql = $this->db->query("SELECT * FROM enquiry where enquiry_ID = '$id'");
        if($sql->num_rows() > 0){
             foreach($sql->result() as $row){
                $data[]=$row;
            }
        }
          return $data;
    }
    function test_update($id){
        $sql = $this->db->query("SELECT * FROM test where test_ID = '$id'");
        if($sql->num_rows() > 0){
             foreach($sql->result() as $row){
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
    function ViewSms(){
        $sql = $this->db->query("SELECT * FROM sms order by sms_ID DESC");
        if($sql->num_rows() > 0){
             foreach($sql->result() as $row){
                $data[]=$row;
            }
        }
          return $data;
    }
    function ViewBulkSms(){
        $sql = $this->db->query("SELECT * FROM smsBulk order by sms_ID DESC");
        if($sql->num_rows() > 0){
             foreach($sql->result() as $row){
                $data[]=$row;
            }
        }
          return $data;
    }
    function filterByDate($to,$from){
        $sql = $this->db->query("SELECT * FROM sms WHERE date BETWEEN '" . $to . "' AND  '" . $from . "'ORDER by date DESC");
        if($sql->num_rows() > 0){
             foreach($sql->result() as $row){
                $data[]=$row;
            }
        }
          return $data;
    }
    function uploadView(){
        $sql = $this->db->query("SELECT * FROM `upload` ORDER by upload_ID DESC");
        if($sql->num_rows() > 0){
             foreach($sql->result() as $row){
                $data[]=$row;
            }
        }
          return $data;
    }
    function ImportContactView($listname){
        $sql = $this->db->query("SELECT * FROM `import` WHERE list_name='$listname'");
        if($sql->num_rows() > 0){
             foreach($sql->result() as $row){
                $data[]=$row;
            }
        }
          return $data;
    }
    function ListContactView(){
        $sql = $this->db->query("SELECT DISTINCT list_name,created_date FROM `import`; ");
        if($sql->num_rows() > 0){
             foreach($sql->result() as $row){
                $data[]=$row;
            }
        }
          return $data;
    }
}
?>