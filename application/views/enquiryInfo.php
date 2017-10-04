<?php include "header.php";?>
<?php $page = 'three';include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>
<?php echo form_open('Enquiry_cont/updateEnquiry'); ?>
<br>
<?php $enquiryDetail = $result[0];?>
<div class="content">
    <div class="container-fluid">
        <?php if($this->session->flashdata('success')) { ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-right: 25px;"><span aria-hidden="true">&times;</span></button>
                  <h5><?php echo $this->session->flashdata('success'); ?></h5>
              </div>
        <?php } ?>
        <div class="row">
            <div class="col-lg-offset-2 col-md-8 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Status</label>
                                   <select name="status" class="form-control border-input"  >
                                       <option value="<?php echo $enquiryDetail->status; ?>"><?php echo $enquiryDetail->status; ?></option>
                                        <option style="color:#ffbc00" value="inprocess">In Process</option>
                                        <option style="color:green" value="joined">Joined</option>
                                        <option style="color:red" value="notjoined">Not Joined</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" style="float:right">
                                <div class="form-group">
                                    <label>Enquiry Date</label>
                                   <input  class="form-control " type="date" name="enq_date" value="<?php echo $enquiryDetail->enq_date; ?>" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control border-input" name="enquirename" value="<?php echo $enquiryDetail->name; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Gender</label><br>
                                    <?php  if($enquiryDetail->gender == 'male'){?>
                                     <input type="radio" name="gender" value="male" checked> Male
                                    <input type="radio" name="gender" value="female" > Female
                                    <?php }else{ ?>
                                    <input type="radio" name="gender" value="male" > Male
                                    <input type="radio" name="gender" value="female" checked> Female
                                    <?php } ?>
                                </div>   
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>EmailID</label>
                                    <input type="email" class="form-control border-input" name="email"
                                           value="<?php echo $enquiryDetail->senderEmail; ?>">
                                </div>   
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control border-input" name="mobile"
                                           value="<?php echo $enquiryDetail->mobile; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control border-input" name="subject"
                                           value="<?php echo $enquiryDetail->subject; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fees Told / Asked</label>
                                    <input type="text" class="form-control border-input" name="fees"
                                           value="<?php echo $enquiryDetail->fees; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Reference</label>
                                    <input type="text" class="form-control border-input" name="reference" value="<?php echo $enquiryDetail->reference; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>College</label>
                                    <input type="text" class="form-control border-input" name="college"
                                           value="<?php echo $enquiryDetail->college; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Query</label>
                                    <input type="text"  class="form-control border-input" name="query"
                                           value="<?php echo $enquiryDetail->query; ?>">
                                </div>
                            </div>
                        </div>
                       <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Addresss</label>
                                    <textarea rows="4" type="text" class="form-control border-input" name="address" required><?php echo $enquiryDetail->address; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4" style="float:right">
                                <div class="form-group">
                                    <label>Followup Date</label>
                                   <input  class="form-control border-input" type="date" name="followup_date" value="<?php echo $enquiryDetail->followup_date;  ?>"  />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Reply By</label>
                                    <input type="text"  class="form-control border-input" name="repliedby" value="<?php echo $enquiryDetail->repledBy; ?>">
                                </div>
                            </div>
                        </div>
                       <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Reply</label>
                                    <textarea rows="4" type="text" class="form-control border-input" name="reply" ><?php echo $enquiryDetail->reply; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                </div>
            </div>
            <input type="hidden" value="<?php echo $enquiryDetail->enquiry_ID; ?>" name="e_id" >
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
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
            <div class="form-group">
                <center><button type="submit" class="btn btn-success" name="edit">Edit</button></center> </div>
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