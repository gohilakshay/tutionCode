<?php include "header.php";?>
<?php $page='four';include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>
<?php echo form_open('Marks_cont/addMarks'); ?>
<br>
<div class="content">
    <div class="container-fluid">
        <?php echo form_open('Marks_cont/addMarks'); ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add Marks</h4>
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
                                    <input type="text" class="form-control border-input" name="testdate" value="<?php   if(isset($_POST['testdate'])){echo $_POST['testdate'];} ?>" required readonly>
                                    <?php echo form_error('testdate', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Test Time</label>
                                    <input type="text" class="form-control border-input" name="testtime" value="<?php  if(isset($_POST['testtime'])){echo $_POST['testtime'];} ?>" required readonly>
                                    <?php echo form_error('testtime', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Total Marks</label>
                                    <input type="text" class="form-control border-input" name="totalmarks" value="<?php   if(isset($_POST['totalmarks'])){echo $_POST['totalmarks'];} ?>" required readonly>
                                    <?php echo form_error('totalmarks', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Passing Marks</label>
                                    <input type="text" class="form-control border-input" name="passingmarks" value="<?php         if(isset($_POST['passingmarks'])){echo $_POST['passingmarks'];} ?>" required readonly>
                                    <?php echo form_error('passingmarks', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Batch Name</label>
                                    <input type="text" class="form-control border-input" name="batchname" value="<?php         if(isset($_POST['batchname'])){echo $_POST['batchname'];} ?>" required readonly>
                                    <?php echo form_error('batchname', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control border-input" name="subject" value="<?php         if(isset($_POST['subject'])){echo $_POST['subject'];} ?>" required readonly>
                                    <?php echo form_error('subject', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Supervisor Name</label>
                                    <input type="text" class="form-control border-input" name="supervisorname" value="<?php         if(isset($_POST['supervisorname'])){echo $_POST['supervisorname'];} ?>" required readonly>
                                    <?php echo form_error('supervisorname', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <br>
                                    <center><button type="submit" class="btn btn-success" style="margin-top: 8px;">Add Marks</button></center>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                </div>
            </div>
        </div>
        <?php echo form_close();?>
        <?php echo form_open('Marks_cont/Marks'); ?>
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
                                                <td>Marks Obtained</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>101</td>
                                                <td>John</td>
                                                <td><input type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>102</td>
                                                <td>Bill</td>
                                                <td><input type="text"></td>
                                            </tr>
                                        </tbody>
                                    </table>    
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <br>
                                        <center><button type="submit" class="btn btn-success" style="margin-top: 8px;">Add</button></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close();?>
    </div>
</div>

<?php include "footer.php";?>
<?php include "addModel.php";?>
<?php include "script_include.php";?>
<?php include "custom_script.php";?>