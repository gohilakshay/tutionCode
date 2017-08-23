<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
class DefaultData_cont extends CI_Controller
{
    /*For Adding Standard*/
    public function defaultData()
    {
         $this->load->library('session');
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
       
        
    }
    /*End*/
    
    /*For Branch*/
    public function defaultBranchData()
    {
         $this->load->library('session');
       $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $this->load->model('InsertTable');
        
    }
    /*End*/
    
    /*For Semester*/
    public function defaultSemesterData()
    {
         $this->load->library('session');
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $this->load->model('InsertTable');
        
    }
    /*End*/
    
    /*For computer Subject*/
    public function defaultSubjectData()
    {
         $this->load->library('session');
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $this->load->model('InsertTable');
        
    }
    /*End*/
    
    /*For College Subjects*/
    public function defaultColgSubjData()
    {
         $this->load->library('session');
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $this->load->model('InsertTable');
        
    }
    /*End*/
    
    /*For Commerce Subjects*/
    public function defaultCommerceSubjData()
    {
         $this->load->library('session');
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $this->load->model('InsertTable');
        
    /*End*/
    }
    
    /*For school Subjects*/
    public function defaultSchoolSubjData()
    {
        $this->load->library('session');
        $db = $this->session->userdata('db');//load db      
        $this->load->database($db);//call db
        $this->load->model('InsertTable');
        
    }
    /*END*/
}
?>