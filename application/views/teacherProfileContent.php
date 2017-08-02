<?php 
$value = $result[0];
$subj = $result[1];
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
                                    <img class="avatar border-white" src="<?php echo base_url()?><?php echo $value->t_profile;?>">
                                  
                                  <h4 class="title"><?php echo $value->t_name." ".$value->t_fathername." ".$value->t_surname;?><br>
                                     <small><?php echo $value->t_email; ?></small><br>
                                      <small><?php echo $value->t_dob; ?></small>
                                  </h4>
                                </div>
                            </div>
                            
                        </div>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Salary Details</h4>
                            </div>
                            <div class="content">
                                <ul class="list-unstyled team-members">
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                Total Salary
                                                <br>
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                <b><?php echo $value->salary; ?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                Payment Paid
                                                <br>
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                <b>40000</b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                Payment Unpaid
                                                <br>
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                <b>10000</b>
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
                                <h4 class="title">Teacher Details</h4>
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
                                                Teacher Name
                                                <br>
                                            </div>
                                            <div class="col-xs-6 ">
                                                <b><?php echo $value->t_name." ".$value->t_fathername." ".$value->t_surname;?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                Qualification
                                                <br>
                                            </div>
                                            <div class="col-xs-6 ">
                                                <b><?php echo $value->qualification; ?></b>
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
                                                <b><?php echo $value->t_address; ?></b>
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
                                                <b><?php echo $value->t_contact; ?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                Email
                                                <br>
                                            </div>
                                            <div class="col-xs-9">
                                                <b><?php echo $value->t_email; ?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                Standard
                                                <br>
                                            </div>
                                            <div class="col-xs-9">
                                                <b><?php echo $subj->standard_name;?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                Branch
                                                <br>
                                            </div>
                                            <div class="col-xs-9">
                                                <b><?php if($subj->branch_name!= NULL ){echo $subj->branch_name;}else echo "--";?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                Semester
                                                <br>
                                            </div>
                                            <div class="col-xs-9">
                                                <b><?php if($subj->semester_name != NULL){echo $subj->semester_name;} else echo "--";?></b>
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
                                                <b><?php echo $subj->subject_id;?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-*"><br>
                                                <center><a href="<?php echo site_url("Teacher_cont/updateTeacherProfile") ?>"><button class="btn btn-success">Edit Profile</button></a></center>
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
