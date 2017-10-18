<?php include "header.php";?>
<?php $page="six";include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>
<br>
<div class="content">
    <div class="container-fluid">
        <?php if($this->session->flashdata('success')) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-right: 25px;"><span aria-hidden="true">&times;</span></button>
                <h5><?php echo $this->session->flashdata('success'); ?></h5>
            </div>
        <?php } ?>
         
        <div class="row">
            <a href="<?php echo site_url("Teacher_cont/teacher") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-success text-center">
                                    <img src="<?php echo base_url()?>assets/icon/teachers.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Faculty</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <a href="<?php echo site_url("Teacher_cont/addTeacher") ?>">
                                    <i class="ti-plus"></i> Add Faculty
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a href="<?php echo site_url("Attendance_cont/viewTeacherAttendance") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content" style="box-shadow: 0 2px 2px rgb(128, 191, 209)!important;">
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
                                <a href="<?php echo site_url("Attendance_cont/markTeacherAttendance") ?>">
                                    <i class="ti-plus"></i> Mark Attendance
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a href="<?php echo site_url("Teacher_cont/TeacherPaymentDetails") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-success text-center">
                                    <img src="<?php echo base_url()?>assets/icon/wallet.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Payment</p>
                                   <!--Present-->
                                </div>
                            </div>
                        </div>
                        <div class="footer"><hr>
                            <div class="stats">
                                <a href="<?php echo site_url("Teacher_cont/TeacherPaymentDetails") ?>">
                                    <i class="ti-plus"></i> Faculty Payment
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a href="<?php echo site_url("Upload_FileCont/upload") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-info text-center">
                                    <img src="<?php echo base_url()?>assets/icon/upload.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Assignments</p>
                                    <!--Details-->
                                </div>
                            </div>
                        </div>
                        <div class="footer"><hr>
                            <div class="stats">
                                <a href=" <?php echo site_url()."/Upload_FileCont/upload" ?> ">
                                    <i class="ti-plus"></i>Upload Assignments 
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
                        <h3 class="text-uppercase" style="margin-top: 10px;">Add Faculty Attendance</h3>
                    </div>
                </div>
            </div>
        </div>
-->
        <!--<div class="card">
            <div class="row" style="margin-top: 0px;">
                <div class="col-md-12">
                    <center>
                        <h3>To View Teacher Attendance Click Here 
                            <a href="<?php echo site_url()."/Attendance_cont/viewTeacherAttendance" ?>"><button type="submit" class="btn btn-success">View Teacher Attendance</button></a>
                        </h3>
                    </center>
                </div>
            </div>
        </div>-->
        <?php echo form_open('Attendance_cont/markTeacherAttendance'); ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="row" >
                        <div class="col-md-12">
                                <h3 class="header"> Faculty Attendance
                                    <!--<a href="<?php echo site_url()."/Attendance_cont/markTeacherAttendance" ?>"><button type="submit" class="btn btn-success">Mark Faculty Attendance</button></a>-->
                                </h3>
                        </div>
                    </div>
                    <hr>
                    <div class="header">
                        <h4 class="title">Mark Attendance</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <!--<input type="text" class="form-control border-input" name="subject" value="<?php if(isset($_POST['subject'])){echo $_POST['subject'];}?>" placeholder="English" required>
                                    <?php echo form_error('subject', '<div class="alert alert-danger contact-warning">', '</div>'); ?>-->
                                    <select name="subject" class="form-control border-input" required>
                                        <?php if(isset($_POST['subject'])){ ?>
                                        <option value="<?php echo $_POST['subject']; ?>"><?php echo $_POST['subject']; ?></option>
                                        <?php } ?>
                                        <option value="">--- Select Subject ---</option>
                                        <?php foreach($subject as $subIdName): ?>
                                            <option value="<?php echo $subIdName->subject_name; ?>"><?php echo $subIdName->subject_name; ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        <div class="col-md-3">
                                <div class="form-group">
                                    <label>Timing</label>
                                    <input type="text" class="form-control border-input UserName_field" name="timing" value="<?php if(isset($_POST['timing'])){echo $_POST['timing'];} ?>" placeholder="Timing ">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control border-input" name="date" value="<?php echo date("Y-m-d"); ?>">
                                    <?php echo form_error('date', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <br>
                                    <center><button type="submit" name="markTeacher" class="btn btn-success" style="margin-top: 8px;"> Mark Attendance</button></center>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                </div>
            </div>
        </div>
        <?php echo form_close();?>
        <?php if(isset($_POST['markTeacher'])) { ?>
        <?php echo form_open('Attendance_cont/TeacherAttendance'); ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="col-1">
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                    <h3 class="text-uppercase">Teacher Details</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" >
                                        <thead>
                                            <tr style="font-weight: bold;">
                                                <td>Sr No.</td>
                                                <td>Teacher ID</td>
                                                <td>Teacher Name</td>
                                                <td>Mark Absent Attendance</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; $n=count($result);foreach($result as $value):
                                            if($i!=$n){
                                            ?>
                                            <tr>
                                                <td><?php echo $i; $i++; ?></td>
                                                <td><input type="text" value ="<?php echo $value->t_ID; ?>" name="teach_id[]" hidden><?php echo $value->t_ID; ?></td>
                                                <td><?php echo $value->t_name; ?></td>
                                                <td><input type="checkbox" value="<?php echo $value->t_ID; ?>" name="attend[]" ></td>
                                            </tr>
                                            <?php }
                                              else {
                                                  ?><input type="text" value ="<?php echo end($result); ?>" name="t_attend_id" hidden><?PHP
                                              }
                                              endforeach; ?>
                                        </tbody>
                                    </table> 
                                    
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <br>
                                        <center><button type="submit" class="btn btn-success" style="margin-top: 8px;">Present</button></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php }?>
    </div>
</div>
<?php include "footer.php";?>
<?php include "addModel.php";?>
<?php include "script_include.php";?>