<?php include "header.php";?>
<?php $page = 'three';include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>

<br><br>
<div class="content">
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
                                                <td>Title</td>
                                                <td>Reference</td>
                                                <td>Date</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td><a href="<?php echo site_url("Enquiry_cont/enquiryReply")?>">Enquiry for fees(10th std)</a></td>
                                                <td>advertisement</td>
                                                <td>02/08/2017</td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td><a>Enquiry for admi</a></td>
                                                <td>Friend</td>
                                                <td>07/08/2017</td>
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
    </div>
</div>
<?php include "footer.php";?>
<?php include "addModel.php";?>
<?php include "script_include.php";?>
<?php include "custom_script.php";?>