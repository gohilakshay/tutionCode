<?php 
    $stud = $result['stud'];
    $fee = $result['fee'];
    $table = $result['table'];
?>
<?php if($table==3){?>
<div class="content">
    <div class="container-fluid">
         <?php if($this->session->flashdata('success')) { ?>
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-right:25px;"><span aria-hidden="true">&times;</span></button>
            <h5><?php echo $this->session->flashdata('success'); ?></h5>
        </div>
        <?php } ?>
        <div class="row">
            <div class="col-lg-12 col-sm-12">
               <center>
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/1" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; margin-bottom:10px; color:black; padding:11px; padding-left:10px; padding-right:10px;" class="btn btn-primary btn-lg">OutStanding</button></a>
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/2" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">OverDue</button></a>
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/3" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:black; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">OverAll</button></a>
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/4" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">Recieved</button></a>
                    
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/6" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">Discount</button></a>
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/7" ?>"> <button type="button" style="border-radius:10px; background-color:chartreuse;; border-color:chartreuse;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">Payment</button></a>
                </center>
            </div>
        </div>
        <br>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="col-1">
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden" style="overflow:auto;">
                                <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3 class="text-uppercase">OverAll Test</h3>
                                        </div>
                                        <div class="col-md-5">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" >
                                        <thead>
                                            <tr style="font-weight: bold;">
                                                <td>Sr No.</td>
                                                <td>Admission Date</td>
                                                <td>Student Name</td>
                                                <td>Standard</td>
                                                <td>Total Fees </td>
                                                <td>Discount Fees </td>
                                                <td>Final Fees </td>
                                                <td>Paid Fees</td>
                                                <td>Uncleared</td>
                                                <td>Balance</td>  
                                                <td>Payment</td>
                                            </tr>
                                            
                                        </thead><?php foreach($fee as $value1): ?>
                                        <tbody><?php $i=1; foreach($stud as $value): ?>
                                            <tr>
                                                <?php if($value1->stud_id == $value->stud_ID):?>
                                                <td><?php echo $i;$i++; ?></td>
                                                <td><?php echo $value->admission_date;?></td>
                                                <td><?php echo $value->stud_name;?></td>
                                                <td><?php echo $value->standard_name;?></td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" ><?php echo $value1->total_fee;?></td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" ><?php echo $value1->discount;?></td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" ><?php echo $value1->final_fee;?></td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" ><?php echo $value1->recieved_fee;?></td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" >0</td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" ><?php echo $value1->balance_fee;?></td>
                                                <td>
                                                   <?php echo form_open('Student_cont/feeDetail/7'); ?>
                                                        <input type="hidden" name="id" value="<?php echo $value->stud_ID;?>" />
                                                        <input type="hidden" name="name" value="<?php echo $value->stud_name;?>" />
                                                        <input type="hidden" name="bal" value="<?php echo $value1->balance_fee;?>" />
                                                        <input type="hidden" name="paid" value="<?php echo $value1->recieved_fee;?>" />
                                                        <input type="hidden" name="final" value="<?php echo $value1->final_fee;?>" />
                                                        <input type="hidden" name="discount" value="<?php echo $value1->discount;?>" />
                                                        <input type="submit" id="myBtn" class="btn btn-success" value="Pay">
                                                    <?php echo form_close(); ?>
                                                </td>
                                               <?php endif;?>
                                            </tr>
                                            <?php $i++;endforeach; ?>
                                        </tbody><?php endforeach;?>
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
<?php }?>
<?php if($table==1){?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
               <center>
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/1" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:black;; margin-bottom:10px; color:black; padding:11px; padding-left:27px; padding-right:27px;" class="btn btn-primary btn-lg">OutStanding</button></a> 
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/2" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">OverDue</button></a> 
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/3" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">OverAll</button></a> 
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/4" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">Recieved</button></a> 
                     
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/6" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">Discount</button></a>
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/7" ?>"> <button type="button" style="border-radius:10px; background-color:chartreuse;; border-color:chartreuse;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">Payment</button></a>
                </center>
            </div>
        </div>
        <br>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="col-1">
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3 class="text-uppercase">OutStanding</h3>
                                        </div>
                                        <div class="col-md-5">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" >
                                        <thead>
                                            <tr style="font-weight: bold;">
                                                <td>Sr No.</td>
                                                <td>Admission Date</td>
                                                <td>Student Name</td>
                                                <td>Standard</td>
                                                <td>Total Fees </td>
                                                <td>Final Fees </td>
                                                <td>Outstanding Fees</td>
                                            </tr>
                                        </thead><?php foreach($fee as $value1): ?>
                                        <tbody><?php $i=1; foreach($stud as $value): ?>
                                            <tr>
                                                <?php if($value1->stud_id == $value->stud_ID):?>
                                                <td><?php echo $i;$i++; ?></td>
                                                <td><?php echo $value->admission_date;?></td>
                                                <td><?php echo $value->stud_name;?></td>
                                                <td><?php echo $value->standard_name;?></td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" ><?php echo $value1->total_fee;?></td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" ><?php echo $value1->final_fee;?></td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" ><?php echo $value1->balance_fee;?></td>
                                               <?php endif;?>
                                            </tr>
                                            <?php $i++;endforeach;?>
                                        </tbody><?php endforeach;?>
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
<?php }?>
<?php if($table==2){?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
               <center>
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/1" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; margin-bottom:10px; color:black; padding:11px; padding-left:27px; padding-right:27px;" class="btn btn-primary btn-lg">OutStanding</button></a> 
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/2" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:black;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">OverDue</button></a> 
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/3" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">OverAll</button></a> 
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/4" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">Recieved</button></a> 
                     
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/6" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">Discount</button></a> 
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/7" ?>"> <button type="button" style="border-radius:10px; background-color:chartreuse;; border-color:chartreuse;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">Payment</button></a>
                </center>
            </div>
        </div>
        <br>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="col-1">
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3 class="text-uppercase">OverDue</h3>
                                        </div>
                                        <div class="col-md-5">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" >
                                        <thead>
                                            <tr style="font-weight: bold;">
                                                <td>Sr No.</td>
                                                <td>Admission Date</td>
                                                <td>Student Name</td>
                                                <td>Standard</td>
                                                <td>Total Fees </td>
                                                <td>Over Due Fees</td>
                                            </tr>
                                        </thead><?php foreach($fee as $value1): ?>
                                        <tbody><?php $i=1; foreach($stud as $value): ?>
                                            <tr>
                                                <?php if($value1->stud_id == $value->stud_ID):?>
                                                <td><?php echo $i;$i++; ?></td>
                                                <td><?php echo $value->admission_date;?></td>
                                                <td><?php echo $value->stud_name;?></td>
                                                <td><?php echo $value->standard_name;?></td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" ><?php echo $value1->final_fee;?></td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" ><?php echo $value1->recieved_fee;?></td>
                                                <?php endif;?>
                                            </tr>
                                            <?php $i++;endforeach;?>
                                        </tbody><?php endforeach;?>
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
<?php }?>
<?php if($table==4){?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
               <center>
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/1" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; margin-bottom:10px; color:black; padding:11px; padding-left:27px; padding-right:27px;" class="btn btn-primary btn-lg">OutStanding</button></a> 
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/2" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">OverDue</button></a> 
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/3" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">OverAll</button></a> 
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/4" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:black;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">Recieved</button></a> 
                     
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/6" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">Discount</button></a> 
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/7" ?>"> <button type="button" style="border-radius:10px; background-color:chartreuse;; border-color:chartreuse;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">Payment</button></a>
                </center>
            </div>
        </div>
        <br>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="col-1">
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3 class="text-uppercase">Recieved</h3>
                                        </div>
                                        <div class="col-md-5">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" >
                                        <thead>
                                            <tr style="font-weight: bold;">
                                                <td>Sr No.</td>
                                                <td>Admission Date</td>
                                                <td>Student Name</td>
                                                <td>Standard</td>
                                                <td>Total Fees </td>
                                                <td>Final Fees </td>
                                                <td>Recieved Fees</td>
                                            </tr>
                                        </thead><?php foreach($fee as $value1): ?>
                                        <tbody><?php $i=1; foreach($stud as $value): ?>
                                            <tr>
                                                <?php if($value1->stud_id == $value->stud_ID):?>
                                                <td><?php echo $i;$i++; ?></td>
                                                <td><?php echo $value->admission_date;?></td>
                                                <td><?php echo $value->stud_name;?></td>
                                                <td><?php echo $value->standard_name;?></td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" ><?php echo $value1->total_fee;?></td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" ><?php echo $value1->final_fee;?></td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" ><?php echo $value1->recieved_fee;?></td>
                                                <?php endif; ?>
                                            </tr>
                                            <?php $i++;endforeach;?>
                                        </tbody><?php endforeach;?>
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
<?php }?>

<?php if($table==6){?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
               <center>
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/1" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; margin-bottom:10px; color:black; padding:11px; padding-left:27px; padding-right:27px;" class="btn btn-primary btn-lg">OutStanding</button></a> 
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/2" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">OverDue</button></a> 
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/3" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">OverAll</button></a> 
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/4" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">Recieved</button></a> 
                     
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/6" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:black;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">Discount</button></a> 
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/7" ?>"> <button type="button" style="border-radius:10px; background-color:chartreuse;; border-color:chartreuse;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">Payment</button></a>
                </center>
            </div>
        </div>
        <br>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="col-1">
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3 class="text-uppercase">Discount</h3>
                                        </div>
                                        <div class="col-md-5">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" >
                                        <thead>
                                            <tr style="font-weight: bold;">
                                                <td>Sr No.</td>
                                                <td>Admission Date</td>
                                                <td>Student Name</td>
                                                <td>Standard</td>
                                                <td>Total Fees </td>
                                                <td>Discount</td>
                                                <td>Final Fees</td>
                                            </tr>
                                        </thead><?php foreach($fee as $value1): ?>
                                        <tbody><?php $i=1; foreach($stud as $value): ?>
                                            <tr>
                                                <?php if($value1->stud_id == $value->stud_ID):?>
                                                <td><?php echo $i;$i++; ?></td>
                                                <td><?php echo $value->admission_date;?></td>
                                                <td><?php echo $value->stud_name;?></td>
                                                <td><?php echo $value->standard_name;?></td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" ><?php echo $value1->total_fee;?></td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" ><?php echo $value1->discount;?></td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" ><?php echo $value1->final_fee;?></td>
                                                <?php endif;?>
                                            </tr>
                                            <?php $i++;endforeach;?>
                                        </tbody><?php endforeach;?>
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
<?php }?>
<?php if($table==7){?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
               <center>
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/1" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; margin-bottom:10px; color:black; padding:11px; padding-left:27px; padding-right:27px;" class="btn btn-primary btn-lg">OutStanding</button></a> 
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/2" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">OverDue</button></a> 
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/3" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">OverAll</button></a> 
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/4" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">Recieved</button></a> 
                     
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/6" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">Discount</button></a> 
                   <a href="<?php echo site_url()."/Student_cont/feeDetail/7" ?>"> <button type="button" style="border-radius:10px; background-color:chartreuse;; border-color:black;; margin-bottom:10px; color:black;" class="btn btn-primary btn-lg">Payment</button></a>
                </center>
            </div>
        </div>
        <br>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Payment Status</h4>
                        </div>

                         <div class="content">
                <?php echo form_open('Student_cont/Payfee'); ?>
                 <!--  <input type="hidden" value="<?php echo $student_data->stud_ID; ?>" name="stud_id" >-->
                <div class="row" >                        
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-group">
                            <label>Student ID</label>
                            <input type="text" class="form-control border-input"  name="studentid" value="<?php echo $_POST['id']; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-group">
                            <label>Student Name</label>
                            <input type="text" id="StnameStud" class="form-control border-input" name="studentname" value="<?php echo $_POST['name']; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-2">
                        <div class="form-group">
                            <label>Final Fees</label>
                            <input type="text" class="form-control border-input" id="answer" name="final_fees" value="<?php echo $_POST['final']; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Discount Fees</label>
                            <input type="text" class="form-control border-input" name="discount_fees" value="<?php echo $_POST['discount']; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-2">
                        <div class="form-group">
                            <label>Paid Fees</label>
                            <input type="text" class="form-control border-input" id="Received" name="paid_fees" value="<?php echo $_POST['paid']; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4 ">
                        <div class="form-group">
                            <label>Balance</label>
                            <input type="text" id="balModal"  class="form-control border-input" name="balance_fee" value="<?php echo $_POST['bal']; ?>" readonly>
                        </div>
                    </div>
                </div>
                             <div class="row">
                    <div class="col-sm-4 col-sm-offset-2">
                        <div class="form-group">
                            <label>Payment Mode</label>
                            <select  class="form-control border-input" id="payMode" name="paymentmode" required>
                                <option value="">Payment Mode</option>
                                <option value="cash">Cash</option>
                                <option value="cheque">Cheque</option>
                                <option value="credit">Credit Card</option>
                                <option value="debit">Debit Card</option>
                                <option value="netbanking">Net Banking</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Payment Date</label>
                            <input type="date" class="form-control border-input datepicker" value="<?php echo date('Y-m-d'); ?>" id="dateRecp" name="paydate" />
                        </div>
                    </div>
                </div>
                <div class="row" id="chqDetail" style="display:none;">
                    <div class="col-sm-3 col-sm-offset-2">
                        <div class="form-group">
                            <label>Cheque Date.</label>
                            <input type="date" id="chqDate" class="form-control border-input datepicker" name="chq_date" >
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Bank Name</label>
                            <input type="text" id="bankName" class="form-control border-input" name="bank_name" >
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Cheque No.</label>
                            <input type="text" id="chqNo" class="form-control border-input" name="chq_no" >
                        </div>
                    </div>
                </div>
                <div class="row" id="transcDetail" style="display:none">
                    <div class="col-sm-2 col-sm-offset-2">
                        <div class="form-group">
                            <label>Transaction ID</label>
                            <input type="text" class="form-control border-input" id="tranId" name="transc_id" >
                        </div>
                    </div>
               </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" id="Amtmodal" class="form-control border-input phoneInput" name="amount" value="" >
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" onclick="myFp()" class="btn btn-info btn-fill btn-wd">Submit</button>
                </div>
                <div class="clearfix"></div>
                <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>


  
  