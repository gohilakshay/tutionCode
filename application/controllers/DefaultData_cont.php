<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
class DefaultData_cont extends CI_Controller
{
    /*For Adding Standard*/
    public function defaultData()
    {
        $this->load->database();
        $this->load->model('InsertTable');
        for($i=1;$i<13;$i++)
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
        for($j=1;$j<3;$j++)
        {
            if($j==1){
                $data = array(
                'standard_name' => 'Engineering'
            );
             $this->InsertTable->addStd($data);
            }
            else {
                $data = array(
                'standard_name' => 'Commerce'
            );
             $this->InsertTable->addStd($data);
            }
            
        }
    }
    /*End*/
    
    /*For Branch*/
    public function defaultBranchData()
    {
        $this->load->database();
        $this->load->model('InsertTable');
        for($i=1;$i<22;$i++)
        {
            if($i==1){
                $data = array(
                'branch_name' => 'Science',
                'standard_ID' => '11'
            );
                $this->InsertTable->addBranch($data);
            }
            else if($i==2){
                $data = array(
                'branch_name' => 'Commerce',
                'standard_ID' => '11'
            );
                $this->InsertTable->addBranch($data);
            }
            else if($i==3){
                $data = array(
                'branch_name' => 'Science',
                'standard_ID' => '12'
            );
                $this->InsertTable->addBranch($data);
            }
            else if($i==4){
                $data = array(
                'branch_name' => 'Commerce',
                'standard_ID' => '12'
            );
                $this->InsertTable->addBranch($data);
            }
            else if($i==5){
                $data = array(
                'branch_name' => 'Computer Engineering',
                'standard_ID' => '13'
            );
                $this->InsertTable->addBranch($data);
            }
            else if($i==6){
                $data = array(
                'branch_name' => 'Information Technology Engineering',
                'standard_ID' => '13'
            );
                $this->InsertTable->addBranch($data);
            }
            else if($i==7){
                $data = array(
                'branch_name' => 'Electronics Engineering',
                'standard_ID' => '13'
            );
                $this->InsertTable->addBranch($data);
            }
            else if($i==8){
                $data = array(
                'branch_name' => 'Electronics and Telecommunication',
                'standard_ID' => '13'
            );
                $this->InsertTable->addBranch($data);
            }
            else if($i==9){
                $data = array(
                'branch_name' => 'Mechanical Engineering',
                'standard_ID' => '13'
            );
                $this->InsertTable->addBranch($data);
            }
            else if($i==10){
                $data = array(
                'branch_name' => 'Civil Engineering',
                'standard_ID' => '13'
            );
                $this->InsertTable->addBranch($data);
            }
            else if($i==11){
                $data = array(
                'branch_name' => 'Chemical Engineering',
                'standard_ID' => '13'
            );
                $this->InsertTable->addBranch($data);
            }
            else if($i==12){
                $data = array(
                'branch_name' => 'Information Technology Engineering',
                'standard_ID' => '13'
            );
                $this->InsertTable->addBranch($data);
            }
            else if($i==13){
                $data = array(
                'branch_name' => 'Automobile Engineering',
                'standard_ID' => '13'
            );
                $this->InsertTable->addBranch($data);
            }
            else if($i==14){
                $data = array(
                'branch_name' => 'Printing and Packaging Engineering',
                'standard_ID' => '13'
            );
                $this->InsertTable->addBranch($data);
            }
            else if($i==15){
                $data = array(
                'branch_name' => 'Bachelor of Accounting and Finance',
                'standard_ID' => '14'
            );
                $this->InsertTable->addBranch($data);
            }
            else if($i==16){
                $data = array(
                'branch_name' => 'Bachelor of Commerce',
                'standard_ID' => '14'
            );
                $this->InsertTable->addBranch($data);
            }
            else if($i==17){
                $data = array(
                'branch_name' => 'Bachelor of Mass Media',
                'standard_ID' => '14'
            );
                $this->InsertTable->addBranch($data);
            }
            else if($i==18){
                $data = array(
                'branch_name' => 'Bachelor of Finance and Marketing',
                'standard_ID' => '14'
            );
                $this->InsertTable->addBranch($data);
            }
            else if($i==19){
                $data = array(
                'branch_name' => 'Bachelor Business Administration',
                'standard_ID' => '14'
            );
                $this->InsertTable->addBranch($data);
            }
            else if($i==20){
                $data = array(
                'branch_name' => 'Chattered Accountant',
                'standard_ID' => '14'
            );
                $this->InsertTable->addBranch($data);
            }
            else {
                $data = array(
                'branch_name' => 'Company Secretary',
                'standard_ID' => '14'
            );
                $this->InsertTable->addBranch($data);
            }
        }
    }
    /*End*/
    
    /*For Semester*/
    public function defaultSemesterData()
    {
        $this->load->database();
        $this->load->model('InsertTable');
        for($i=1;$i<9;$i++)
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
    }
    /*End*/
    
    /*For computer Subject*/
    public function defaultSubjectData()
    {
        $this->load->database();
        $this->load->model('InsertTable');
        for($i=1;$i<60;$i++)
        {
            if($i==1){
                $data = array(
                'subject_name' => 'Applied Mathematics I',
                'semester_ID' => '1',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==2){
                $data = array(
                'subject_name' => 'Applied Physics I',
                'semester_ID' => '1',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==3){
                $data = array(
                'subject_name' => 'Applied Chemistry I',
                'semester_ID' => '1',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==4){
                $data = array(
                'subject_name' => 'Engineering Mechanics',
                'semester_ID' => '1',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==5){
                $data = array(
                'subject_name' => 'Basic Electrical & Electronics Engineering',
                'semester_ID' => '1',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==6){
                $data = array(
                'subject_name' => 'Enviornmental Studies',
                'semester_ID' => '1',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==7){
                $data = array(
                'subject_name' => 'Applied Mathematics II',
                'semester_ID' => '2',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==8){
                $data = array(
                'subject_name' => 'Applied Physics II',
                'semester_ID' => '2',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==9){
                $data = array(
                'subject_name' => 'Applied Chemistry II',
                'semester_ID' => '2',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==10){
                $data = array(
                'subject_name' => 'Engineering Drawing',
                'semester_ID' => '2',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==11){
                $data = array(
                'subject_name' => 'Structured Programming Approach',
                'semester_ID' => '2',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==12){
                $data = array(
                'subject_name' => 'Communication Skills',
                'semester_ID' => '2',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==13){
                $data = array(
                'subject_name' => 'Applied Mathematics III',
                'semester_ID' => '3',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==14){
                $data = array(
                'subject_name' => 'Object Oriented Programming Methodology',
                'semester_ID' => '3',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==15){
                $data = array(
                'subject_name' => 'Data Structures',
                'semester_ID' => '3',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==16){
                $data = array(
                'subject_name' => 'Digital Logic Design & Analysis',
                'semester_ID' => '3',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==17){
                $data = array(
                'subject_name' => 'Discrete Structures',
                'semester_ID' => '3',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==18){
                $data = array(
                'subject_name' => 'Electronic Circuits & Communication Fundamentals',
                'semester_ID' => '3',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==19){
                $data = array(
                'subject_name' => 'Applied Mathematics IV',
                'semester_ID' => '4',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==20){
                $data = array(
                'subject_name' => 'Analysis Of Algorithm',
                'semester_ID' => '4',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==21){
                $data = array(
                'subject_name' => 'Computer Organization & Architecture',
                'semester_ID' => '4',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==22){
                $data = array(
                'subject_name' => 'Database Management System',
                'semester_ID' => '4',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==23){
                $data = array(
                'subject_name' => 'Theoretical Computer Science',
                'semester_ID' => '4',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==24){
                $data = array(
                'subject_name' => 'Computer Graphics',
                'semester_ID' => '4',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==25){
                $data = array(
                'subject_name' => 'Microprocessor',
                'semester_ID' => '5',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==26){
                $data = array(
                'subject_name' => 'Operating Systems',
                'semester_ID' => '5',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==27){
                $data = array(
                'subject_name' => 'Structured and Object Oriented  Analysis and
Design',
                'semester_ID' => '5',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==28){
                $data = array(
                'subject_name' => 'Computer Networks',
                'semester_ID' => '5',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==29){
                $data = array(
                'subject_name' => 'Web Technologies Laboratory',
                'semester_ID' => '5',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==30){
                $data = array(
                'subject_name' => 'Business Communication and Ethics',
                'semester_ID' => '5',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==31){
                $data = array(
                'subject_name' => 'System Programming and Compiler
Construction',
                'semester_ID' => '6',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==32){
                $data = array(
                'subject_name' => 'Software Engineering',
                'semester_ID' => '6',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==33){
                $data = array(
                'subject_name' => 'Distributed Databases',
                'semester_ID' => '6',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==34){
                $data = array(
                'subject_name' => 'Mobile Communication and Computing',
                'semester_ID' => '6',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==35){
                $data = array(
                'subject_name' => 'Network Programming Laboratory',
                'semester_ID' => '6',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==36){
                $data = array(
                'subject_name' => 'Project Management',
                'semester_ID' => '6',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==37){
                $data = array(
                'subject_name' => 'Operation Research',
                'semester_ID' => '6',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==38){
                $data = array(
                'subject_name' => 'Foreigh Language – German',
                'semester_ID' => '6',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==39){
                $data = array(
                'subject_name' => 'Foreigh Language – French',
                'semester_ID' => '6',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==40){
                $data = array(
                'subject_name' => 'Digital Signal Processing',
                'semester_ID' => '7',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==41){
                $data = array(
                'subject_name' => 'Cryptography and System Security',
                'semester_ID' => '7',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==42){
                $data = array(
                'subject_name' => 'Artificial Intelligence',
                'semester_ID' => '7',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==43){
                $data = array(
                'subject_name' => 'Network Threats and Attacks Laboratory',
                'semester_ID' => '7',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==44){
                $data = array(
                'subject_name' => 'Artificial Intelligence',
                'semester_ID' => '7',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==45){
                $data = array(
                'subject_name' => 'Advance Algorithms',
                'semester_ID' => '7',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==46){
                $data = array(
                'subject_name' => 'Computer  Simulation and Modeling',
                'semester_ID' => '7',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==47){
                $data = array(
                'subject_name' => 'Image Processing',
                'semester_ID' => '7',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==48){
                $data = array(
                'subject_name' => 'Software Architecture',
                'semester_ID' => '7',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==49){
                $data = array(
                'subject_name' => 'Soft Computing',
                'semester_ID' => '7',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==50){
                $data = array(
                'subject_name' => 'ERP  and Supply Chain Management',
                'semester_ID' => '7',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==51){
                $data = array(
                'subject_name' => 'Data Warehouse and Mining',
                'semester_ID' => '8',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==52){
                $data = array(
                'subject_name' => 'Human Machine Interaction',
                'semester_ID' => '8',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==53){
                $data = array(
                'subject_name' => 'Parallel and distributed Systems',
                'semester_ID' => '8',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==54){
                $data = array(
                'subject_name' => 'Cloud Computing Laboratory',
                'semester_ID' => '8',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==55){
                $data = array(
                'subject_name' => 'Machine Learning',
                'semester_ID' => '8',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==56){
                $data = array(
                'subject_name' => 'Embedded Systems
',
                'semester_ID' => '8',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==57){
                $data = array(
                'subject_name' => 'Adhoc wireless networks',
                'semester_ID' => '8',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==58){
                $data = array(
                'subject_name' => 'Digital Forensic',
                'semester_ID' => '8',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else{
                $data = array(
                'subject_name' => 'Big data Analytics',
                'semester_ID' => '8',
                'branch_ID' => '5'
            );
                $this->InsertTable->addEngiSubj($data);
            }
        }
    }
    /*End*/
}
?>