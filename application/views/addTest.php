 <?php include "header.php";?>
<?php $page="nine";include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>
<br>
<div class="content">
    <div class="container-fluid">
        <?php if($this->session->flashdata('success') == 'Test Id Already EXISTS.') { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-right: 25px;"><span aria-hidden="true">&times;</span></button>
                <h5><?php echo $this->session->flashdata('success'); ?></h5>
            </div>
        <?php }else if($this->session->flashdata('success') == 'You have Successfully submitted data.') { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-right: 25px;"><span aria-hidden="true">&times;</span></button>
                <h5><?php echo $this->session->flashdata('success'); ?></h5>
            </div>
        <?php } ?>
        <?php echo form_open('Test_cont/addTest'); ?>
        
         <div class="row">
            <a href="<?php echo site_url("Student_cont/student") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
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
            <a href="<?php echo site_url("Test_cont/addTest") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content" style="box-shadow: 0 2px 2px rgb(128, 191, 209)!important;">
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
                        <h3 class="text-uppercase" style="margin-top: 10px;">Add Test</h3>
                    </div>
                </div>
            </div>
        </div>
-->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add Test</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                <label>Test ID <span class="required" style="color:red;"> * </span></label>
                                    <input type="text" class="form-control border-input phoneInput" name="testid" value="<?php  if(isset($_POST['testid'])){echo $_POST['testid'];} ?>" required>
                                <?php echo form_error('testid', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Test Date <span class="required" style="color:red;"> * </span></label>
                                    <input type="date" class="form-control border-input" name="testdate" value="<?php   if(isset($_POST['testdate'])){echo $_POST['testdate'];} ?>" required >
                                    <?php echo form_error('testdate', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Test Time <span class="required" style="color:red;"> * </span></label>
                                    <input type="text" class="form-control border-input UserName_field" name="testtime" value="<?php  if(isset($_POST['testtime'])){echo $_POST['testtime'];} ?>" required >
                                    <?php echo form_error('testtime', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Total Marks <span class="required" style="color:red;"> * </span></label>
                                    <input type="text"  class="form-control border-input phoneInput" name="totalmarks" value="<?php   if(isset($_POST['totalmarks'])){echo $_POST['totalmarks'];} ?>" required >
                                    <?php echo form_error('totalmarks', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Passing Marks <span class="required" style="color:red;"> * </span></label>
                                    <input type="text" class="form-control border-input phoneInput" name="passingmarks" value="<?php if(isset($_POST['passingmarks'])){echo $_POST['passingmarks'];} ?>" required >
                                    <?php echo form_error('passingmarks', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Batch Name <span class="required" style="color:red;"> * </span></label>
                                    <select class="form-control border-input" name="batchname" required>
                                        <?php if(isset($_POST['batchname'])){ ?>
                                        <option value="<?php echo $batchName->batch_name; ?>"><?php echo $batchName->batch_name; ?></option>
                                        <?php } ?><option value="">--- Select Batch ---</option>
                                        <?php foreach($batch_details as $batchName): ?>
                                        <option value="<?php echo $batchName->batch_name; ?>"><?php echo $batchName->batch_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Subject <span class="required" style="color:red;"> * </span></label>
                                    <input type="text" class="form-control border-input UserName_field" name="subject" value="<?php if(isset($_POST['subject'])){echo $_POST['subject'];} ?>" required >
                                    <?php echo form_error('subject', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Supervisor Name <span class="required" style="color:red;"> * </span></label>
                                    <input type="text" class="form-control border-input surnameInput" name="supervisorname" value="<?php if(isset($_POST['supervisorname'])){echo $_POST['supervisorname'];} ?>" required >
                                    <?php echo form_error('supervisorname', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <br>
                                    <center><button type="submit" class="btn btn-success" style="margin-top: 8px;">Add Test</button></center>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="col-1">
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                    <h3 class="text-uppercase">Test Schedule</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" >
                                        <thead>
                                            <tr style="font-weight: bold;">
                                                <td>Sr No.</td>
                                                <td>Test ID</td>
                                                <td>Test Date</td>
                                                <td>Batch Name</td>
                                                <td>Test time</td>
                                                <td>Subject</td>
                                                <td>Marks</td>
                                                <td>Modify Data</td>
                                                <td>Delete Data</td>
                                            </tr>
                                        </thead>
                                        <tbody><?php $i=1;foreach($result as $value): ?>
                                            <tr>
                                                <td><?php echo $i;$i++; ?></td>
                                                <td><?php echo $value->test_ID; ?></td>
                                                <td><?php echo $value->test_date; ?></td>
                                                <td><?php echo $value->batch_id ; ?></td>
                                                <td><?php echo $value->test_time; ?></td>
                                                <td><?php echo $value->subject_name; ?></td>
                                                <td><?php echo $value->total_marks; ?></td>
                                                <td>
                                                    <?php echo form_open('Test_cont/updateTest'); ?>
                                                    <div class="text-center">
                                                                <input type="hidden" value="<?php echo $value->test_ID; ?>" 
                                                                  name="test_id">
                                                                <center><button type="submit" class="btn btn-success" >Edit</button>
                                                                </center>
                                                            </div>
                                                    <?php echo form_close(); ?>
                                                </td>
                                                <td>
                                                    <?php echo form_open('Test_cont/deleteTest'); ?>
                                                        <center>
                                                        <input type="hidden" value="<?php echo $value->test_ID;?>" name="test_id">
                                                        <button type="submit" class="btn btn-danger">Delete</button></center>
                                                        <?php echo form_close(); ?>
                                               </td>
                                            </tr>
                                        <?php endforeach; ?></tbody>
                                    </table>    
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</div>
<?php include "footer.php";?>
<?php include "addModel.php";?>
<?php include "script_include.php";?>