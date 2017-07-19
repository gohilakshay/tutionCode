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
        $this->db->insert('engisubj', $data);
        return;
    }
}
?>