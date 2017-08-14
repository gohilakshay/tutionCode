<?php defined('BASEPATH') OR exit('No direct script access allowed');
class InsertTable extends CI_Model {
    function addStd($data){
        $this->db->insert('standard', $data);
        return;
    }
    function addBranch($data){
        $this->db->insert('branch', $data);
        return;
    }
    function addSem($data){
        $this->db->insert('semester', $data);
        return;
    }
    function addEngiSubj($data){
        $this->db->insert('engisubject', $data);
        return;
    }
    /*function addCollegeSubj($data){
        $this->db->insert('collegesubject', $data);
        return;
    }*/
    function addComSubj($data){
        $this->db->insert('jrColgCom', $data);
        return;
    }
    function addSciSubj($data){
        $this->db->insert('jrColgSci', $data);
        return;
    }
    function addCommerceSubj($data){
        $this->db->insert('Commercesubject', $data);
        return;
    }
    function addSchoolSubj($data){
        $this->db->insert('subject', $data);
        return;
    }
    
}
?>