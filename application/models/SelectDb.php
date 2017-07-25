<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SelectDb extends CI_Model {
    function select($data){
        $q = $this->db->query("SELECT * FROM `admin` where dbName = '$data' ");
        if($q->num_rows() >0){
            foreach($q->result() as $row){
                $data = $row;
            }
        }
        $configdbfly=$this->config->config['sysdb'];
        $db = $data->dbName; /* Change db */
        
        return ($db);
    }
}