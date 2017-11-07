<?php defined('BASEPATH') OR exit('No direct script access allowed');
class deleteData extends CI_Model {
    function deleteCourse($course_id){
        $this->db->where('course_ID', $course_id);
        $this->db->delete('course');
        return;
    }
    function deleteBatch($batch_id){
        $this->db->db_debug = FALSE; //disable debugging for queries
        $this->db->where('batch_id', $batch_id);
        if(! $this->db->delete('batch')){
            $this->db->db_debug = $db_debug; //restore setting
            return 0;
        }
        else {
            $this->db->db_debug = $db_debug; //restore setting
            return 1;
        }
        
    }
    function DeleteList($list_name){
        $this->db->where('list_name', $list_name);
        $this->db->delete('import');
        return;
    }
    function deleteTest($test_id){
        $this->db->where('test_ID', $test_id);
        $this->db->delete('test');
        return;
    }
    function DeleteEnqy($e_id){
        $this->db->where('enquiry_ID', $e_id);
        $this->db->delete('enquiry');
        return;
    }
}

?>