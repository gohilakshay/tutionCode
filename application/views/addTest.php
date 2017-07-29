 <?php include "header.php";?>
<?php $page="*";include "sidebar.php";?>
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
        <?php echo form_open('Test_cont/addTest'); ?>
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
                                <label>Test ID</label>
                                <input type="text" class="form-control border-input" name="testid" value="<?php         if(isset($_POST['testid'])){echo $_POST['testid'];} ?>" required>
                                <?php echo form_error('testid', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Test Date</label>
                                    <input type="date" class="form-control border-input" name="testdate" value="<?php   if(isset($_POST['testdate'])){echo $_POST['testdate'];} ?>" required >
                                    <?php echo form_error('testdate', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Test Time</label>
                                    <input type="text" class="form-control border-input" name="testtime" value="<?php  if(isset($_POST['testtime'])){echo $_POST['testtime'];} ?>" required >
                                    <?php echo form_error('testtime', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Total Marks</label>
                                    <input type="text" class="form-control border-input" name="totalmarks" value="<?php   if(isset($_POST['totalmarks'])){echo $_POST['totalmarks'];} ?>" required >
                                    <?php echo form_error('totalmarks', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Passing Marks</label>
                                    <input type="text" class="form-control border-input" name="passingmarks" value="<?php         if(isset($_POST['passingmarks'])){echo $_POST['passingmarks'];} ?>" required >
                                    <?php echo form_error('passingmarks', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Batch Name</label>
                                    <input type="text" class="form-control border-input" name="batchname" value="<?php         if(isset($_POST['batchname'])){echo $_POST['batchname'];} ?>" required >
                                    <?php echo form_error('batchname', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control border-input" name="subject" value="<?php         if(isset($_POST['subject'])){echo $_POST['subject'];} ?>" required >
                                    <?php echo form_error('subject', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Supervisor Name</label>
                                    <input type="text" class="form-control border-input" name="supervisorname" value="<?php         if(isset($_POST['supervisorname'])){echo $_POST['supervisorname'];} ?>" required >
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
                                                        <center><button type="submit" class="btn btn-success">Edit</button></center>
                                                    </div>
                                                    <?php echo form_close(); ?>
                                                </td>
                                                <td><center><button type="submit" class="btn btn-danger">Delete</button></center></td>
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