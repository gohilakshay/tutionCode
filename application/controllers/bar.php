<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  

class bar extends CI_Controller
{
  
  public function __construct()
  {
  
  parent::__construct();
  
   $this->load->model('Selectdata');
   $this->load->helper('url');
  }
  

  public function bar()
  {
    $this->load->library('session');
$db = $this->session->userdata('db');//load db   
        $this->load->database($db);//call db
    $this->load->model('SelectData');
    $query['result1'] = $this->SelectData->student();  
    //print_r($query);
    $query['result2'] = $this->SelectData->bar();
    //print_r($query);
    $this->load->view('chart',$query);    
  }
  
   

   }



  
?>

            