
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CreateNewDb extends CI_Controller
{
	public function createDb()
	{
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        
        /* select multiple db start */
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
        $this->load->database($configdbfly); // load selected database
        /* session login*/
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        /*Encryption starts*/
        /*$str = $this->input->post('password'); 
        $salt = "JafeelAhmed";
        $enc = sha1($salt);
        $s = $str.$enc;
        $password = md5($s);*/
        /*Encryption Ends*/
        $this->load->model('SelectData');
        $query = $this->SelectData->SuperadminSelect($username,$password);
        $query1['result'] = $this->SelectData->dbSelect();
        foreach($query1 as $value){
            foreach($value as $var){
                 if ($var->username == $username){
                     $dbname = $var->dbName;
                 }
            }
        }
       if($query == 1){
                   /* enter only if user == superadmin*/
           $session = $this->session->set_userdata('username',$username);
           $this->load->view('createDatabse',$query1);
       }
        else if(isset($session)){
                    /* checking for sessions*/
            $this->load->view('createDatabse',$query1);
        }
        else {          
            /* enter only if user == admin*/
            $query = $this->SelectData->adminSelect($username,$password);
            if($query == 1){
                $this->db->close();
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
                $configdbfly['database'] = $dbname; /* Default db */
                $this->load->database($configdbfly);
                $session = $this->session->set_userdata('username',$username);
                $this->session->set_userdata('db',$configdbfly);
                redirect('Home/mainP'); // redirect to home page
            } // if session fails
            else {
                $name=site_url().'/Home';
              echo "<script>
                    alert('Invalid Usrname or Password');
                    window.location.href='$name';
                    </script>";
            }
        }
        /* session checked*/       
    }
    public function deleteDb()
	{
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $username = $this->session->userdata('username');
        /*checkng for session */
        if(isset($username)){
            if(isset($_POST['delete'])){
                $db_data =array(
                'dbName' => $this->input->post('databasename'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );  // delete selected database
            $this->load->model('CreateTable');
            $this->CreateTable->delete_db($db_data);
            }
		$this->load->view('deleteDatabase');        //html filename
         }else echo "Error 404 : Access Denied";  // if session fails    
    } 
}