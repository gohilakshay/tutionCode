<?php
$student_data = $result[0];
$batch_data = $result[1];
$fee_data = end($result);
/*Values for receipt genration*/
$classesName = $this->db->database;
$studentName = $student_data->stud_surname." ".$student_data->stud_name." ".$student_data->father_name." ".$student_data->mother_name;
$admissionDate = $student_data->admission_date;
$year = explode("-",$admissionDate);
$stud_id = $student_data->stud_ID;
$i = 1;
$receipt1 = substr($year[0],2).'CG'.$stud_id.'0'.$i;
$payMode = $fee_data->payment_mode;
$FinalAmt = $fee_data->final_fee;
$RecievedFee = $fee_data->recieved_fee;
$BalanceFee = $fee_data->balance_fee;
$chq_date = $fee_data->chq_date;
$bank_name = $fee_data->bank_name;
$chq_no = $fee_data->chq_no;
$transc_id = $fee_data->transc_id;
?>
<div class="content">
    <div class="container-fluid">
         <div class="row">
            <a href="<?php echo site_url("Student_cont/student") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content" style="box-shadow: 0 2px 2px rgb(128, 191, 209)!important;">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-center">
                                    <img src="<?php echo base_url()?>assets/icon/students.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Student</p>
                                </div>
                            </div>
                        </div>
                        <div class="footer"><hr>
                            <div class="stats">
                                <a href="<?php echo site_url("Student_cont/addStudent") ?>" >
                                    <i class="ti-plus"></i> Add Student
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a href="<?php echo site_url("Bar_cont/bar") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-center">
                                    <img src="<?php echo base_url()?>assets/icon/test.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Test Marks</p>
                                    <!--Marks-->
                                </div>
                            </div>
                        </div>
                        <div class="footer"><hr>
                            <div class="stats">
                                <a href="<?php echo site_url("Marks_cont/addMarks") ?>" >   
                                    <i class="ti-plus"></i> Add Marks
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a href="<?php echo site_url("Attendance_cont/viewStudentAttendance") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-success text-center">
                                    <img src="<?php echo base_url()?>assets/icon/present.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>View Attendance</p>
                                   <!--Present-->
                                </div>
                            </div>
                        </div>
                        <div class="footer"><hr>
                            <div class="stats">
                                <a href="<?php echo site_url("Attendance_cont/markStudentAttendance") ?>">
                                    <i class="ti-plus"></i> Mark Attendance
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
             <a  href="<?php echo site_url()."/Bar_cont/bar" ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-info text-center">
                                    <img src="<?php echo base_url()?>assets/icon/performance.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Performance</p>
                                    <!--Details-->
                                </div>
                            </div>
                        </div>
                        <div class="footer"><hr>
                            <div class="stats">
                                 <a href="<?php echo site_url()."/Bar_cont/bar" ?>">
                                    <i class="ti-plus"></i> view Performance 
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </a>
        </div>
<!--
         <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                    <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;     border-color: #9fcedc;">
                        <h3 class="text-uppercase" style="margin-top: 10px;">Student Profile</h3>
                    </div>
                </div>
            </div>
        </div>
        
-->
        <div class="row">
        <a href="<?php echo site_url("Bar_cont/OneStudentMarks/$student_data->stud_ID") ?>">
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-center">
                                    <img src="<?php echo base_url()?>assets/icon/test.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p style="color:rgb(79, 172, 205);">Test Marks</p>
                                    <!--Marks-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="<?php echo site_url("Attendance_cont/OneStudentAttendance/$student_data->stud_ID") ?>">
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-success text-center">
                                    <img src="<?php echo base_url()?>assets/icon/present.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p style="color:rgb(79, 172, 205);">Attendance</p>
                                   <!--Present-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>
    <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <div class="image">
                                <img src="<?php echo base_url()?>assets/img/education.png" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                    <img class="avatar border-white" src="<?php echo base_url().$student_data->stud_profile;?>">
                                  
                                  <h4 class="title"><?php echo $student_data->stud_surname." ".$student_data->stud_name." ".$student_data->father_name." ".$student_data->mother_name;?><br>
                                     <small><?php echo $student_data->stud_email;?></small><br>
                                      <small><?php echo $student_data->stud_contact;?></small><br>
                                      <small><?php echo $student_data->stud_dob;?></small>
                                  </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-1">
                                        <h5>Batch<br /><small><?php echo $batch_data->batch_name;?></small></h5>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Timing<br /><small><?php echo $batch_data->batch_timing;?></small></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Year<br /><small><?php echo $student_data->admission_year;?></small></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Fees Details</h4>
                            </div>
                            <div class="content">
                                <ul class="list-unstyled team-members">
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                Total Fees
                                                <br>
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                <b><?php echo $fee_data->total_fee; ?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                Discount Fees
                                                <br>
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                <b><?php echo $fee_data->discount; ?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                Final Fees
                                                <br>
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                <b><?php echo $fee_data->final_fee; ?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                Payment Received
                                                <br>
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                <b><?php echo $fee_data->recieved_fee;?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                Balance Amount
                                                <br>
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                <b><?php echo $fee_data->balance_fee;?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <!--<li>
                                        <div class="row">                                        
                                            <div class="col-xs-11 text-right">
                                                <a>more Details</a>
                                            </div>
                                        </div>
                                    </li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Student Details</h4>
                            </div>
                            <div class="content">
                                <ul class="list-unstyled team-members">
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                Status
                                                <br>
                                            </div>
                                            <div class="col-xs-9">
                                                <b style="color:green;">Active</b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                Student ID
                                                <br>
                                            </div>
                                            <div class="col-xs-6 ">
                                                <b><?php echo $id = $student_data->stud_ID;?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                Student Name
                                                <br>
                                            </div>
                                            <div class="col-xs-6 ">
                                                <b><?php echo $student_data->stud_name." ".$student_data->stud_surname;?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                Father's Name
                                                <br>
                                            </div>
                                            <div class="col-xs-9">
                                                <b><?php echo $student_data->father_name." ".$student_data->stud_surname;?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                Mother's Name
                                                <br>
                                            </div>
                                            <div class="col-xs-6">
                                                <b><?php echo $student_data->mother_name." ".$student_data->stud_surname;?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                Address
                                                <br>
                                            </div>
                                            <div class="col-xs-9">
                                                <b><?php echo $student_data->stud_address;?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                Contact
                                                <br>
                                            </div>
                                            <div class="col-xs-9">
                                                <b><?php echo $student_data->stud_contact;?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                Parent Contact
                                                <br>
                                            </div>
                                            <div class="col-xs-9">
                                                <b><?php echo $student_data->pcontactnumber ;?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                Parent Email
                                                <br>
                                            </div>
                                            <div class="col-xs-9">
                                                <b><?php echo $student_data->pemail;?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                School / College Name
                                                <br>
                                            </div>
                                            <div class="col-xs-9">
                                                <b><?php echo $student_data->sch_coll_name;?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                Board
                                                <br>
                                            </div>
                                            <div class="col-xs-9">
                                                <b><?php echo $student_data->board;?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                Course Type
                                                <br>
                                            </div>
                                            <div class="col-xs-9">
                                                <b><?php echo $student_data->course_type;?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-*"><br>
                                                <center><a href="<?php echo site_url("Student_cont/updateStudentProfile/$id") ?>"><button class="btn btn-success">Edit Profile</button></a></center>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            
                        </div> 
                        <?php echo form_open('PdfExport_cont'); ?>
                        <input type="hidden" value="<?php echo $classesName; ?>" name="classes_name" />
                        <input type="hidden"  value="<?php echo $admissionDate; ?>" name="admission_date" />
                        <input type="hidden" value="<?php echo $receipt1; ?>" name="receipt_1" />
                        <input type="hidden" value="<?php echo $studentName; ?>" name="student_name" /> 
                        <input type="hidden" value="<?php echo $payMode; ?>" name="payMode" /> 
                        <input type="hidden" value="<?php echo $FinalAmt; ?>" name="FinalAmt" /> 
                        <input type="hidden" value="<?php echo $RecievedFee; ?>" name="RecievedFee" /> 
                        <input type="hidden" value="<?php echo $BalanceFee; ?>" name="BalanceFee" /> 
                        <input type="hidden" value="<?php echo $chq_date; ?>" name="chq_date" /> 
                        <input type="hidden" value="<?php echo $bank_name; ?>" name="bank_name" /> 
                        <input type="hidden" value="<?php echo $chq_no; ?>" name="chq_no" /> 
                        <input type="hidden" value="<?php echo $transc_id; ?>" name="transc_id" /> 
                        
                        
                        
                        <div class="row">
                            <div class="col-xs-*"><br>
                               <a href="<?php echo site_url("Student_cont/updateStudentProfile/$id") ?>"><button class="btn btn-success">Print Reciept</button></a>
                            </div>
                        </div>
                        <?php form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
