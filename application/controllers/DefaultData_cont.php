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
    
    /*For Subject*/
    public function defaultSubjectData()
    {
        $this->load->database();
        $this->load->model('InsertTable');
        for($i=1;$i<9;$i++)
        {
            if($i==1){
                $data = array(
                'subject_name' => 'Chemistry',
                'semester_ID' => '1',
                'branch_ID' => '1'
            );
                $this->InsertTable->addEngiSubj($data);
            }
            else if($i==2){
                $data = array(
                'semester' => '2'
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
}
?>