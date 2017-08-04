<?php include "header.php";?>
<?php $page="one";include "sidebar.php";?>
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
        <?php echo form_open_multipart('Upload_FileCont/uploadfile'); ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Upload File</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>File Name</label>
                                    <input type="text" class="form-control border-input" name="filename"  placeholder="Enter File Name" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Discription</label>
                                    <input type="text" class="form-control border-input" name="discription"  placeholder="Enter Discription">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control border-input" name="date" value="<?php echo date("Y-m-d"); ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>File</label>
                                    <input type="file" class="form-control border-input" name="filename" >
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <br>
                                    <center><button type="submit" name="markTeacher" class="btn btn-success" style="margin-top: 8px;"> Upload File</button></center>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                </div>
            </div>
        </div>
        <?php echo form_close();?>
        
    </div>
</div>
<?php include "footer.php";?>
<?php include "addModel.php";?>
<?php include "script_include.php";?>