<?php include "header.php";?>
<?php $page = 'three';include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>

<br><br>
<?php if($this->session->flashdata('success')) { ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-right: 25px;"><span aria-hidden="true">&times;</span></button>
                  <h5><?php echo $this->session->flashdata('success'); ?></h5>
              </div>
        <?php } ?>
<div class="content">
    <div class="container-fluid">
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
    <br><br>
    <div class="container-fluid" style="margin-top:-50px;">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="col-1">
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                     <div class="row">
                                        <div class="col-md-4">
                                            <div class="col-md-12">
                                                <h3 class="text-uppercase">Enquiries &nbsp;  <?php echo "<small>Count: $totalResult</small>"; ?></h3>
                                            </div>
                                        </div>
                                         <div class="col-md-8">
                                             <h3>
                                                 <form action="<?php echo    site_url().'/Enquiry_cont/enquiry/'; ?>" method="GET">
                                                     <div class="input-group pull-right">
                                                         <input type="text" class="form-control"  placeholder="Search..." id="teachersearch"  name="enquiryFilter" value="<?php if (!empty($_GET['enquiryFilter'])) { echo $_GET['enquiryFilter'];
                                                             }
                                                             ?>">
                                                         <span class="input-group-btn">
                                                             <button type="submit" class="btn btn-success">Search</button>
                                                         </span>
                                                     </div>
                                                 </form>
                                             </h3>
                                         </div>
                                     </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="<?php echo    site_url().'/Enquiry_cont/enquiry/'; ?>" method="GET">
                                                  <div class="form-group">
                                                      <div class="col-md-3">
                                                          <div class="form-group">
                                                              <label>From <span class="required" style="color:red;"> * </span></label>
                                                              <input type="date" class="form-control border-input datepicker" name="todate" value="<?php if (!empty($_GET['todate'])) { echo $_GET['todate'];
                                                             }
                                                             ?>" required>
                                                          </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                          <div class="form-group">
                                                              <label>To<span class="required" style="color:red;"> * </span></label>
                                                              <input type="date" class="form-control border-input datepicker"  name="fromDate" value="<?php if (!empty($_GET['fromDate'])) { echo $_GET['fromDate'];
                                                             }
                                                             ?>" required>
                                                          </div>
                                                      </div>
                             
                                                      <div class="col-md-3">
                                                          <div class="form-group">
                                                              <label>Status <span class="required" style="color:red;"> * </span></label> 
                                                              <select name="statusSearch" class="form-control border-input" required>
                                                                  <?php if (!empty($_GET['statusSearch'])) { ?>
                                                                  <option value="<?php echo $_GET['statusSearch']; ?>"><?php echo $_GET['statusSearch']; ?></option>
                                                                  <?php
                                                                                                           }
                                                                  ?>
                                                                  <option value="">--Select Status--</option>
                                                                  <option value="followdate">FollowUp Date</option>
                                                                  <option value="enqdate">Enquiry Date</option>
                                                                  <option value="inprocess">Inprocess</option>
                                                                  <option value="joined">Joined</option>
                                                                  <option value="notjoined">Not Joined</option>
                                                              </select>
                               
                                                          </div>
                                                      </div>
                                                      
                                                      <div class="col-md-2">
                                                          <div class="form-group">
                                                              <button type="submit" class="btn btn-success style_btn" value="1" name="extraSearch">Filter</button>
                                                          </div>
                                                      </div> 
                                                      <div class="col-md-1">
                                                          <div class="form-group">
                                                              <button type="submit" class="btn btn-danger style_btn" value="1" name="">Reset</button>
                                                          </div>
                                                      </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" >
                                        <thead>
                                            <tr style="font-weight: bold;">
                                                <td>Sr No.</td>
                                                <td>ID.</td>
                                                <td>Subject</td>
                                                <td>Query</td>
                                                <td>Reference</td>
                                                <td>Followup Date</td>
                                                <td>Enquiry Date</td>
                                                <td>Status</td>
                                                <td>Modify</td>
                                                <td>Delete</td>
                                            </tr>
                                        </thead>
                                        <tbody><?php $i=$offset; foreach($result as $value):?>
                                            <tr>
                                                <td><?php $i++;echo $i;?></td>
                                                <td><?php echo $eid = $value->enquiry_ID;?></td>
                                                <td><a href="<?php echo site_url("Enquiry_cont/enquiryInfo/").$value->enquiry_ID;?>"><?php echo $value->subject;?></a></td>
                                                <td style="padding:10px"><?php echo $value->query;?></td>
                                                <td><?php echo $value->reference;?></td>
                                                <td><?php echo $value->followup_date;?></td>
                                                <td><?php echo $value->enq_date;?></td>
                                                <td>
                                                    <?php 
                                                    if($value->status == 'inprocess'){
                                                        echo "<font color='#d0b965'>".$value->status."</font>";
                                                    }else if($value->status == 'joined'){
                                                        echo "<font color='green'>".$value->status."</font>";
                                                    }else{
                                                        echo "<font color='red'>".$value->status."</font>";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo form_open('Enquiry_cont/updateEnquiry'); ?>
                                                    <div class="text-center">
                                                        <input type="hidden" value="<?php echo $eid; ?>" name="e_id" >
                                                        <center><button type="submit" class="btn btn-success">Edit</button></center>
                                                    </div>
                                                    <?php echo form_close(); ?>
                                                </td>
                                                <td>
                                                    <a title="" class="btn btn-danger change-project" href="javascript:;"  data-original-title="Are You sure want to delete ?" >Delete</a>        
                                                    <div class="hide" id="select-div">
                                                        <div class="clearfix col-sm-10" style="margin:8px 0;">
                                                        <?php echo form_open('Enquiry_cont/DeleteEnquiry'); ?>
                                                            <input type="hidden" value="<?php echo $eid; ?>" name="e_id">
                                                            <button type="submit" class="btn btn-danger" data-toggle="popover" >Yes</button>
                                                            <button type="button" class="btn btn-success btn-cancel-option">No</button>
                                                            <?php echo form_close(); ?>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr><?php endforeach;?>
                                        </tbody>
                                    </table>  
                                     <center>
                                      <ul class="pagination">
                                          <!-- Show pagination links -->
                                          <?php
                                          foreach ($links as $link) {
                                          
                                              echo "<li>" . $link . "</li>";
                                          }
                                          ?>
                                    </ul>
                                    </center>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php";?>
    <style> 
    input[id=teachersearch] {
    width: 5px;
    box-sizing: border-box;
    border: 1px solid #c5e2ea;;
    border-radius: 50px;
    font-size: 16px;
    background-color: white;
    background-image: url('<?php echo base_url()?>assets/icon/search.png');
    background-position: 11px 7px; 
    background-repeat: no-repeat;
    background-size: 21px;
    padding-left: 35px;
    }
    .style_btn{
        margin-top: 24px;
    }
</style>
<?php include "addModel.php";?>
<?php include "script_include.php";?>
<?php include "popover.php";?>