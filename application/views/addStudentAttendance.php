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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="row" style="margin-top: 0px;">
                        <div class="col-md-12">
                            <center>
                                <h3>
                                    <a href="<?php echo site_url()."/Attendance_cont/markTeacherAttendance" ?>"><button type="submit" class="btn btn-success">Mark Faculty Attendance</button></a>
                                </h3>
                            </center>
                        </div>
                    </div>
                    <div class="header">
                        <h4 class="title">Mark Attendance</h4>
                    </div>
                    <?php echo form_open('Attendance_cont/markStudentAttendance'); ?>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Batch Name</label>
                                    <input type="text" class="form-control border-input" name="batchname" value="<?php         if(isset($_POST['batchname'])){echo $_POST['batchname'];}?>" placeholder="IX-1" required>
                                    <?php echo form_error('batchname', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Batch Timing</label>
                                    <input type="text" class="form-control border-input" name="batchtiming" value="<?php         if(isset($_POST['batchtiming'])){echo $_POST['batchtiming'];} ?>" placeholder="10.00 - 1.00" required>
                                    <?php echo form_error('batchtiming', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Faculty Name</label>
                                    <input type="text" class="form-control border-input" name="facultyname" value="<?php         if(isset($_POST['facultyname'])){echo $_POST['facultyname'];} ?>" placeholder="FirstName &emsp;&emsp;&emsp;  LastName">
                                    <?php echo form_error('facultyname', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
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
                                    <center><button type="submit" class="btn btn-success" name="markattend" style="margin-top: 8px;"> Mark Attendance</button></center>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                </div>
            </div>
        </div>
        <?php echo form_close();?>
        <?php if(isset($_POST['markattend'])){?>
        <?php echo form_open('Attendance_cont/StudentAttendance'); ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="col-1">
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                    <h3 class="text-uppercase">Student Details</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" >
                                        <thead>
                                            <tr style="font-weight: bold;">
                                                <td>Sr No.</td>
                                                <td>Student ID</td>
                                                <td>Student Name</td>
                                                <td>Mark Absent Attendance</td>
                                            </tr>
                                        </thead>
                                        <tbody><?php 
                                              $i=1; $n=count($result);foreach($result  as $value): 
                                            if($i!=$n){
                                            ?>
                                            <tr>
                                                <td><?php echo $i; $i++; ?></td>
                                                <td><input type="text" value ="<?php echo $value->stud_ID; ?>" name="stud_id[]" hidden><?php echo $value->stud_ID; ?></td>
                                                <td><?php echo $value->stud_name; ?></td>
                                                <td><input type="checkbox" value="<?php echo $value->stud_ID; ?>" name="attend[]" ></td>
                                            </tr><?php }
                                              else {
                                                  ?><input type="text" value ="<?php echo end($result); ?>" name="attend_id" hidden><?PHP
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
        <?php echo form_close();?>
        <?php } ?>
    </div>
</div>
<?php include "footer.php";?>
<?php include "addModel.php";?>
<?php include "script_include.php";?>