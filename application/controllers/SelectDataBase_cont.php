<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SelectDataBase_cont extends CI_Controller
{
    public function select(){
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $new = $this->input->post('db'); //get db name
        $this->load->model('SelectDb');
        $configdbfly=$this->config->config['sysdb'];
        $configdbfly['username'] = 'root'; /* Default db */
        $configdbfly['password'] = ''; /* Default db */
        $configdbfly['database'] = 'admin_db'; /* Default db */
        $this->load->database($configdbfly);
        $db = $this->SelectDb->select($new); //tutionCode db name
        $this->db->close(); //close previous connection
        $configdbfly['username'] = $db->username; /* change db */
        $configdbfly['password'] = $db->password; /* change db */
        $configdbfly['database'] = $db->dbName;
        $this->load->database($configdbfly);
            /* multi dp end; db selected*/
         $this->session->set_userdata('db',$configdbfly); //session for db
        redirect('Home/mainP');
    }
}

?>