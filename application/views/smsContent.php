<?php 
$total = count($result);
$sent = 0;
$failed = 0;
foreach($result as $value){
    if($value->status == 'sent'){
        $sent++;
    }
    else $failed++;
}?>
<div class="content">
    <div class="container-fluid">
        <!--<div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                    <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;     border-color: #9fcedc;">
                        <h3 class="text-uppercase" style="margin-top: 10px;">Student</h3>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <center><button type="button" style="border-radius:10px; color:black; border-color: #51d8dc; background-color:#51d8dc; padding:11px; padding-left:80px; padding-right:80px;" class="btn btn-primary btn-lg">Total<br><?php echo $total; ?></button>&emsp;
                        <button type="button" style="border-radius:10px; color:black; border-color: #7ac29a; background-color:#7ac29a; padding:11px; padding-left:70px; padding-right:70px;" class="btn btn-success btn-lg">Success<br><?php echo $sent;?></button>&emsp;
                        <button type="button" style="border-radius:10px; color:black; border-color: #e44554; background-color:#e44554; padding:11px; padding-left:80px; padding-right:80px;" class="btn btn-danger btn-lg">Failed<br><?php echo $failed;?></button>&emsp;
                        <a href="<?php echo site_url()."/Sms_cont/sendSMS" ?>"><button type="button" style="border-radius:10px; color:black; border-color: #f3de26; background-color:#f3de26; padding:11px; padding-left:80px; padding-right:80px;" class="btn btn-danger btn-lg">Send<br>SMS</button></a></center>
                    </div>
                </div><br>
                <div class="row">
                    <div class="card">
                        <div class="col-1">
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <h3 class="text-uppercase">SMS Details</h3>
                                            </div>
                                            <!--<form name="search">
                                                <div class="col-md-8" style="margin-top:-2px;">
                                                    <h3>
                                                        <input type="text" id="smssearch" name="smssearch" placeholder="Search..." style="width: 80%;" required> 
                                                        </h3>
                                                </div>
                                            </form>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" >
                                        <thead>
                                            <tr style="font-weight: bold;">
                                                <td><?php echo date("F j, Y");  ?>
                                                    <div class="pull-right"><?php echo form_open('Sms_cont/filterDate'); ?>
                                                        <label>To :&emsp;</label><input type="date" name="to">
                                                        <label>From :&emsp;</label><input type="date" name="from">
                                                        <button type="submit"> Search</button>
                                                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                                        <?php echo form_close();?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($result as $value):?>
                                            <tr>
                                                <?php $sname = explode(",",$value->student_name);
                                                 $scontact = explode(",",$value->student_contact);
                                                $n = count($scontact);
                                                for($i=0;$i<$n;$i++){
                                                ?>
                                                
                                                <td><i class="ti-email"></i>&emsp;<?php echo $sname[$i]; ?>&emsp;<?php echo $scontact[$i]; ?>
                                                  <span style="float:right;">
                                                      <b>BATCH NAME -> <?php $b = explode(",",$value->batch);echo $b[1]; ?></b>&emsp;&emsp;
                                                      <i class="ti-timer"></i>
                                                      <?php echo $value->time;?>&emsp;&emsp;<?php echo $value->date;?></span>  
                                                    <br>
                                                    &emsp;&emsp;&emsp;&emsp;<?php echo $value->message?>
                                                </td>
                                            </tr>
                                            <?php }endforeach;?>
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
<style> 
input[id=smssearch] {
    width: 5px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 50px;
    font-size: 16px;
    background-color: white;
    background-image: url('<?php echo base_url()?>assets/icon/search.png');
    background-position: 7px 1px; 
    background-repeat: no-repeat;
    background-size: 21px;
    padding-left: 35px;
}

input[id=smssearch]:focus {
    width: 80%;
}
</style>