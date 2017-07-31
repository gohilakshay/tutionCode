<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class CreateDbTable_cont extends CI_Controller
{
    function standard()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('SelectData');
        $configdbfly=$this->config->config['sysdb'];
        $configdbfly['username'] = 'root'; /* Default db */
        $configdbfly['password'] = ''; /* Default db */
        $configdbfly['database'] = 'admin_db'; /* Default db */
        $this->load->database($configdbfly);
        $query['result'] = $this->SelectData->dbSelect();
        $this->db->close();
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $dbname = $db['database'];
        foreach($query as $value){
            foreach($value as $value1){
                $dbName = $value1->dbName;
                if($dbName == $dbname){
                    $type=$value1->dbType; //finding the database name and the name stored in the admin tb
                }
            }
        }
        $ntype = explode(",",$type);
        $n = count($ntype);
        $this->load->model('CreateTable');
        $this->CreateTable->create_standard();
        $this->load->model('InsertTable');
        for($a=0;$a<$n;$a++){               //if class has more one type
            $type = $ntype[$a];
            if($type=='school'){
                for($i=1;$i<11;$i++)
                {
                    if($i==1){
                        $data = array(
                        'standard_name' => $i.'st'
                    );
                     $this->InsertTable->addStd($data);
                    }
                    elseif ($i==2){
                        $data = array(
                        'standard_name' => $i.'nd'
                    );
                     $this->InsertTable->addStd($data);
                    }
                    elseif ($i==3){
                        $data = array(
                        'standard_name' => $i.'rd'
                    );
                     $this->InsertTable->addStd($data);
                    }
                    else{
                    $data = array(
                        'standard_name' => $i.'th'
                    );
                    $this->InsertTable->addStd($data);
                    }
                }
            }
            else if($type == 'jrcolg_sci' || $type == 'jrcolg_com'){
                for($i=11;$i<13;$i++)
                {
                    $data = array(
                        'standard_name' => $i.'th'
                    );
                    $this->InsertTable->addStd($data);
                }
            }
            else if($type == 'engicolg'){
                $data = array(
                  'standard_name' => 'Engineering'
               );
                $this->InsertTable->addStd($data);
               }

            else if($type == 'comcolg') {
                $data = array(
                    'standard_name' => 'Commerce'
                );
                $this->InsertTable->addStd($data);
            }
        }
        $this->load->view('createInitTable');
    }
           
   
    function semester()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('SelectData');
        $configdbfly=$this->config->config['sysdb'];
        $configdbfly['username'] = 'root'; /* Default db */
        $configdbfly['password'] = ''; /* Default db */
        $configdbfly['database'] = 'admin_db'; /* Default db */
        $this->load->database($configdbfly);
        $query['result'] = $this->SelectData->dbSelect();
        $this->db->close();
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $dbname = $db['database'];
        foreach($query as $value){
            foreach($value as $value1){
                $dbName = $value1->dbName;
                if($dbName == $dbname){
                    $type=$value1->dbType; //finding the database name and the name stored in the admin tb
                }
            }
        }
        $ntype = explode(",",$type);
        $n = count($ntype);
        $this->load->model('CreateTable');
        $this->CreateTable->create_semester();
        $this->load->model('InsertTable');
        for($i=1;$i<9;$i++)  //create all 8 sem for all 
        {
            if($i==1){
                $data = array(
                    'semester' => '1'
                );
                $this->InsertTable->addSem($data);
            }
            else if($i==2){
                $data = array(
                    'semester' => '2'
                );
                $this->InsertTable->addSem($data);
            }
            else if($i==3){
                $data = array(
                    'semester' => '3'
                );
                $this->InsertTable->addSem($data);
            }
            else if($i==4){
                $data = array(
                    'semester' => '4'
                );
                $this->InsertTable->addSem($data);
            }
            else if($i==5){
                $data = array(
                    'semester' => '5'
                );
                $this->InsertTable->addSem($data);
            }
            else if($i==6){
                $data = array(
                    'semester' => '6'
                );
                $this->InsertTable->addSem($data);
            }
            else if($i==7){
                $data = array(
                    'semester' => '7'
                );
                $this->InsertTable->addSem($data);
            } 
            else {
                $data = array(
                    'semester' => '8'
                );
                $this->InsertTable->addSem($data);
            }
        }
        $this->load->view('createInitTable');
    }
    function branch()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('SelectData');
        $configdbfly=$this->config->config['sysdb'];
        $configdbfly['username'] = 'root'; /* Default db */
        $configdbfly['password'] = ''; /* Default db */
        $configdbfly['database'] = 'admin_db'; /* Default db */
        $this->load->database($configdbfly);
        $query['result'] = $this->SelectData->dbSelect();
        $this->db->close();
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $dbname = $db['database'];
        foreach($query as $value){
            foreach($value as $value1){
                $dbName = $value1->dbName;
                if($dbName == $dbname){
                    $type=$value1->dbType; //finding the database name and the name stored in the admin tb
                }
            }
        }
        $ntype = explode(",",$type);
        $n = count($ntype);
        $this->load->model('CreateTable');
        $this->CreateTable->create_branch();
        $this->load->model('InsertTable');
        for($a=0;$a<$n;$a++){               //if class has more one type
            $type = $ntype[$a];
            if($type=='school'){
                for($i=1;$i<2;$i++)
                {
                    if($i==1){
                        $data = array(
                        'branch_name' => 'School',
                        'standard_name' => '1 to 10'
                    );
                        $this->InsertTable->addBranch($data);
                    }   
                }
            }
            else if($type == 'jrcolg_sci'){
                for($i=1;$i<3;$i++)
                {
                    if($i==1){
                        $data = array(
                        'branch_name' => 'Science',
                        'standard_name' => 'Science'
                    );
                        $this->InsertTable->addBranch($data);
                    }
                    else if($i==2){
                        $data = array(
                        'branch_name' => 'Science',
                        'standard_name' => 'Science'
                    );
                        $this->InsertTable->addBranch($data);
                    }
                }
                
            }
            else if($type == 'jrcolg_com'){
                for($i=1;$i<3;$i++)
                {
                    if($i==1){
                        $data = array(
                        'branch_name' => 'Commerce',
                        'standard_name' => 'Commerce'
                    );
                        $this->InsertTable->addBranch($data);
                    }
                    else if($i==2){
                        $data = array(
                        'branch_name' => 'Commerce',
                        'standard_name' => 'Commerce'
                    );
                        $this->InsertTable->addBranch($data);
                    }
                }
                
            }
            else if($type == 'engicolg'){
                for($i=5;$i<11;$i++)
                {
                     if($i==5){
                        $data = array(
                        'branch_name' => 'Computer Engineering',
                        'standard_name' => 'Engineering'
                    );
                        $this->InsertTable->addBranch($data);
                    }
                    else if($i==6){
                        $data = array(
                        'branch_name' => 'Information Technology Engineering',
                        'standard_name' => 'Engineering'
                    );
                        $this->InsertTable->addBranch($data);
                    }
                    else if($i==7){
                        $data = array(
                        'branch_name' => 'Electronics Engineering',
                        'standard_name' => 'Engineering'
                    );
                        $this->InsertTable->addBranch($data);
                    }
                    else if($i==8){
                        $data = array(
                        'branch_name' => 'Electronics and Telecommunication',
                        'standard_name' => 'Engineering'
                    );
                        $this->InsertTable->addBranch($data);
                    }
                    else if($i==9){
                        $data = array(
                        'branch_name' => 'Mechanical Engineering',
                        'standard_name' => 'Engineering'
                    );
                        $this->InsertTable->addBranch($data);
                    }
                    else if($i==10){
                        $data = array(
                        'branch_name' => 'Civil Engineering',
                        'standard_name' => 'Engineering'
                    );
                        $this->InsertTable->addBranch($data);
                    }
                }
            }
            else if($type == 'comcolg'){
                for($i=11;$i<14;$i++)
                {
                     if($i==11){
                        $data = array(
                        'branch_name' => 'Bachelor of Accounting and Finance',
                        'standard_name' => 'Commerce'
                    );
                        $this->InsertTable->addBranch($data);
                    }
                    else if($i==12){
                        $data = array(
                        'branch_name' => 'Bachelor of Commerce',
                        'standard_name' => 'Commerce'
                    );
                        $this->InsertTable->addBranch($data);
                    }
                    else {
                        $data = array(
                        'branch_name' => 'Bachelor of Management Studies',
                        'standard_name' => 'Commerce'
                    );
                        $this->InsertTable->addBranch($data);
                    }
                }
            }
        }
        $this->load->view('createInitTable');
    }
    function subject()
    {
        $this->load->helper('url');
       $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('SelectData');
        $configdbfly=$this->config->config['sysdb'];
        $configdbfly['username'] = 'root'; /* Default db */
        $configdbfly['password'] = ''; /* Default db */
        $configdbfly['database'] = 'admin_db'; /* Default db */
        $this->load->database($configdbfly);
        $query['result'] = $this->SelectData->dbSelect();
        $this->db->close();
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $dbname = $db['database'];
        foreach($query as $value){
            foreach($value as $value1){
                $dbName = $value1->dbName;
                if($dbName == $dbname){
                    $type=$value1->dbType; //finding the database name and the name stored in the admin tb
                }
            }
        }
        $ntype = explode(",",$type);
        $n = count($ntype);
        $this->load->model('CreateTable');
        $this->load->model('InsertTable');
        for($a=0;$a<$n;$a++){               //if class has more one type
            $type = $ntype[$a];
            if($type=='school'){
                $this->CreateTable->create_subject();
                for($i=1;$i<11;$i++)
                {    
                    if($i==1){                         
                        $data = array(
                        'subject_name' => 'English'
                    );
                        $this->InsertTable->addSchoolSubj($data);
                    }
                    else if($i==2){                         
                        $data = array(
                        'subject_name' => 'Hindi'
                    );
                        $this->InsertTable->addSchoolSubj($data);
                    }
                    else if($i==3){                         
                        $data = array(
                        'subject_name' => 'Marathi'
                    );
                        $this->InsertTable->addSchoolSubj($data);
                    }
                    else if($i==4){                         
                        $data = array(
                        'subject_name' => 'Mathematics'
                    );
                        $this->InsertTable->addSchoolSubj($data);
                    }
                    else if($i==5){                         
                        $data = array(
                        'subject_name' => 'Science'
                    );
                        $this->InsertTable->addSchoolSubj($data);
                    }
                    else if($i==6){                         
                        $data = array(
                        'subject_name' => 'History'
                    );
                        $this->InsertTable->addSchoolSubj($data);
                    }
                    else if($i==7){                         
                        $data = array(
                        'subject_name' => 'Geography'
                    );
                        $this->InsertTable->addSchoolSubj($data);
                    }
                    else if($i==8){                         
                        $data = array(
                        'subject_name' => 'Economics'
                    );
                        $this->InsertTable->addSchoolSubj($data);
                    }
                    else if($i==9){                         
                        $data = array(
                        'subject_name' => 'Sanskrit'
                    );
                        $this->InsertTable->addSchoolSubj($data);
                    }
                    else if($i==10){                         
                        $data = array(
                        'subject_name' => 'French'
                    );
                        $this->InsertTable->addSchoolSubj($data);
                    }
                    else {                         
                        $data = array(
                        'subject_name' => 'Gujarati'
                    );
                        $this->InsertTable->addSchoolSubj($data);
                    }

                }
            }
            else if($type=='jrcolg_sci'){
                $this->CreateTable->create_collegesubject();
                    for($i=1;$i<10;$i++)
                {    
                    if($i==1){                         //11th & 12th Science
                        $data = array(
                        'subject_name' => 'English',
                        'semester_ID' => '1',
                        'branch_ID' => 'Science'
                    );
                        $this->InsertTable->addCollegeSubj($data);
                    }
                    else if($i==2){                         
                        $data = array(
                        'subject_name' => 'Hindi',
                        'semester_ID' => '1',
                        'branch_ID' => 'Science'
                    );
                        $this->InsertTable->addCollegeSubj($data);
                    }
                    else if($i==3){                         
                        $data = array(
                        'subject_name' => 'Marathi',
                        'semester_ID' => '1',
                        'branch_ID' => 'Science'
                    );
                        $this->InsertTable->addCollegeSubj($data);
                    }
                    else if($i==4){                         
                        $data = array(
                        'subject_name' => 'Mathematics',
                        'semester_ID' => '1',
                        'branch_ID' => 'Science'
                    );
                        $this->InsertTable->addCollegeSubj($data);
                    }
                    else if($i==5){                         
                        $data = array(
                        'subject_name' => 'Biology',
                        'semester_ID' => '1',
                        'branch_ID' => 'Science'
                    );
                        $this->InsertTable->addCollegeSubj($data);
                    }
                    else if($i==6){                         
                        $data = array(
                        'subject_name' => 'Physics',
                        'semester_ID' => '1',
                        'branch_ID' => 'Science'
                    );
                        $this->InsertTable->addCollegeSubj($data);
                    }
                    else if($i==7){                         
                        $data = array(
                        'subject_name' => 'Chemistry',
                        'semester_ID' => '1',
                        'branch_ID' => 'Science'
                    );
                        $this->InsertTable->addCollegeSubj($data);
                    }
                    else if($i==8){                         
                        $data = array(
                        'subject_name' => 'Enviornmental Studies',
                        'semester_ID' => '1',
                        'branch_ID' => 'Science'
                    );
                        $this->InsertTable->addCollegeSubj($data);
                    }
                    else if($i==9){                         
                        $data = array(
                        'subject_name' => 'vocational',
                        'semester_ID' => '1',
                        'branch_ID' => 'Science'
                    );
                        $this->InsertTable->addCollegeSubj($data);
                    }                                       /*11th & 12th science ends*/    
                }
            }
            else if($type=='jrcolg_com'){
                $this->CreateTable->create_collegesubject();
                for($i=10;$i<22;$i++){
                     if($i==10){                      //11th & 12th commerce
                        $data = array(
                            'subject_name' => 'English',
                            'semester_ID' => '1',
                            'branch_ID' => 'Commerce'
                        );
                        $this->InsertTable->addCollegeSubj($data);
                    }
                    else if($i==11){
                        $data = array(
                        'subject_name' => 'Marathi',
                        'semester_ID' => '1',
                        'branch_ID' => 'Commerce'
                    );
                        $this->InsertTable->addCollegeSubj($data);
                    }
                    else if($i==12){
                        $data = array(
                        'subject_name' => 'Hindi',
                        'semester_ID' => '1',
                        'branch_ID' => 'Commerce'
                    );
                        $this->InsertTable->addCollegeSubj($data);
                    }
                    else if($i==13){
                        $data = array(
                        'subject_name' => 'Urdu',
                        'semester_ID' => '1',
                        'branch_ID' => 'Commerce'
                    );
                        $this->InsertTable->addCollegeSubj($data);
                    }
                    else if($i==14){
                        $data = array(
                        'subject_name' => 'Arabic',
                        'semester_ID' => '1',
                        'branch_ID' => 'Commerce'
                    );
                        $this->InsertTable->addCollegeSubj($data);
                    }
                    else if($i==15){
                        $data = array(
                        'subject_name' => 'Information Technology',
                        'semester_ID' => '1',
                        'branch_ID' => 'Commerce'
                    );
                        $this->InsertTable->addCollegeSubj($data);
                    }
                    else if($i==16){
                        $data = array(
                        'subject_name' => 'Environment Education',
                        'semester_ID' => '1',
                        'branch_ID' => 'Commerce'
                    );
                        $this->InsertTable->addCollegeSubj($data);
                    }
                    else if($i==17){
                        $data = array(
                        'subject_name' => 'Book-keeping and Accountancy',
                        'semester_ID' => '1',
                        'branch_ID' => 'Commerce'
                    );
                        $this->InsertTable->addCollegeSubj($data);
                    }
                    else if($i==18){
                        $data = array(
                        'subject_name' => 'Organisation of Commerce',
                        'semester_ID' => '1',
                        'branch_ID' => 'Commerce'
                    );
                        $this->InsertTable->addCollegeSubj($data);
                    }
                    else if($i==19){
                        $data = array(
                        'subject_name' => 'Economics',
                        'semester_ID' => '1',
                        'branch_ID' => 'Commerce'
                    );
                        $this->InsertTable->addCollegeSubj($data);
                    }
                    else if($i==20){
                        $data = array(
                        'subject_name' => 'Mathematics & Statistics',
                        'semester_ID' => '1',
                        'branch_ID' => 'Commerce'
                    );
                        $this->InsertTable->addCollegeSubj($data);
                    }
                    else {
                        $data = array(
                        'subject_name' => 'Secretarial Practice',
                        'semester_ID' => '1',
                        'branch_ID' => 'Commerce'
                    );
                        $this->InsertTable->addCollegeSubj($data);
                    }                                                 /*11th & 12th commerce ends*/
                }
            }
            else if($type=='engicolg'){
                $this->CreateTable->create_engisubject();
                for($i=1;$i<200;$i++)
                {
                    if($i==1){
                        $data = array(
                        'subject_name' => 'Applied Mathematics I',
                        'semester_ID' => '1',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==2){
                        $data = array(
                        'subject_name' => 'Applied Physics I',
                        'semester_ID' => '1',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==3){
                        $data = array(
                        'subject_name' => 'Applied Chemistry I',
                        'semester_ID' => '1',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==4){
                        $data = array(
                        'subject_name' => 'Engineering Mechanics',
                        'semester_ID' => '1',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==5){
                        $data = array(
                        'subject_name' => 'Basic Electrical & Electronics Engineering',
                        'semester_ID' => '1',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==6){
                        $data = array(
                        'subject_name' => 'Enviornmental Studies',
                        'semester_ID' => '1',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==7){
                        $data = array(
                        'subject_name' => 'Applied Mathematics II',
                        'semester_ID' => '2',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==8){
                        $data = array(
                        'subject_name' => 'Applied Physics II',
                        'semester_ID' => '2',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==9){
                        $data = array(
                        'subject_name' => 'Applied Chemistry II',
                        'semester_ID' => '2',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==10){
                        $data = array(
                        'subject_name' => 'Engineering Drawing',
                        'semester_ID' => '2',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==11){
                        $data = array(
                        'subject_name' => 'Structured Programming Approach',
                        'semester_ID' => '2',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==12){
                        $data = array(
                        'subject_name' => 'Communication Skills',
                        'semester_ID' => '2',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==13){
                        $data = array(
                        'subject_name' => 'Applied Mathematics III',
                        'semester_ID' => '3',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==14){
                        $data = array(
                        'subject_name' => 'Object Oriented Programming Methodology',
                        'semester_ID' => '3',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==15){
                        $data = array(
                        'subject_name' => 'Data Structures',
                        'semester_ID' => '3',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==16){
                        $data = array(
                        'subject_name' => 'Digital Logic Design & Analysis',
                        'semester_ID' => '3',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==17){
                        $data = array(
                        'subject_name' => 'Discrete Structures',
                        'semester_ID' => '3',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==18){
                        $data = array(
                        'subject_name' => 'Electronic Circuits & Communication Fundamentals',
                        'semester_ID' => '3',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==19){
                        $data = array(
                        'subject_name' => 'Applied Mathematics IV',
                        'semester_ID' => '4',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==20){
                        $data = array(
                        'subject_name' => 'Analysis Of Algorithm',
                        'semester_ID' => '4',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==21){
                        $data = array(
                        'subject_name' => 'Computer Organization & Architecture',
                        'semester_ID' => '4',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==22){
                        $data = array(
                        'subject_name' => 'Database Management System',
                        'semester_ID' => '4',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==23){
                        $data = array(
                        'subject_name' => 'Theoretical Computer Science',
                        'semester_ID' => '4',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==24){
                        $data = array(
                        'subject_name' => 'Computer Graphics',
                        'semester_ID' => '4',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==25){
                        $data = array(
                        'subject_name' => 'Microprocessor',
                        'semester_ID' => '5',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==26){
                        $data = array(
                        'subject_name' => 'Operating Systems',
                        'semester_ID' => '5',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==27){
                        $data = array(
                        'subject_name' => 'Structured and Object Oriented  Analysis and
        Design',
                        'semester_ID' => '5',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==28){
                        $data = array(
                        'subject_name' => 'Computer Networks',
                        'semester_ID' => '5',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==29){
                        $data = array(
                        'subject_name' => 'Web Technologies  ',
                        'semester_ID' => '5',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==30){
                        $data = array(
                        'subject_name' => 'Business Communication and Ethics',
                        'semester_ID' => '5',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==31){
                        $data = array(
                        'subject_name' => 'System Programming and Compiler
        Construction',
                        'semester_ID' => '6',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==32){
                        $data = array(
                        'subject_name' => 'Software Engineering',
                        'semester_ID' => '6',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==33){
                        $data = array(
                        'subject_name' => 'Distributed Databases',
                        'semester_ID' => '6',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==34){
                        $data = array(
                        'subject_name' => 'Mobile Communication and Computing',
                        'semester_ID' => '6',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==35){
                        $data = array(
                        'subject_name' => 'Network Programming  ',
                        'semester_ID' => '6',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==36){
                        $data = array(
                        'subject_name' => 'Project Management',
                        'semester_ID' => '6',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==37){
                        $data = array(
                        'subject_name' => 'Operation Research',
                        'semester_ID' => '6',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==38){
                        $data = array(
                        'subject_name' => 'Foreigh Language – German',
                        'semester_ID' => '6',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==39){
                        $data = array(
                        'subject_name' => 'Foreigh Language – French',
                        'semester_ID' => '6',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==40){
                        $data = array(
                        'subject_name' => 'Digital Signal Processing',
                        'semester_ID' => '7',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==41){
                        $data = array(
                        'subject_name' => 'Cryptography and System Security',
                        'semester_ID' => '7',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==42){
                        $data = array(
                        'subject_name' => 'Artificial Intelligence',
                        'semester_ID' => '7',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==43){
                        $data = array(
                        'subject_name' => 'Network Threats and Attacks',
                        'semester_ID' => '7',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==44){
                        $data = array(
                        'subject_name' => 'Artificial Intelligence',
                        'semester_ID' => '7',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==45){
                        $data = array(
                        'subject_name' => 'Advance Algorithms',
                        'semester_ID' => '7',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==46){
                        $data = array(
                        'subject_name' => 'Computer  Simulation and Modeling',
                        'semester_ID' => '7',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==47){
                        $data = array(
                        'subject_name' => 'Image Processing',
                        'semester_ID' => '7',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==48){
                        $data = array(
                        'subject_name' => 'Software Architecture',
                        'semester_ID' => '7',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==49){
                        $data = array(
                        'subject_name' => 'Soft Computing',
                        'semester_ID' => '7',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==50){
                        $data = array(
                        'subject_name' => 'ERP  and Supply Chain Management',
                        'semester_ID' => '7',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==51){
                        $data = array(
                        'subject_name' => 'Data Warehouse and Mining',
                        'semester_ID' => '8',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==52){
                        $data = array(
                        'subject_name' => 'Human Machine Interaction',
                        'semester_ID' => '8',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==53){
                        $data = array(
                        'subject_name' => 'Parallel and distributed Systems',
                        'semester_ID' => '8',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==54){
                        $data = array(
                        'subject_name' => 'Cloud Computing',
                        'semester_ID' => '8',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==55){
                        $data = array(
                        'subject_name' => 'Machine Learning',
                        'semester_ID' => '8',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==56){
                        $data = array(
                        'subject_name' => 'Embedded Systems
        ',
                        'semester_ID' => '8',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==57){
                        $data = array(
                        'subject_name' => 'Adhoc wireless networks',
                        'semester_ID' => '8',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==58){
                        $data = array(
                        'subject_name' => 'Digital Forensic',
                        'semester_ID' => '8',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==59){
                        $data = array(
                        'subject_name' => 'Big data Analytics',
                        'semester_ID' => '8',
                        'branch_ID' => 'Computer Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);           //computer branch End
                    }     
                    else if($i==60){
                        $data = array(                                    //IT starts
                        'subject_name' => 'Data Structure & Algorithm Analysis',
                        'semester_ID' => '3',
                        'branch_ID' => 'Information Technology Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==61){
                        $data = array(                                    
                        'subject_name' => 'Analog & Digital Circuits',
                        'semester_ID' => '3',
                        'branch_ID' => 'Information Technology Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==62){
                        $data = array(                                    
                        'subject_name' => 'Principles of Analog &
        Digital Communication',
                        'semester_ID' => '3',
                        'branch_ID' => 'Information Technology Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==63){
                        $data = array(                                   
                        'subject_name' => 'Automata Theory',
                        'semester_ID' => '4',
                        'branch_ID' => 'Information Technology Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==64){
                        $data = array(           
                        'subject_name' => 'Web Programming',
                        'semester_ID' => '4',
                        'branch_ID' => 'Information Technology Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==65){
                        $data = array(                                    
                        'subject_name' => 'Information Theory and Coding',
                        'semester_ID' => '4',
                        'branch_ID' => 'Information Technology Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==66){
                        $data = array(                                    
                        'subject_name' => 'Computer Graphics
        and Virtual Reality',
                        'semester_ID' => '5',
                        'branch_ID' => 'Information Technology Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==67){
                        $data = array(                                    
                        'subject_name' => 'Microcontroller and
        Embedded Systems',
                        'semester_ID' => '5',
                        'branch_ID' => 'Information Technology Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==68){
                        $data = array(                                    
                        'subject_name' => 'Advanced Database
        Management Systems',
                        'semester_ID' => '5',
                        'branch_ID' => 'Information Technology Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==69){
                        $data = array(                                   
                        'subject_name' => 'Open Source
        Technologies',
                        'semester_ID' => '5',
                        'branch_ID' => 'Information Technology Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==70){
                        $data = array(                                    
                        'subject_name' => 'Distributed Systems',
                        'semester_ID' => '6',
                        'branch_ID' => 'Information Technology Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==71){
                        $data = array(                                    
                        'subject_name' => 'System & Web
        Security',
                        'semester_ID' => '6',
                        'branch_ID' => 'Information Technology Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==72){
                        $data = array(                                    
                        'subject_name' => 'Data Mining &
        Business Intelligence',
                        'semester_ID' => '6',
                        'branch_ID' => 'Information Technology Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==73){
                        $data = array(                                   
                        'subject_name' => 'Advance Internet
        Technology',
                        'semester_ID' => '6',
                        'branch_ID' => 'Information Technology Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==74){
                        $data = array(                                    
                        'subject_name' => 'Intelligent System',
                        'semester_ID' => '7',
                        'branch_ID' => 'Information Technology Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==75){
                        $data = array(                                    
                        'subject_name' => 'Wireless
        Technology',
                        'semester_ID' => '7',
                        'branch_ID' => 'Information Technology Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==76){
                        $data = array(                                    
                        'subject_name' => 'Storage Network Management and
        Retrieval',
                        'semester_ID' => '8',
                        'branch_ID' => 'Information Technology Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==77){
                        $data = array(                                    
                        'subject_name' => 'Big Data Analytics',
                        'semester_ID' => '8',
                        'branch_ID' => 'Information Technology Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==78){
                        $data = array(                                   
                        'subject_name' => 'Computer Simulation and Modeling',
                        'semester_ID' => '8',
                        'branch_ID' => 'Information Technology Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }                                                                    //IT ENDS

                    else if($i==79){                                                     //Electronics Starts   
                        $data = array(                                   
                        'subject_name' => 'Electronic Devices',
                        'semester_ID' => '3',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }                                                                    
                    else if($i==80){                                                     
                        $data = array(                                   
                        'subject_name' => 'Digital Circuits and
        Design',
                        'semester_ID' => '3',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }                                                                    
                    else if($i==81){                                                     
                        $data = array(                                   
                        'subject_name' => 'Circuit Theory',
                        'semester_ID' => '3',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }                                                                    
                    else if($i==82){                                                     
                        $data = array(                                   
                        'subject_name' => 'Electronic Instruments and
        Measurements',
                        'semester_ID' => '3',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }                                                                    
                    else if($i==83){                                                     
                        $data = array(                                   
                        'subject_name' => 'Discrete Electronic Circuits',
                        'semester_ID' => '4',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }                                                                    
                    else if($i==84){                                                     
                        $data = array(                                   
                        'subject_name' => 'Microprocessor and
        Peripherals',
                        'semester_ID' => '4',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }                                                                    
                    else if($i==85){                                                     
                        $data = array(                                   
                        'subject_name' => 'Principles of Control
        Systems',
                        'semester_ID' => '4',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }                                                                    
                    else if($i==86){                                                     
                        $data = array(                                   
                        'subject_name' => 'Fundamentals of
        Communication Engineering',
                        'semester_ID' => '4',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }                                                                    
                    else if($i==87){                                                     
                        $data = array(                                   
                        'subject_name' => 'Electrical Machines',
                        'semester_ID' => '4',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }                                                                    
                    else if($i==88){                                                     
                        $data = array(                                   
                        'subject_name' => 'Microcontrollers and
        Applications',
                        'semester_ID' => '5',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }                                                                    
                    else if($i==89){                                                     
                        $data = array(                                   
                        'subject_name' => 'Design with Linear
        Integrated Circuits',
                        'semester_ID' => '5',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }                                                                    
                    else if($i==90){                                                     
                        $data = array(                                   
                        'subject_name' => 'Electromagnetic
        Engineering',
                        'semester_ID' => '5',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }                                                                    
                    else if($i==91){                                                     
                        $data = array(                                   
                        'subject_name' => 'Signals and Systems',
                        'semester_ID' => '5',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }                                                                    
                    else if($i==92){                                                     
                        $data = array(                                   
                        'subject_name' => 'Digital Communication',
                        'semester_ID' => '5',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }                                                                    
                    else if($i==93){                                                     
                        $data = array(                                   
                        'subject_name' => 'Basic VLSI Design',
                        'semester_ID' => '6',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }                                                                    
                    else if($i==94){                                                     
                        $data = array(                                   
                        'subject_name' => 'Advanced Instrumentation
        Systems',
                        'semester_ID' => '6',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }                                                                    
                    else if($i==95){                                                     
                        $data = array(                                   
                        'subject_name' => 'Computer Organization',
                        'semester_ID' => '6',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }                                                            
                    else if($i==96){                                                     
                        $data = array(                                   
                        'subject_name' => 'Power Electronics I',
                        'semester_ID' => '6',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }   
                    else if($i==97){                                                     
                        $data = array(                                   
                        'subject_name' => 'Digital Signal Processing and Processors',
                        'semester_ID' => '6',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==98){                                                     
                        $data = array(                                   
                        'subject_name' => 'Modern Information Technology for Management ',
                        'semester_ID' => '6',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==99){                                                     
                        $data = array(                                   
                        'subject_name' => 'Embedded System Design',
                        'semester_ID' => '7',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==100){                                                     
                        $data = array(                                   
                        'subject_name' => 'IC Technology',
                        'semester_ID' => '7',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==101){                                                     
                        $data = array(                                   
                        'subject_name' => 'Power Electronics –II',
                        'semester_ID' => '7',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==102){                                                     
                        $data = array(                                   
                        'subject_name' => 'Computer Communication Networks',
                        'semester_ID' => '7',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==103){                                                     
                        $data = array(                                   
                        'subject_name' => 'Digital Image Processing',
                        'semester_ID' => '7',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==104){                                                     
                        $data = array(                                   
                        'subject_name' => 'Artificial Intelligence',
                        'semester_ID' => '7',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==105){                                                     
                        $data = array(                                   
                        'subject_name' => 'ASIC Verification',
                        'semester_ID' => '7',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==106){                                                     
                        $data = array(                                   
                        'subject_name' => 'Optical Fiber Communication',
                        'semester_ID' => '7',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==107){                                                     
                        $data = array(                                   
                        'subject_name' => 'CMOS VLSI Design',
                        'semester_ID' => '8',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==108){                                                     
                        $data = array(                                   
                        'subject_name' => 'Advanced Networking Technologies',
                        'semester_ID' => '8',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==109){                                                     
                        $data = array(                                   
                        'subject_name' => 'MEMS Technology',
                        'semester_ID' => '8',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==110){                                                     
                        $data = array(                                   
                        'subject_name' => 'Robotics',
                        'semester_ID' => '8',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==111){                                                     
                        $data = array(                                   
                        'subject_name' => 'Mobile Communication',
                        'semester_ID' => '8',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==112){                                                     
                        $data = array(                                   
                        'subject_name' => 'Digital Control System',
                        'semester_ID' => '8',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);
                    }
                    else if($i==113){                                                     
                        $data = array(                                   
                        'subject_name' => 'Biomedical Electronics',
                        'semester_ID' => '8',
                        'branch_ID' => 'Electronics Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        //Electronics Ends
                    }
                    else if($i==114){                                  //EXTC starts                                                                  
                        $data = array(                                   
                        'subject_name' => 'Analog Electronics I',
                        'semester_ID' => '3',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==115){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Digital Electronics',
                        'semester_ID' => '3',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==116){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Circuits and Transmission Lines',
                        'semester_ID' => '3',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==117){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Electronic Instruments and Measurements',
                        'semester_ID' => '3',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==118){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Analog Electronics II ',
                        'semester_ID' => '4',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==119){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Microprocessor and Peripherals',
                        'semester_ID' => '4',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==120){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Wave Theory and Propagation',
                        'semester_ID' => '4',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==121){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Signals and Systems',
                        'semester_ID' => '4',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==122){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Control Systems',
                        'semester_ID' => '4',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==123){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Microcontrollers and Applications',
                        'semester_ID' => '5',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==124){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Analog Communication ',
                        'semester_ID' => '5',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==125){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Random Signal Analysis',
                        'semester_ID' => '5',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==126){                                                                            
                        $data = array(                                   
                        'subject_name' => 'RF Modeling and Antennas',
                        'semester_ID' => '5',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==127){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Integrated Circuits',
                        'semester_ID' => '5',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==128){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Digital Communication',
                        'semester_ID' => '6',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==129){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Discrete Time Signal Processing',
                        'semester_ID' => '6',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==130){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Computer Communication and Telecom Networks',
                        'semester_ID' => '6',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==131){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Television Engineering',
                        'semester_ID' => '6',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==132){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Operating Systems',
                        'semester_ID' => '6',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==133){                                                                            
                        $data = array(                                   
                        'subject_name' => 'VLSI Design',
                        'semester_ID' => '6',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==134){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Image and Video Processing',
                        'semester_ID' => '7',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==135){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Mobile Communication',
                        'semester_ID' => '7',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==136){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Optical Communication and Networks',
                        'semester_ID' => '7',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==137){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Microwave and Radar Engineering',
                        'semester_ID' => '7',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==138){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Data Compression and Encryption ',
                        'semester_ID' => '7',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==139){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Statistical Signal Processing',
                        'semester_ID' => '7',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==140){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Neural Network and Fuzzy Logic ',
                        'semester_ID' => '7',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==141){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Analog and Mixed Signal VLSI',
                        'semester_ID' => '7',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==142){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Wireless Networks',
                        'semester_ID' => '8',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==143){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Satellite communication and Networks',
                        'semester_ID' => '8',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==144){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Internet and Voice Communication',
                        'semester_ID' => '8',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==145){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Speech Processing ',
                        'semester_ID' => '8',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==146){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Telecom Network Management',
                        'semester_ID' => '8',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==147){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Microwave Integrated Circuits',
                        'semester_ID' => '8',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==148){                                                                            
                        $data = array(                                   
                        'subject_name' => 'Ultra Wideband Communication',
                        'semester_ID' => '8',
                        'branch_ID' => 'Electronics and Telecommunication'
                    );
                        $this->InsertTable->addEngiSubj($data);        //EXTC Ends
                    }
                    else if($i==149){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Thermodynamics',
                        'semester_ID' => '3',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==150){                             //Mechanical starts                                                             
                        $data = array(                                   
                        'subject_name' => 'Strength of Materials',
                        'semester_ID' => '3',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==151){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Production Process- I',
                        'semester_ID' => '3',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==152){                                                                                         
                        $data = array(                                   
                        'subject_name' => ' Computer Aided M/c Drawing',
                        'semester_ID' => '3',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==153){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Data Base & Information Retrieval System',
                        'semester_ID' => '3',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==154){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Machine Shop Practice- I',
                        'semester_ID' => '3',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==155){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Fluid Mechanics',
                        'semester_ID' => '4',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==156){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Theory of Machines- I',
                        'semester_ID' => '4',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==157){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Production Process- II',
                        'semester_ID' => '4',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==158){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Material Technology',
                        'semester_ID' => '4',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==159){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Industrial Electronics$',
                        'semester_ID' => '4',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==160){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Machine Shop Practice- II',
                        'semester_ID' => '4',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==161){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'I C Engines',
                        'semester_ID' => '5',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==162){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Mechanical Measurements and Control',
                        'semester_ID' => '5',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==163){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Production Process-III',
                        'semester_ID' => '5',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==164){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Theory of Machines- II',
                        'semester_ID' => '5',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==165){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Heat Transfer',
                        'semester_ID' => '5',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==166){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Metrology and Quality Engineering',
                        'semester_ID' => '6',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==167){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Machine Design I',
                        'semester_ID' => '6',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==168){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Mechanical Vibrations',
                        'semester_ID' => '6',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==169){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Thermal and Fluid Power Engineering',
                        'semester_ID' => '6',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==170){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Mechatronics',
                        'semester_ID' => '6',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==171){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Finite Element Analysis',
                        'semester_ID' => '6',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==172){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Machine Design -II',
                        'semester_ID' => '7',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==173){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'CAD/CAM/CAE',
                        'semester_ID' => '7',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==174){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Mechanical Utility Systems ',
                        'semester_ID' => '7',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==175){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Production Planning and Control',
                        'semester_ID' => '7',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==176){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Design of Mechanical Systems',
                        'semester_ID' => '8',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==177){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Industrial Engineering and Management',
                        'semester_ID' => '8',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==178){                                                                                         
                        $data = array(                                   
                        'subject_name' => 'Refrigeration and Air Conditioning',
                        'semester_ID' => '8',
                        'branch_ID' => 'Mechanical Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);           //Mechanics Ends       
                    }
                    else if($i==179){                                     //   Civil Starts                                                                              
                        $data = array(                                   
                        'subject_name' => 'Surveying – I ',
                        'semester_ID' => '3',
                        'branch_ID' => 'Civil Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==180){                                                                                                                   
                        $data = array(                                   
                        'subject_name' => 'Strength of Materials ',
                        'semester_ID' => '3',
                        'branch_ID' => 'Civil Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==181){                                                                                                                   
                        $data = array(                                   
                        'subject_name' => 'Building Materials and Construction',
                        'semester_ID' => '3',
                        'branch_ID' => 'Civil Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==182){                                                                                                                   
                        $data = array(                                   
                        'subject_name' => 'Engineering Geology ',
                        'semester_ID' => '3',
                        'branch_ID' => 'Civil Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==183){                                                                                                                   
                        $data = array(                                   
                        'subject_name' => 'Fluid Mechanics – I',
                        'semester_ID' => '3',
                        'branch_ID' => 'Civil Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==184){                                                                                                                   
                        $data = array(                                   
                        'subject_name' => 'Database and Information Retrieval System',
                        'semester_ID' => '3',
                        'branch_ID' => 'Civil Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==185){                                                                                                                   
                        $data = array(                                   
                        'subject_name' => 'Surveying – II ',
                        'semester_ID' => '4',
                        'branch_ID' => 'Civil Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==186){                                                                                                                   
                        $data = array(                                   
                        'subject_name' => 'Structural Analysis – I ',
                        'semester_ID' => '4',
                        'branch_ID' => 'Civil Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==187){                                                                                                                   
                        $data = array(                                   
                        'subject_name' => 'Building Design and Drawing – I',
                        'semester_ID' => '4',
                        'branch_ID' => 'Civil Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==188){                                                                                                                   
                        $data = array(                                   
                        'subject_name' => 'Concrete Technology ',
                        'semester_ID' => '4',
                        'branch_ID' => 'Civil Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==189){                                                                                                                   
                        $data = array(                                   
                        'subject_name' => 'Fluid Mechanics – II',
                        'semester_ID' => '4',
                        'branch_ID' => 'Civil Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==190){                                                                                                                   
                        $data = array(                                   
                        'subject_name' => 'Geotechnical Engg.– I ',
                        'semester_ID' => '5',
                        'branch_ID' => 'Civil Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==191){                                                                                                                   
                        $data = array(                                   
                        'subject_name' => 'Building Design and Drawing – II ',
                        'semester_ID' => '5',
                        'branch_ID' => 'Civil Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==192){                                                                                                                   
                        $data = array(                                   
                        'subject_name' => 'Applied Hydraulics – I',
                        'semester_ID' => '5',
                        'branch_ID' => 'Civil Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==193){                                                                                                                   
                        $data = array(                                   
                        'subject_name' => 'Transportation Engg. – I',
                        'semester_ID' => '5',
                        'branch_ID' => 'Civil Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==194){                                                                                                                   
                        $data = array(                                   
                        'subject_name' => 'Employment and
        Corporate Skills',
                        'semester_ID' => '5',
                        'branch_ID' => 'Civil Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==195){                                                                                                                   
                        $data = array(                                   
                        'subject_name' => 'Geotechnical Engg. – II ',
                        'semester_ID' => '6',
                        'branch_ID' => 'Civil Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==196){                                                                                                                   
                        $data = array(                                   
                        'subject_name' => 'Design and Drawing of Steel Structures',
                        'semester_ID' => '6',
                        'branch_ID' => 'Civil Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==197){                                                                                                                   
                        $data = array(                                   
                        'subject_name' => 'Applied Hydraulics – II',
                        'semester_ID' => '6',
                        'branch_ID' => 'Civil Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==198){                                                                                                                   
                        $data = array(                                   
                        'subject_name' => 'Transportation Engg. – II',
                        'semester_ID' => '6',
                        'branch_ID' => 'Civil Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else if($i==199){                                                                                                                   
                        $data = array(                                   
                        'subject_name' => 'Environmental Engg – I',
                        'semester_ID' => '6',
                        'branch_ID' => 'Civil Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }
                    else {                                                                                                                   
                        $data = array(                                   
                        'subject_name' => 'Theory of Reinforced Prestressed Concrete',
                        'semester_ID' => '6',
                        'branch_ID' => 'Civil Engineering'
                    );
                        $this->InsertTable->addEngiSubj($data);        
                    }                                //Civil Ends sem7 & 8 subjects are not available
                }
            }
            else if($type=='comcolg'){
                $this->CreateTable->create_Commercesubject();
                for($i=1;$i<100;$i++)
                {    
                    if($i==1){                         //BAF starts
                        $data = array(
                        'subject_name' => 'Financial Accounting-I',
                        'semester_ID' => '1',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==2){                         
                        $data = array(
                        'subject_name' => 'Cost Accounting-I',
                        'semester_ID' => '1',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==3){                         
                        $data = array(
                        'subject_name' => 'Economics-I',
                        'semester_ID' => '1',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==4){                         
                        $data = array(
                        'subject_name' => 'Commerce-I',
                        'semester_ID' => '1',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==5){                         
                        $data = array(
                        'subject_name' => 'Information Technology-I',
                        'semester_ID' => '1',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==6){                         
                        $data = array(
                        'subject_name' => 'Business Communication-I',
                        'semester_ID' => '1',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==7){                         
                        $data = array(
                        'subject_name' => 'Foundation Course-I',
                        'semester_ID' => '1',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==8){                         
                        $data = array(
                        'subject_name' => 'Financial Accounting-II',
                        'semester_ID' => '2',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==9){                         
                        $data = array(
                        'subject_name' => 'Auditing-I',
                        'semester_ID' => '2',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==10){                         
                        $data = array(
                        'subject_name' => 'Financial Management-I',
                        'semester_ID' => '2',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==11){                         
                        $data = array(
                        'subject_name' => 'Taxation-I',
                        'semester_ID' => '2',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==12){                         
                        $data = array(
                        'subject_name' => 'Business Law-I',
                        'semester_ID' => '2',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==13){                         
                        $data = array(
                        'subject_name' => 'Quantitative Methods for Business-I',
                        'semester_ID' => '2',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==14){                         
                        $data = array(
                        'subject_name' => 'Business Communication-II',
                        'semester_ID' => '2',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==15){                         
                        $data = array(
                        'subject_name' => 'Financial Accounting-III',
                        'semester_ID' => '3',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==16){                         
                        $data = array(
                        'subject_name' => 'Cost Accounting-II',
                        'semester_ID' => '3',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==17){                         
                        $data = array(
                        'subject_name' => 'Auditing-II',
                        'semester_ID' => '3',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==18){                         
                        $data = array(
                        'subject_name' => 'Economics-II',
                        'semester_ID' => '3',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==19){                         
                        $data = array(
                        'subject_name' => 'Management-I',
                        'semester_ID' => '3',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==20){                         
                        $data = array(
                        'subject_name' => 'Business Law-II',
                        'semester_ID' => '3',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==21){                         
                        $data = array(
                        'subject_name' => 'Quantitative Methods for Business-II',
                        'semester_ID' => '3',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==22){                         
                        $data = array(
                        'subject_name' => 'Financial Accounting-IV',
                        'semester_ID' => '4',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==23){                         
                        $data = array(
                        'subject_name' => 'Management Accounting-I',
                        'semester_ID' => '4',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==24){                         
                        $data = array(
                        'subject_name' => 'Taxation-II',
                        'semester_ID' => '4',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==25){                         
                        $data = array(
                        'subject_name' => 'Commerce-II',
                        'semester_ID' => '4',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==26){                         
                        $data = array(
                        'subject_name' => 'Business Law-III',
                        'semester_ID' => '4',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==27){                         
                        $data = array(
                        'subject_name' => 'Information Technology-II',
                        'semester_ID' => '4',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==28){                         
                        $data = array(
                        'subject_name' => 'Foundation Course-II',
                        'semester_ID' => '4',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==29){                         
                        $data = array(
                        'subject_name' => 'Financial Accounting- V',
                        'semester_ID' => '5',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==30){                         
                        $data = array(
                        'subject_name' => 'Cost Accounting- III',
                        'semester_ID' => '5',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==31){                         
                        $data = array(
                        'subject_name' => 'Financial Accounting-VI',
                        'semester_ID' => '5',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==32){                         
                        $data = array(
                        'subject_name' => 'Management Accounting- II',
                        'semester_ID' => '5',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==33){                         
                        $data = array(
                        'subject_name' => 'Taxation- III',
                        'semester_ID' => '5',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==34){                         
                        $data = array(
                        'subject_name' => 'Economics-III',
                        'semester_ID' => '5',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==35){                         
                        $data = array(
                        'subject_name' => 'Financial Accounting- VII',
                        'semester_ID' => '6',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==36){                         
                        $data = array(
                        'subject_name' => 'Cost Accounting –IV',
                        'semester_ID' => '6',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==37){                         
                        $data = array(
                        'subject_name' => 'Auditing- III',
                        'semester_ID' => '6',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==38){                         
                        $data = array(
                        'subject_name' => 'Financial Accounting- VIII',
                        'semester_ID' => '6',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==39){                         
                        $data = array(
                        'subject_name' => 'Taxation-IV',
                        'semester_ID' => '6',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==40){                         
                        $data = array(
                        'subject_name' => 'Management-II',
                        'semester_ID' => '6',
                        'branch_ID' => 'Bachelor of Accounting and Finance'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }                                       /*BAF Ends*/

                    else if($i==41){                        /*Bcom starts*/                    
                        $data = array(
                        'subject_name' => 'Foundation Course – Paper I',
                        'semester_ID' => '1',
                        'branch_ID' => 'Bachelor of Commerce'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==42){                                      
                        $data = array(
                        'subject_name' => 'Environmental Studies',
                        'semester_ID' => '1',
                        'branch_ID' => 'Bachelor of Commerce'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==43){                                      
                        $data = array(
                        'subject_name' => 'Accounting and Financial Management – Paper I',
                        'semester_ID' => '1',
                        'branch_ID' => 'Bachelor of Commerce'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==44){                                      
                        $data = array(
                        'subject_name' => 'Mathematical and Statistical Techniques',
                        'semester_ID' => '1',
                        'branch_ID' => 'Bachelor of Commerce'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==45){                                      
                        $data = array(
                        'subject_name' => 'Commerce – Paper I',
                        'semester_ID' => '1',
                        'branch_ID' => 'Bachelor of Commerce'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==46){                                      
                        $data = array(
                        'subject_name' => 'Business Economics – Paper I',
                        'semester_ID' => '1',
                        'branch_ID' => 'Bachelor of Commerce'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==47){                                      
                        $data = array(
                        'subject_name' => 'Business Communication',
                        'semester_ID' => '1',
                        'branch_ID' => 'Bachelor of Commerce'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==48){                                      
                        $data = array(
                        'subject_name' => 'Foundation Course – Paper II',
                        'semester_ID' => '3',
                        'branch_ID' => 'Bachelor of Commerce'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==49){                                      
                        $data = array(
                        'subject_name' => 'Business Law',
                        'semester_ID' => '3',
                        'branch_ID' => 'Bachelor of Commerce'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==50){                                      
                        $data = array(
                        'subject_name' => 'Accounting and Financial Management – Paper II',
                        'semester_ID' => '3',
                        'branch_ID' => 'Bachelor of Commerce'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==51){                                      
                        $data = array(
                        'subject_name' => 'Applied Component (Advertising / Economic System / Computer Programming)',
                        'semester_ID' => '3',
                        'branch_ID' => 'Bachelor of Commerce'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==52){                                      
                        $data = array(
                        'subject_name' => 'Commerce – Paper II',
                        'semester_ID' => '3',
                        'branch_ID' => 'Bachelor of Commerce'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==53){                                      
                        $data = array(
                        'subject_name' => 'Business Economics – Paper II',
                        'semester_ID' => '3',
                        'branch_ID' => 'Bachelor of Commerce'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==54){                                      
                        $data = array(
                        'subject_name' => 'Financial Accounting and Auditing – Paper I',
                        'semester_ID' => '5',
                        'branch_ID' => 'Bachelor of Commerce'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==55){                                      
                        $data = array(
                        'subject_name' => 'Financial Accounting and Auditing – Paper II',
                        'semester_ID' => '5',
                        'branch_ID' => 'Bachelor of Commerce'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==56){                                      
                        $data = array(
                        'subject_name' => 'Business Economics – Paper III',
                        'semester_ID' => '5',
                        'branch_ID' => 'Bachelor of Commerce'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==57){                                      
                        $data = array(
                        'subject_name' => 'Commerce – Paper III',
                        'semester_ID' => '5',
                        'branch_ID' => 'Bachelor of Commerce'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==58){                                      
                        $data = array(
                        'subject_name' => 'Related Applied Component',
                        'semester_ID' => '5',
                        'branch_ID' => 'Bachelor of Commerce'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==59){                                      
                        $data = array(
                        'subject_name' => 'Applied Component – Paper I ',
                        'semester_ID' => '5',
                        'branch_ID' => 'Bachelor of Commerce'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==60){                                      
                        $data = array(
                        'subject_name' => 'Applied Component – Paper II',
                        'semester_ID' => '5',
                        'branch_ID' => 'Bachelor of Commerce'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }                                       /*bcom ends*/
                    else if($i==61){                        /*BMS starts*/                                    
                        $data = array(
                        'subject_name' => 'Foundation of Human Skill-l',
                        'semester_ID' => '1',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==62){                                                          
                        $data = array(
                        'subject_name' => 'Finance and Cost Accounting',
                        'semester_ID' => '1',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==63){                                                          
                        $data = array(
                        'subject_name' => 'Business Law',
                        'semester_ID' => '1',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==64){                                                          
                        $data = array(
                        'subject_name' => 'Quantitative Methods for Business-1',
                        'semester_ID' => '1',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==65){                                                          
                        $data = array(
                        'subject_name' => 'Effective Communication-l',
                        'semester_ID' => '1',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==66){                                                          
                        $data = array(
                        'subject_name' => 'Principles of Management-l',
                        'semester_ID' => '1',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==67){                                                          
                        $data = array(
                        'subject_name' => 'Introduction to Computers',
                        'semester_ID' => '1',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==68){                                                          
                        $data = array(
                        'subject_name' => 'Foundation of Human Skill-ll',
                        'semester_ID' => '2',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==69){                                                          
                        $data = array(
                        'subject_name' => 'Industrial Law',
                        'semester_ID' => '2',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==70){                                                          
                        $data = array(
                        'subject_name' => 'Computer Application in Business',
                        'semester_ID' => '2',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==71){                                                          
                        $data = array(
                        'subject_name' => 'Business Environment',
                        'semester_ID' => '2',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==72){                                                          
                        $data = array(
                        'subject_name' => 'Managerial Economics-l',
                        'semester_ID' => '2',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==73){                                                          
                        $data = array(
                        'subject_name' => 'Production Management',
                        'semester_ID' => '2',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==74){                                                          
                        $data = array(
                        'subject_name' => 'Environmental Management',
                        'semester_ID' => '2',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==75){                                                          
                        $data = array(
                        'subject_name' => 'Management Accounting',
                        'semester_ID' => '3',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==76){                                                          
                        $data = array(
                        'subject_name' => 'Managerial Economics-ll',
                        'semester_ID' => '3',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==77){                                                          
                        $data = array(
                        'subject_name' => 'Marketing Management',
                        'semester_ID' => '3',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==78){                                                          
                        $data = array(
                        'subject_name' => 'Materials Management',
                        'semester_ID' => '3',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==79){                                                          
                        $data = array(
                        'subject_name' => 'Effective Communication-ll',
                        'semester_ID' => '3',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==80){                                                          
                        $data = array(
                        'subject_name' => 'Principles of Management-ll',
                        'semester_ID' => '3',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==81){                                                          
                        $data = array(
                        'subject_name' => 'International Marketing',
                        'semester_ID' => '4',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==82){                                                          
                        $data = array(
                        'subject_name' => 'Elements of Direct and Indirect Taxes',
                        'semester_ID' => '4',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==83){                                                          
                        $data = array(
                        'subject_name' => 'Export-Import Procedures and Documentation',
                        'semester_ID' => '4',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==84){                                                          
                        $data = array(
                        'subject_name' => 'Management of Small Scale Industries',
                        'semester_ID' => '4',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==85){                                                          
                        $data = array(
                        'subject_name' => 'Productivity and Quality Management',
                        'semester_ID' => '4',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==86){                                                          
                        $data = array(
                        'subject_name' => 'Public Relations Management',
                        'semester_ID' => '4',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==87){                                                          
                        $data = array(
                        'subject_name' => 'Human Resource Management',
                        'semester_ID' => '5',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==88){                                                          
                        $data = array(
                        'subject_name' => 'Service Sector Management',
                        'semester_ID' => '5',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==89){                                                          
                        $data = array(
                        'subject_name' => 'Financial Management',
                        'semester_ID' => '5',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==90){                                                          
                        $data = array(
                        'subject_name' => 'Elements of Logistics Management',
                        'semester_ID' => '5',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==91){                                                          
                        $data = array(
                        'subject_name' => 'Management of Co-operatives',
                        'semester_ID' => '5',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==92){                                                          
                        $data = array(
                        'subject_name' => 'Rural Marketing',
                        'semester_ID' => '5',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==93){                                                          
                        $data = array(
                        'subject_name' => 'Entrepreneurship',
                        'semester_ID' => '6',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==94){                                                          
                        $data = array(
                        'subject_name' => 'Quantitative Method of Business-ll',
                        'semester_ID' => '6',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==95){                                                          
                        $data = array(
                        'subject_name' => 'Marketing Research',
                        'semester_ID' => '6',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==96){                                                          
                        $data = array(
                        'subject_name' => 'Indian Management Thought and Practices',
                        'semester_ID' => '6',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else if($i==97){                                                          
                        $data = array(
                        'subject_name' => 'Econometrics or International Finance',
                        'semester_ID' => '6',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }
                    else{                                                          
                        $data = array(
                        'subject_name' => 'Special Study in Finance or Special Study in Marketing',
                        'semester_ID' => '6',
                        'branch_ID' => 'Bachelor of Management Studies'
                    );
                        $this->InsertTable->addCommerceSubj($data);
                    }                                            //BMS Ends
                }
            }
        }
         $this->load->view('createInitTable');
    }
}
        

    
