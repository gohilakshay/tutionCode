<?php include "header.php";?>
<?php $page="one";include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>
<br>
<div class="content">   
    <div class="container-fluid">
        <?php echo form_open('Batch_cont/addBatch'); ?>
        <div class="row">
            <div class="col-lg-12 col-lg-12 ">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add Batches</h4>
                    </div>

                    <div class="content">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Batch Name</label>
                                    <input type="text" class="form-control border-input" name="batchname" value="<?php         if(isset($_POST['batchname'])){echo $_POST['batchname'];}?>" placeholder="IX-1" required>
                                    <?php echo form_error('batchname', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Batch Timing</label>
                                    <input type="text" class="form-control border-input"  placeholder="Batch Timing" name="batch_timing"  value="<?php         if(isset($_POST['batch_timing'])){echo $_POST['batch_timing'];} ?>" required>
                                    <?php echo form_error('batch_timing', '<div class="alert alert-danger contact-warning">', '</div>');?> 
                                </div>
                             
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Courses</label> 
                                    <select class="form-control border-input" id="course" name="course" required>
                                        <option value="">---Select Course---</option>
                                        <option value="course1">course1</option>
                                        <option value="course2">course2</option>
                                        <option value="course3">course3</option>
                                    </select>
                                    <?php echo form_error('course', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                             <button type="submit" class="btn btn-success">Add Batches</button>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <?php form_close() ?>
        <?php echo form_open('Batch_cont/batch'); ?>
        <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="card">
                            <div class="col-1">
                                <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                    <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                        <h3 class="text-uppercase">Batch Details</h3>
                                    </div>
                                    <div class="table-responsive">
                                        
                                        <table class="table table-striped table-bordered" >
                                       
                                            <thead>
                                                <tr style="font-weight: bold;">
                                                    <td>Sr No.</td>
                                                    <td>Batch Name<? echo "$batchname";?></td>
                                                    <td>Batch Timing</td>
                                                    <td>Course</td>
                                                    <td>Modify Data</td>
                                                    <td>Delete Data</td>
                                                </tr>
                                            </thead>
                                        
                                            <tbody>
                                        
                                                <tr>
                                                    <td>1.</td>
                                                    <td>10</td>
                                                    <td>10-11</td>
                                                    <td>9-10th ssc board</td>
                                                    <td><center><button type="edit" class="btn btn-success">Edit</button></center></td>
                                                    <td><center><button type="delete" class="btn btn-danger">Delete</button></center></td>
                                                </tr>
                                        
                                                <tr>
                                                    <td>2.</td>
                                                    <td>11</td>
                                                    <td>11-12</td>
                                                    <td>12th Commerce state board</td>
                                                    <td><center><button type="edit" class="btn btn-success">Edit</button></center></td>
                                                    <td><center><button type="delete" class="btn btn-danger">Delete</button></center></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                          
                                    </div>                          
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php form_close() ?>
    </div>
</div>
<?php include "footer.php";?>
<?php include "addModel.php"?>
<?php include "script_include.php"; ?>
<?php include "custom_script.php";?>
