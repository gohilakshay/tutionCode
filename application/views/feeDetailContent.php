<?php 
    $stud = $result['stud'];
    $fee = $result['fee'];
    $table = $result['table'];
?>
<?php if($table==3){?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <a href="<?php echo site_url()."/Student_cont/feeDetail/1" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; color:black; padding:11px; padding-left:27px; padding-right:27px;" class="btn btn-primary btn-lg">OutStanding</button></a>
                <a href="<?php echo site_url()."/Student_cont/feeDetail/2" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; color:black;" class="btn btn-primary btn-lg">OverDue</button></a>
                <a href="<?php echo site_url()."/Student_cont/feeDetail/3" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:black; color:black;" class="btn btn-primary btn-lg">OverAll</button></a>
                <a href="<?php echo site_url()."/Student_cont/feeDetail/4" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; color:black;" class="btn btn-primary btn-lg">Recieved</button></a>
                <a href="<?php echo site_url()."/Student_cont/feeDetail/5" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; color:black;" class="btn btn-primary btn-lg">ServiceTax</button></a>
                <a href="<?php echo site_url()."/Student_cont/feeDetail/6" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; color:black;" class="btn btn-primary btn-lg">Uncleared</button></a>
                <a href="<?php echo site_url()."/Student_cont/feeDetail/7" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; color:black;" class="btn btn-primary btn-lg">Discount</button></a>
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
                                                <td>Paid Fees</td>
                                                <td>UNcleared</td>
                                                <td>Balance</td>
                                            </tr>
                                        </thead><?php foreach($fee as $value1): ?>
                                        <tbody><?php $i=1; foreach($stud as $value): ?>
                                            <tr>
                                                <td><?php echo $i;$i++; ?></td>
                                                <td><?php echo $value->admission_date;?></td>
                                                <td><?php echo $value->stud_name;?></td>
                                                <td><?php echo $value->standard_name;?></td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" ><?php echo $value1->final_fee;?></td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" ><?php echo $value1->recieved_fee;?></td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" >0</td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" ><?php echo $value1->balance_fee;?></td>
                                               
                                            </tr>
                                            <?php endforeach;?><?php break;?>
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
                <a href="<?php echo site_url()."/Student_cont/feeDetail/1" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:black;; color:black; padding:11px; padding-left:27px; padding-right:27px;" class="btn btn-primary btn-lg">OutStanding</button></a>
                <a href="<?php echo site_url()."/Student_cont/feeDetail/2" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; color:black;" class="btn btn-primary btn-lg">OverDue</button></a>
                <a href="<?php echo site_url()."/Student_cont/feeDetail/3" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb; color:black;" class="btn btn-primary btn-lg">OverAll</button></a>
                <a href="<?php echo site_url()."/Student_cont/feeDetail/4" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; color:black;" class="btn btn-primary btn-lg">Recieved</button></a>
                <a href="<?php echo site_url()."/Student_cont/feeDetail/5" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; color:black;" class="btn btn-primary btn-lg">ServiceTax</button></a>
                <a href="<?php echo site_url()."/Student_cont/feeDetail/6" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; color:black;" class="btn btn-primary btn-lg">Uncleared</button></a>
                <a href="<?php echo site_url()."/Student_cont/feeDetail/7" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb;; border-color:#b7ddfb;; color:black;" class="btn btn-primary btn-lg">Discount</button></a>
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
                                                <td>Paid Fees</td>
                                                <td>UNcleared</td>
                                                <td>Balance</td>
                                            </tr>
                                        </thead><?php foreach($fee as $value1): ?>
                                        <tbody><?php $i=1; foreach($stud as $value): ?>
                                            <tr>
                                                <td><?php echo $i;$i++; ?></td>
                                                <td><?php echo $value->admission_date;?></td>
                                                <td><?php echo $value->stud_name;?></td>
                                                <td><?php echo $value->standard_name;?></td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" ><?php echo $value1->final_fee;?></td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" ><?php echo $value1->recieved_fee;?></td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" >0</td>
                                                <td><img src="<?php echo base_url()."/assets/icon/rupee.png"?>" ><?php echo $value1->balance_fee;?></td>
                                               
                                            </tr>
                                            <?php endforeach;?><?php break;?>
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
