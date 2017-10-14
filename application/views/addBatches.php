
<?php include "header.php";?>
<?php $page="eight";include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>
<br>
<div class="content">   
    <div class="container-fluid">
        <?php if($this->session->flashdata('success') == 'You have Successfully submitted data.') { ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-right: 25px;"><span aria-hidden="true">&times;</span></button>
            <h5><?php echo $this->session->flashdata('success'); ?></h5>
        </div>
        <?php } else if ($this->session->flashdata('success') == 'Sorry Batch Cannot be DELETED.') { ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-right: 25px;"><span aria-hidden="true">&times;</span></button>
            <h5><?php echo $this->session->flashdata('success'); ?></h5>
        </div>
        <?php } ?>
        <!--form-->
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
                             <button type="submit" class="btn btn-success">Add Batches</button>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <?php echo form_close(); ?>
        
       <!--table-->
        <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="card">
                            <div class="col-1">
                                <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                    <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <h3 class="text-uppercase">Batch Details&emsp;</h3>
                                            </div>
                                            <div class="col-md-8" style="margin-top:-2px;">
                                                    <h3>
                                                         <input type="text" id="teachersearch"
                                                           onkeyup="myFunction()"        placeholder="Search..." style="width:          80%;" required> 
                                                    </h3>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="table-responsive">
                                        
                                        <table class="table table-striped table-bordered"  >
                                       
                                            <thead>
                                                <tr class="header" >
                                                    <th style="font-weight: bold;">Sr No.</th>
                                                    <th style="font-weight: bold;">Batch ID</th>
                                                    <th style="font-weight: bold;">Batch Name</th>
                                                    <th style="font-weight: bold;">Batch Timing</th>
                                                    <th style="font-weight: bold;">Course</th>
                                                    <th style="font-weight: bold;">Modify Data</th>
                                                    <th style="font-weight: bold;">Delete Data</th>
                                                </tr>
                                            </thead>
                                        
                                            <tbody id="myTable">
                                                <?php $i=0; foreach($result as $value) {?>
                                                <tr>
                                                    <td><?php $i++;echo $i;?></td>
                                                    <td><a href="<?php echo site_url("Batch_cont/Student_batch_view/$value->batch_ID") ?>"><?php echo $value->batch_ID;?></a></td>
                                                    <td><a href="<?php echo site_url("Batch_cont/Student_batch_view/$value->batch_ID") ?>"><?php echo $value->batch_name;?></a></td>
                                                    <td><?php echo $value->batch_timing;?></td>
                                                    <td><?php echo $value->course_name;?></td>
                                                    <td>
                                                        <?php echo form_open('Batch_cont/updateBatches'); ?>
                                                            <div class="text-center">
                                                                <input type="hidden" value="<?php echo $value->batch_ID; ?>" name="batch_id" >
                                                                <center><button type="submit" class="btn btn-success">Edit</button></center>
                                                            </div>
                                                        <?php echo form_close(); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo form_open('Batch_cont/DeleteBatches'); ?>
                                                        <input type="hidden" value="<?php echo $value->batch_ID; ?>" name="batch_id" >
                                                        <center><button type="delete" class="btn btn-danger">Delete</button></center>
                                                        <?php echo form_close(); ?>
                                                    </td>
                                                </tr><?php }?>
                                            </tbody>
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
<style> 
input[id=teachersearch] {
    width: 5px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 50px;
    font-size: 16px;
    background-color: white;
    background-image: url('<?php echo base_url()?>assets/icon/search.png');
    background-position: 7px 1px; 
    background-repeat: no-repeat;
    background-size: 21px;
    padding-left: 35px;
}

input[id=studentsearch]:focus {
    width: 80%;
}
</style>
<?php include "footer.php";?>
<?php include "addModel.php"?>
<?php include "script_include.php"; ?>
<!--<?php include "subject_script.php";?>-->
<?php include "branch-sem_script.php";?>