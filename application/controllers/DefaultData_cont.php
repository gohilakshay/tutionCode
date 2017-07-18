<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
class DefaultData_cont extends CI_Controller
{
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
}
?>