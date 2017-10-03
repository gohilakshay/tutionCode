<?php include "header.php";?>
<?php $page = 'three';include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>

<br><br>
<div class="content">
    <div class="container-fluid">
        <a href="<?php echo site_url("Enquiry_cont/enquiry") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
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
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <h3 class="text-uppercase">Enquiries</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" >
                                        <thead>
                                            <tr style="font-weight: bold;">
                                                <td>Sr No.</td>
                                                <td>ID.</td>
                                                <td>Title</td>
                                                <td>Reference</td>
                                                <td>Followup Date</td>
                                                <td>Enquiry Date</td>
                                                <td>Modify</td>
                                                <td>Delete</td>
                                            </tr>
                                        </thead>
                                        <tbody><?php $i=1; foreach($result as $value):?>
                                            <tr>
                                                <td><?php echo $i;$i++;?></td>
                                                <td><?php echo $eid = $value->enquiry_ID;?></td>
                                                <td><a href="<?php echo site_url("Enquiry_cont/enquiryInfo/").$value->enquiry_ID;?>"><?php echo $value->subject;?></a></td>
                                                <td><?php echo $value->reference;?></td>
                                                <td><?php echo $value->followup_date;?></td>
                                                <td><?php echo $value->enq_date;?></td>
                                                <td>
                                                        <?php echo form_open('Enquiry_cont/updateBatches'); ?>
                                                            <div class="text-center">
                                                                <input type="hidden" value="<?php echo $eid; ?>" name="e_id" >
                                                                <center><button type="submit" class="btn btn-success">Edit</button></center>
                                                            </div>
                                                        <?php echo form_close(); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo form_open('Enquiry_cont/DeleteEnquiry'); ?>
                                                        <input type="hidden" value="<?php echo $eid; ?>" name="e_id" >
                                                        <center><button type="delete" class="btn btn-danger">Delete</button></center>
                                                        <?php echo form_close(); ?>
                                                    </td>
                                            </tr><?php endforeach;?>
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
<?php include "footer.php";?>
<?php include "addModel.php";?>
<?php include "script_include.php";?>