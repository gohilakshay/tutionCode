<?php
/* select or view multiple database 
enter only if user == superadmin
*/
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
        /*localHost*/
        if($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == "[::1]"){
                    $configdbfly['username'] = 'root'; /* Default db */
                    $configdbfly['password'] = ''; /* Default db */
        }
        /*server*/
        else{
            $configdbfly['username'] = 'root'; /* Default db */
            $configdbfly['password'] = 'N5sZmB2KTdI1'; /* Default db */
        }
        $configdbfly['database'] = 'admin_db'; /* Default db */
        $this->load->database($configdbfly);
        $db = $this->SelectDb->select($new); //default db name
        $this->db->close(); //close previous connection
        $configdbfly['database'] = $db->dbName; //new db name
        $this->load->database($configdbfly);
            /* multi dp end; db selected*/
        $this->session->set_userdata('db',$configdbfly); //session for db
        $this->load->model('SelectData');
        $limitDetails = $this->SelectData->smsLimit();
        $this->load->view('createInitTable',array('limitDetails'=>$limitDetails));   // html file
    }
}

?>