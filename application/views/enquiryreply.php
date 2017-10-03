<?php include "header.php";?>
<?php $page = 'three';include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>
<?php echo form_open('Enquiry_cont/enquirySend'); ?>
<br>
<?php foreach($result as $value):?>
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
                                        <option style="color:#ffbc00" value="inprocess">In Process</option>
                                        <option style="color:green" value="joined">Joined</option>
                                        <option style="color:red" value="notjoined">Not Joined</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" style="float:right">
                                <div class="form-group">
                                    <label>Enquiry Date</label>
                                   <input  class="form-control " type="date" name="enq_date" value="<?php echo date('Y-m-d')?>" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control border-input" name="enquirename" value="<?php echo $value->name; ?>" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Gender</label><br>
                                     <input type="radio" name="gender" value="male" checked> Male
                                    <input type="radio" name="gender" value="female"> Female
                                </div>   
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>EmailID</label>
                                    <input type="email" class="form-control border-input" name="email" value="<?php echo $value->senderEmail; ?>" >
                                </div>   
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control border-input" name="mobile" value="<?php echo $value->mobile; ?>"  >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control border-input" name="subject" value="<?php echo $value->subject; ?>" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fees Told / Asked</label>
                                    <input type="text" class="form-control border-input" name="fees" value="<?php echo $value->reference; ?>" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Reference</label>
                                    <input type="text" class="form-control border-input" name="reference" value="<?php echo $value->reference; ?>" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>College</label>
                                    <input type="text" class="form-control border-input" name="college" value="<?php if(isset($_POST['college'])){echo $_POST['college'];} ?>" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Query</label>
                                    <input type="text"  class="form-control border-input" name="query" value="<?php echo $value->query; ?>" >
                                </div>
                            </div>
                        </div>
                       <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Addresss</label>
                                    <textarea rows="4" type="text" class="form-control border-input" name="address" value="<?php if(isset($_POST['address'])){echo $_POST['address'];} ?>" required></textarea>
                                    <?php echo form_error('address', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4" style="float:right">
                                <div class="form-group">
                                    <label>Followup Date</label>
                                   <input  class="form-control border-input" type="date" name="followup_date"   />
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
</div><?php endforeach;?>
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