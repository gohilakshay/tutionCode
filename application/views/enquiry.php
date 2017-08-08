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
                                        <tbody><?php $i=1; foreach($result as $value):?>
                                            <tr>
                                                <td><?php echo $i;$i++;?></td>
                                                <td><a href="<?php echo site_url("Enquiry_cont/enquiryReply/").$value->enquiry_ID;?>"><?php echo $value->subject;?></a></td>
                                                <td><?php echo $value->reference;?></td>
                                                <td><?php echo $value->date;?></td>
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