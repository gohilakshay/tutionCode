<?php include "header.php";?>
<?php $page="eight";include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>
<br>
<div class="content">   
    <div class="container-fluid">
        <?php echo form_open('Batch_cont/updateBatches'); ?>
        <div class="row">
            <div class="col-lg-12 col-lg-12 ">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Update Batches</h4>
                    </div>
                    <?php foreach($result as $value):?>
                    <div class="content">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Batch Name</label>
                                    <input type="text" class="form-control border-input" name="batchname" value="<?php echo $value->batch_name;?>" placeholder="IX-1" readonly>
                                    <?php echo form_error('batchname', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Batch Timing</label>
                                    <input type="text" class="form-control border-input"  placeholder="Batch Timing" name="batch_timing"  value="<?php echo $value->batch_timing;?>" required>
                                    <?php echo form_error('batch_timing', '<div class="alert alert-danger contact-warning">', '</div>');?> 
                                </div>
                             
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Courses</label> 
                                    <select class="form-control border-input" id="course" name="course" required>
                                        <option value="<?php echo $value->course_name;?>"><?php echo $value->course_name;?></option>
                                        <option value="">--- Select Course ---</option>
                                        <?php foreach($result1 as $value){?>
                                        <option value="<?php echo $value->course_name;?>"><?php echo $value->course_name;?></option>
                                        <?php }?>
                                    </select>
                                    <?php echo form_error('course', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                             <button type="submit" class="btn btn-success">Update Batches</button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div> 
        </div>
        <?php form_close() ?>
    </div>
</div>
<?php include "footer.php";?>
<?php include "addModel.php"?>
<?php include "script_include.php"; ?>
<?php include "subject_script.php";?>
<?php include "branch-sem_script.php";?>
<?php ?>
