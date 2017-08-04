<?php defined('BASEPATH') OR exit('No direct script access allowed');
class deleteData extends CI_Model {
    function deleteCourse($course_id){
        $this->db->where('course_ID', $course_id);
        $this->db->delete('course');
        return;
    }
}
?>