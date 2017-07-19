<?php foreach($result as $value):

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
                                  
                                  <h4 class="title">Teacher Name<br>
                                     <small>teacher@gmail.com</small><br>
                                      <small>8965231456</small><br>
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
                                                <b>50000</b>
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
                                                <b><?php echo $value->t_contact; ?></b>
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
                                                <b>8,9,10th</b>
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
                                                <b>State Board</b>
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
                                                <b>History</b>
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
                                               Performance Of Students
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
<?php                                                    
 endforeach;
?>