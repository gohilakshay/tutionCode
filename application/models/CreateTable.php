<?php

class CreateTable extends CI_Model {

    function addDb($data){
        /*for insert db values in admin_db table*/
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
        
        $this->load->dbforge();
        $db_name = $data['dbName'];
        if ($this->dbforge->create_database($db_name))
        {
            $this->db->insert('admin', $data);
        }  
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
        $configdbfly['database'] = $db_name; /* Default db */
        $this->load->database($configdbfly);
        $this->session->set_userdata('db',$configdbfly); 
    }
    /*function create_db()
    {
        $this->load->dbforge();
        if ($this->dbforge->create_database('tutionCode'))
        {
                echo 'Database created!';
        } 
    }*/
    function delete_db($data)
    {
        /*for insert db values in admin_db table*/
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
        $this->load->dbforge();
        if ($this->dbforge->drop_database($data['dbName']))
        {
            $this -> db -> where('dbName', $data['dbName']);
            $this -> db -> delete('admin');
                echo 'Database deleted!';
        }
        
    }
    function create_admin()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'admin_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'admin_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'admin_password' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '11',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('admin_ID', TRUE);
        // gives PRIMARY KEY (branch_ID)
        $this->dbforge->create_table('admin', TRUE); 
    }
    function create_branch()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'branch_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'branch_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'standard_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '500',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('branch_ID', TRUE);
        // gives PRIMARY KEY (branch_ID)
        $this->dbforge->create_table('branch', TRUE); 
    }
    function create_semester()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'semester_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'semester' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('semester_ID', TRUE);
        // gives PRIMARY KEY (semester_ID)
        $this->dbforge->create_table('semester', TRUE); 
    }
    function create_engisubject()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'engisubj_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'subject_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'semester_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '10',
                                          ),
                        'branch_ID' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '500',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('engisubj_ID', TRUE);
        // gives PRIMARY KEY (engisubj_ID)
        $this->dbforge->create_table('engisubject', TRUE); 
    }
    /*function create_collegesubject()
    { 
     Load db_forge - used to create databases and tables 
    $this->load->dbforge();
      $fields = array(
                        'colgsubj_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'subject_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '500',
                                          ),
                        'semester_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '10',
                                          ),
                        'branch_ID' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '500',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('colgsubj_ID', TRUE);
        // gives PRIMARY KEY (colgsubj_ID)
        $this->dbforge->create_table('collegesubject'); 
    }*/
    
    
    /*for jr colg commerce*/
    function create_jrColgCom()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'colgsubj_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'subject_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '500',
                                          ),
                        'semester_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '10',
                                          ),
                        'branch_ID' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '500',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('colgsubj_ID', TRUE);
        // gives PRIMARY KEY (colgsubj_ID)
        $this->dbforge->create_table('jrColgCom', TRUE); 
    }
    
    /*for jr colg science*/
    function create_jrColgSci()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'colgsubj_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'subject_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '500',
                                          ),
                        'semester_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '10',
                                          ),
                        'branch_ID' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '500',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('colgsubj_ID', TRUE);
        // gives PRIMARY KEY (colgsubj_ID)
        $this->dbforge->create_table('jrColgSci', TRUE); 
    }
    
    function create_Commercesubject()
    { 
    /* Load db_forge - used to create degree commerce databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'Commercesubj_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'subject_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'semester_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '10',
                                          ),
                        'branch_ID' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '500',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('Commercesubj_ID', TRUE);
        // gives PRIMARY KEY (Commercesubj_ID)
        $this->dbforge->create_table('commercesubject', TRUE); 
    }
    function create_batch()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'batch_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'batch_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'batch_timing' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'course_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('batch_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('batch', TRUE); 
    }
    function create_batch_student_mapping()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'bsm_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'stud_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'batch_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('bsm_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('batch_student_mapping', TRUE); 
        $this->db->query("ALTER TABLE `batch_student_mapping` ADD CONSTRAINT `FOREIGN KEY` FOREIGN KEY (`batch_id`) REFERENCES `batch`(`batch_ID`);");
    }  
    function create_batch_course_mapping()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'bcm_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'course_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'batch_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('bcm_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('batch_course_mapping', TRUE); 
    } 
    function create_student_attend()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'attend_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'batch_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'faculty_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'attend_date' => array(
                                                 'type' => 'DATE',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('attend_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('student_attend', TRUE); 
    }
    function create_stud_attend_mapping()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'stud_attend_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'stud_id' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'attend_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'absent_stud_id' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE,
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('stud_attend_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('stud_attend_mapping', TRUE); 
    } 
    function create_stud_fee()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'fee_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'stud_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'installment_option' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'payment_mode' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'total_fee' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'discount' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'final_fee' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'installment_type' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'recieved_fee' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'balance_fee' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'amountper_installment' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('fee_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('stud_fee', TRUE); 
    }   
    function create_fee_stud_mapping()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'fsm_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'fee_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'fee_cal_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('fsm_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('fee_stud_mapping', TRUE); 
    } 
    function create_fee_cal()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'fee_cal_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'outstanding_fee' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'overdue_fee' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'overall_fee' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'recieved_fee' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'uncleared' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('fee_cal_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('fee_cal', TRUE); 
    } 
    function create_student_details()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'stud_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'stud_surname' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE,  
                                          ),
                        'stud_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'father_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'mother_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, 
                                          ),
                        'stud_gender' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'stud_dob' => array(
                                                 'type' => 'DATE',
                                          ),
                        'stud_email' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE,     
                                          ),
                        'stud_contact' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '10',
                                          ),
                        'stud_address' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'stud_profile' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'admission_year' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'admission_date' => array(
                                                 'type' => 'DATE',
                                          ),
                        'course_type' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'sch_coll_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'board' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'standard_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'form_date' => array(
                                                 'type' => 'DATE',
                                          ), 
                        'place' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('stud_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('student_details', TRUE); 
    }  
    function create_standard()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'standard_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'standard_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('standard_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('standard', TRUE); 
    }
    function create_field_semester()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'field_semester_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'field_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'semester' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('field_semester_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('field_semester', TRUE); 
    }
    function create_field_std_mapping()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'field_std_mapping_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'field_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'std_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('field_std_mapping_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('field_std_mapping', TRUE); 
    }
    function create_course()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'course_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'course_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'course_type' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'standard_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'subject_id' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'branch_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE,
                                          ),
                        'semester' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE,
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('course_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('course', TRUE); 
    }
    function create_schedules()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'schedules_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'schedules_timing' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'teacher_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'batch_course_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('schedules_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('schedules', TRUE); 
    }
    function create_teacher()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        't_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        't_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        't_fathername' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        't_surname' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE,
                                          ),
                        't_gender' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 
                                          ),
                        't_dob' => array(
                                                 'type' => 'DATE',
                                          ),                        
                        't_email' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        't_contact' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '10',
                                          ),
                        't_address' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        't_profile' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'qualification' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'join_date' => array(
                                                 'type' => 'DATE',
                                          ),
                        'salary' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'salary_status' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          )
//                        'course_id' => array(
//                                                 'type' => 'INT',
//                                                 'constraint' => '100',
//                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('t_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('teacher', TRUE); 
    }
    function create_teacher_expense()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        't_exp_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'teacher_id' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'salary' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'payment_mode' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'payment_date' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('t_exp_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('teacher_expense', TRUE); 
    }
    function create_subject()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'subject_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'subject_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('subject_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('subject', TRUE); 
    }
    function create_teacher_stubject_mapping()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'tcm_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'standard_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'teacher_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'subject_id' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'branch_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                    'null' => TRUE,
                                          ),
                        'semester_name' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                                'null' => TRUE,
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('tcm_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('teacher_subject_mapping', TRUE); 
    }
    function create_test()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'test_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'test_date' => array(
                                                 'type' => 'DATE',
                                          ),
                        'test_time' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'batch_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'total_marks' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'passing_marks' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'supervisor_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'subject_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('test_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('test', TRUE); 
    }
    function create_marks()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'marks_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'test_id' => array(
                                                  'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'stud_id' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'marks_obtained' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('marks_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('marks', TRUE); 
    }
    function create_t_attend_mapping()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        't_attend_mapping_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        't_id' => array(
                                                  'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        't_attend_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'absent_teacher_attend_id' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE,
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('t_attend_mapping_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('t_attend_mapping', TRUE); 
    }
    function create_t_attend()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        't_attend_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'date' => array(
                                                  'type' => 'DATE',
                                          ),
                        'tcm_id' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'timing' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('t_attend_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('teacher_attend', TRUE); 
    }
    function create_expense()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'expense_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        't_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'staff_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'utilities_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'rent_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'transport_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'meals_entertainment_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'maintenance_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('expense_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('expense', TRUE); 
    }
    function create_staff()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'staff_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'staff_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'staff_contact' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '10',
                                          ),
                        'staff_address' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'payment_mode' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'payment_date' => array(
                                                 'type' => 'DATE',
                                          ),
                        'salary' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('staff_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('staff', TRUE); 
    }
    function create_staff_details()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'staffDetail_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'staff_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'staff_salary' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'staff_contact' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'staff_address' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'status' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('staffDetail_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('staff_details', TRUE); 
    }
    function create_meals_entertain()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'meals_entertain_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'message' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'amount' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '10',
                                          ),
                        'payment_mode' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'payment_date' => array(
                                                 'type' => 'DATE',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('meals_entertain_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('meals_entertain', TRUE); 
    }
    function create_maintenance()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'maintenance_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'title' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'amount' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '10',
                                          ),
                        'payment_mode' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'payment_date' => array(
                                                 'type' => 'DATE',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('maintenance_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('maintenance', TRUE); 
    }
    function create_transport()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'transport_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'title' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'amount' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '10',
                                          ),
                        'payment_mode' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'payment_date' => array(
                                                 'type' => 'DATE',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('transport_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('transport', TRUE); 
    }
    function create_utilities()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'utilities_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'title' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'amount' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '10',
                                          ),
                        'payment_mode' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'payment_date' => array(
                                                 'type' => 'DATE',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('utilities_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('utilities', TRUE); 
    }
    function create_rent()
    { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'rent_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'title' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'amount' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '10',
                                          ),
                        'payment_mode' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'payment_date' => array(
                                                 'type' => 'DATE',
                                          ),
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('rent_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('rent', TRUE); 
    }
    function createUpload()
    {
        /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'upload_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'filename' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'discription' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'date' => array(
                                                 'type' => 'DATE',
                                          ),
                        'facultyname' => array(
                                                 'type' => 'VARCHAR',
                                                'constraint' => '100',
                                          ),
                        'fileLink' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
          
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('upload_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('upload', TRUE); 
    }
    function createEnquiry()
    {
        /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'enquiry_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'enq_date' => array(
                                                 'type' => 'date'
                                          ),
                        'followup_date' => array(
                                                 'type' => 'date'
                                          ),
                        'reference' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'fees' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'senderEmail' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'mobile' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'subject' => array(
                                                 'type' => 'VARCHAR',
                                                'constraint' => '100',
                                          ),
                        'query' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'repledBy' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'gender' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'reply' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'status' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'college' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'address' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'action' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
          
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('enquiry_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('enquiry', TRUE); 
    }
    function createSms()
    {
        /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'sms_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'bulkID' => array(
                                                'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, 
                                          ),
                        'batch' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE,    
                                          ),
                        'student_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, 
                                          ),
                        'student_cont' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, 
                                          ),
                        'teacher_name' => array(
                                                'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, 
                                          ),
                        'teacher_cont' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, 
                                          ),
                        'sms_sent_to' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, 
                                          ),
                        'message' => array(
                                                'type' => 'VARCHAR',
                                                 'constraint' => '100', 
                                                    'null' => TRUE,
                                          ),
                        'date' => array(
                                                 'type' => 'DATE',
                                                    'null' => TRUE,
                                                 
                                          ),
                        'time' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                    'null' => TRUE,
                                          ),
                        'status' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                    'null' => TRUE,
                                          ),
          
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('sms_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('sms', TRUE); 
    }
    function createSmsBulk()
    {
        /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'sms_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'cont_name' => array(
                                                'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, 
                                          ),
                        'contact' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, 
                                          ),
                        'message' => array(
                                                'type' => 'VARCHAR',
                                                 'constraint' => '100', 
                                          ),
                        'date' => array(
                                                 'type' => 'DATE',
                                                 
                                          ),
                        'time' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'status' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
          
                     );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('sms_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('smsBulk', TRUE); 
    }
    function createImport()
    {
        /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
      $fields = array(
                        'import_ID' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'contact' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'location' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'list_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'created_date' => array(
                                                 'type' => 'DATE',
                                          ),
                    
                );
      
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('import_ID', TRUE);
        // gives PRIMARY KEY (batch_ID)
        $this->dbforge->create_table('import', TRUE); 
    }
}
?>