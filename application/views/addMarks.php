<?php include "header.php";?>
<?php $page='four';include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>
<?php echo form_open('Marks_cont/addMarks'); ?>
<br>
<?php 
if(isset($_POST['testid'])){
    $data = $result['data'];
    $stud = $result['stud'];
    $name = $result['stud_name'];
}
?>
<div class="content">
    <div class="container-fluid">
        <?php if($this->session->flashdata('success')) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-right: 25px;"><span aria-hidden="true">&times;</span></button>
                <h5><?php echo $this->session->flashdata('success'); ?></h5>
            </div>
        <?php } ?>
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
                            <?php if(isset($_POST['addMarks'])){
                                    foreach($data as $value):                   
                            ?>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Test Date</label>
                                    <input type="text" class="form-control border-input" name="testdate" value="<?php echo $value->test_date; ?>" required readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Test Time</label>
                                    <input type="text" class="form-control border-input" name="testtime" value="<?php  echo $value->test_time;  ?>" required readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Total Marks</label>
                                    <input type="text" class="form-control border-input" name="totalmarks" value="<?php    echo $value->total_marks; ?>" required readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Passing Marks</label>
                                    <input type="text" class="form-control border-input" name="passingmarks" value="<?php  echo $value->passing_marks; ?>" required readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Batch Name</label>
                                    <input type="text" class="form-control border-input" name="batchname" value="<?php echo $value->batch_id;?>" required readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control border-input" name="subject" value="<?php  echo $value->subject_name; ?>" required readonly>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Supervisor Name</label>
                                    <input type="text" class="form-control border-input" name="supervisorname" value="<?php  echo $value->supervisor_name; ?>" required readonly>
                                </div>
                            </div>
                            <?php endforeach; }?>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <br>
                                    <center><button type="submit" class="btn btn-success" style="margin-top: 8px;" name="addMarks">Add Marks</button></center>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                </div>
            </div>
        </div>
        <?php echo form_close();?>
        <?php if(isset($_POST['addMarks'])){?>
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
                                    <input type="hidden" name="test_id" value="<?php echo $_POST['testid'];?>" >
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
                                            <?php $j=1;$i=0;foreach($stud as $value1):
                                               
                                            ?>
                                            <tr>
                                                <td><?php echo $j;?></td>
                                                <td><input type="hidden" name="stud_id[]" value="<?php echo $value1->stud_id;?>"><?php echo $value1->stud_id;?></td>
                                                <td><?php echo $name[$i];?></td>
                                                <td><input type="text" name="marks[]"></td>
                                            </tr>
                                            <?php $i++;$j++; endforeach;?>
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
        <?php } ?>
    </div>
</div>

<?php include "footer.php";?>
<?php include "addModel.php";?>
<?php include "script_include.php";?>