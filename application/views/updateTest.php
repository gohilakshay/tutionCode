 <?php include "header.php";?>
<?php $page="*";include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>
<?php foreach($result as $value): ?>
<br>
<div class="content">
    <div class="container-fluid">
         <div class="row">
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
        </div>
        
        <?php echo form_open('Test_cont/updateTest'); ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Update Test</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                <label>Test ID</label>
                                <input type="text" class="form-control border-input" name="testid" value="<?php echo $value->test_ID; ?>" required readonly>
                                <?php echo form_error('testid', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Test Date</label>
                                    <input type="date" class="form-control border-input" name="testdate" value="<?php echo $value->test_date; ?>" required >
                                    <?php echo form_error('testdate', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Test Time</label>
                                    <input type="text" class="form-control border-input" name="testtime" value="<?php echo $value->test_time; ?>" required >
                                    <?php echo form_error('testtime', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Total Marks</label>
                                    <input type="text" class="form-control border-input" name="totalmarks" value="<?php echo $value->total_marks; ?>" required >
                                    <?php echo form_error('totalmarks', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Passing Marks</label>
                                    <input type="text" class="form-control border-input" name="passingmarks" value="<?php echo $value->passing_marks; ?>" required >
                                    <?php echo form_error('passingmarks', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Batch Name</label>
                                    <select class="form-control border-input" name="batchname" required>
                                        <option value="<?php echo $value->batch_id; ?>"><?php echo $value->batch_id; ?></option>
                                        <option value="">--- Select Batch ---</option>
                                        <?php foreach($batch_details as $batchName): ?>
                                        <option value="<?php echo $batchName->batch_name; ?>"><?php echo $batchName->batch_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control border-input" name="subject" value="<?php echo $value->subject_name; ?>" required >
                                    <?php echo form_error('subject', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Supervisor Name</label>
                                    <input type="text" class="form-control border-input" name="supervisorname" value="<?php echo $value->supervisor_name; ?>" required >
                                    <?php echo form_error('supervisorname', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <br>
                                    <center><button type="submit" class="btn btn-success" style="margin-top: 8px;">Update Test</button></center>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                </div>
            </div>
        </div>
        <?php echo form_close();?>
    </div>
</div><?php endforeach; ?>
<?php include "footer.php";?>
<?php include "addModel.php";?>
<?php include "script_include.php";?>