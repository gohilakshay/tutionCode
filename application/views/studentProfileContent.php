<?php
$student_data = $result[0];
$batch_data = $result[1];
$fee_data = end($result);
?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <div class="image">
                                <img src="<?php echo base_url()?>assets/img/education.png" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                    <img class="avatar border-white" src="<?php echo base_url()?>assets/img/faces/face-1.jpg">
                                  
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
                                    <li>
                                        <div class="row">                                        
                                            <div class="col-xs-11 text-right">
                                                <a>more Details</a>
                                            </div>
                                        </div>
                                    </li>
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
                                                City
                                                <br>
                                            </div>
                                            <div class="col-xs-9">
                                                <b>Mumbai</b>
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
                                            <div class="col-xs-3">
                                                Subjects
                                                <br>
                                            </div>
                                            <div class="col-xs-9">
                                                <b>Maths, Science, English, Marathi, Hindi</b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                Attendance
                                                <br>
                                            </div>
                                            <div class="col-xs-9">
                                                <b>80/90</b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                Overall Performance
                                                <br>
                                            </div>
                                            <div class="col-xs-9">
                                                <b>78.90%</b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-*"><br>
                                                <center><a href="<?php echo site_url("Student_cont/updateStudentProfile") ?>"><button class="btn btn-success">Edit Profile</button></a></center>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
