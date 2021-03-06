<?php include "header.php";?>
<?php $page = 'three';include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>
<?php echo form_open('Enquiry_cont/enquirySend'); ?>
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
          <a href="<?php echo site_url("Enquiry_cont/enquiry") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content" style="box-shadow: 0 2px 2px rgb(128, 191, 209)!important;">
                        <div class="row"> 
                            <div class="col-xs-5">
                                <div class="icon-big icon-success text-center">
                                    <img src="<?php echo base_url()?>assets/icon/enquiry.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p> Enquiry</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <a href="<?php echo site_url("Enquiry_cont/enquiryReply") ?>">
                                    <i class="ti-plus"></i> Add Enquiry
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
     </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Status</label>
                                   <select name="status" class="form-control border-input"  >
                                        <option style="color:#ffbc00" value="inprocess">In Process</option>
                                        <option style="color:green" value="joined">Joined</option>
                                        <option style="color:red" value="notjoined">Not Joined</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" style="float:right">
                                <div class="form-group">
                                    <label>Enquiry Date</label>
                                   <input  class="form-control datepicker" type="date" name="enq_date" value="<?php echo date('Y-m-d');?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name <span class="required" style="color:red;"> * </span></label>
                                    <input type="text" class="form-control border-input UserName_field" name="enquirename" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Gender <span class="required" style="color:red;"> * </span></label><br>
                                     <input type="radio" name="gender" value="male" checked> Male
                                    <input type="radio" name="gender" value="female"> Female
                                </div>   
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>EmailID <span class="required" style="color:red;"> * </span></label>
                                    <input type="email" class="form-control border-input UserName_field" name="email" required>
                                </div>   
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile <span class="required" style="color:red;"> * </span></label>
                                    <input type="text" class="form-control border-input phoneInput" name="mobile" maxlength="10" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Subject <span class="required" style="color:red;"> * </span></label>
                                    <input type="text" class="form-control border-input UserName_field" name="subject" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fees Told / Asked</label>
                                    <input type="text" class="form-control border-input phoneInput" name="fees">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Reference</label>
                                    <input type="text" class="form-control border-input UserName_field" name="reference">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>College</label>
                                    <input type="text" class="form-control border-input UserName_field" name="college">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Query <span class="required" style="color:red;"> * </span></label>
                                    <input type="text"  class="form-control border-input UserName_field" name="query" required>
                                </div>
                            </div>
                        </div>
                       <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Addresss <span class="required" style="color:red;"> * </span></label>
                                    <textarea rows="4" type="text" class="form-control border-input UserName_field" name="address" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4" style="float:right">
                                <div class="form-group">
                                    <label>Followup Date <span class="required" style="color:red;"> * </span></label>
                                   <input  class="form-control border-input datepicker" type="date" name="followup_date"  required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Previous Reply</label>
                                    <input type="text"  class="form-control border-input UserName_field" name="repliedby" readonly>
                                </div>
                            </div>
                        </div>
                       <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>New Reply</label>
                                    <textarea rows="4" type="text" class="form-control border-input UserName_field" name="reply" ></textarea>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <center><button type="submit" class="btn btn-success" name="send">Send</button></center>
                    <button type="reset" class="btn btn-danger">Clear Form</button>	
                </div>
            </div>
        </div>
    </div>
</div>-->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                   <center> <button type="submit" class="btn btn-success" name="save">Save</button></center>
                    <button type="reset" class="btn btn-danger">Clear Form</button>	
                </div>
            </div>
<!--
             <div class="col-md-6">
                <div class="form-group">
                    <center><button type="submit" class="btn btn-success" name="send" disabled>Send</button></center>
                    <button type="reset" class="btn btn-danger">Clear Form</button>	
                </div>
            </div>
-->
        </div>
    </div>
</div>
<!--
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <center><button type="submit" class="btn btn-success" name="send">Send</button></center>
                    <button type="reset" class="btn btn-danger">Clear Form</button>	
                </div>
            </div>
        </div>
    </div>
</div>
-->
<?php echo form_close(); ?>
<?php include "footer.php";?>
<?php include "addModel.php"?>
<?php include "script_include.php"; ?>