<?php include "header.php";?>
<?php $page = 'three';include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>
<?php echo form_open('Enquiry_cont/enquiryReply'); ?>
<br>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-offset-2 col-md-8 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <center>
                            <?php
                            $status="joined";
                            if($status == "joined")
                            {
                                ?>
                                <button type="submit" id="joined" style="background-color:#7ac29a; color:black;" class="btn btn-success">Joined</button>&emsp;&emsp;
                           <?php 
                            }else if($status == "inprocess")
                            {                               
                                ?>
                                <button type="submit" id="inprocess" style="background-color:#F3BB45; color:black;" class="btn btn-warning">In Process</button>&emsp;&emsp;
                           <?php 
                            }else if($status == "notjoined")
                            {
                                ?>
                                <button type="submit" id="notjoined" style="background-color:#EB5E28; color:black;" class="btn btn-danger">Not Joined</button>
                           <?php 
                            }
                            ?>
                        </center>
                    </div>
   
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control border-input" name="enquirename" value="<?php if(isset($_POST['enquirename'])){echo $_POST['enquirename'];} ?>" readonly>
                                    <?php echo form_error('enquirename', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>EmailID</label>
                                    <input type="email" class="form-control border-input" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" readonly>
                                    <?php echo form_error('email', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>   
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control border-input" name="mobile" value="<?php if(isset($_POST['mobile'])){echo $_POST['mobile'];} ?>" readonly>
                                    <?php echo form_error('mobile', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control border-input" name="subject" value="<?php if(isset($_POST['subject'])){echo $_POST['subject'];} ?>" readonly>
                                    <?php echo form_error('subject', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Reference</label>
                                    <input type="text" class="form-control border-input" name="reference" value="<?php if(isset($_POST['reference'])){echo $_POST['reference'];} ?>" readonly>
                                    <?php echo form_error('reference', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Query</label>
                                    <textarea rows="5" type="text" class="form-control border-input" name="query" value="<?php if(isset($_POST['query'])){echo $_POST['query'];} ?>" readonly></textarea>
                                    <?php echo form_error('query', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Replied By</label>
                                    <input type="text" class="form-control border-input" name="repliedby" value="<?php if(isset($_POST['repliedby'])){echo $_POST['repliedby'];} ?>" required>
                                    <?php echo form_error('repliedby', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Reply</label>
                                    <textarea rows="4" type="text" class="form-control border-input" name="reply" value="<?php if(isset($_POST['reply'])){echo $_POST['reply'];} ?>" required></textarea>
                                    <?php echo form_error('reply', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                </div>
            </div>

            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            </div> 
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <center><button type="submit" class="btn btn-success">Send</button></center>
                    <!--<button type="reset" class="btn btn-danger">Clear Form</button>-->	
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
<?php include "footer.php";?>
<?php include "addModel.php"?>
<?php include "script_include.php"; ?>
<?php include "custom_script.php";?>