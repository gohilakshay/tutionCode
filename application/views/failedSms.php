<?php include_once "header.php";?>
<?php $page = 'two';include_once "sidebar.php";?>
<?php include_once "nav.php";?>
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
                        <center><a href="<?php echo site_url()."/Sms_cont/smsDetails" ?>"><button type="button" style="border-radius:10px; color:black; border-color: #51d8dc; background-color:#51d8dc; padding:11px; padding-left:80px; padding-right:80px;" class="btn btn-primary btn-lg">Total<br><?php echo $total; ?></button></a>&emsp;
                            <a href="<?php echo site_url()."/Sms_cont/successSms" ?>"> <button type="button" style="border-radius:10px; color:black; border-color: #7ac29a; background-color:#7ac29a; padding:11px; padding-left:70px; padding-right:70px;" class="btn btn-success btn-lg">Success<br><?php echo $sent;?></button></a>&emsp;
                            <a href="<?php echo site_url()."/Sms_cont/failesSms" ?>"><button type="button" style="border-radius:10px; color:black; border-color: #e44554; background-color:#e44554; padding:11px; padding-left:80px; padding-right:80px;" class="btn btn-danger btn-lg">Failed<br><?php echo $failed;?></button></a>&emsp;
                        <a href="<?php echo site_url()."/Sms_cont/sendSMS/1" ?>"><button type="button" style="border-radius:10px; color:black; border-color: #f3de26; background-color:#f3de26; padding:11px; padding-left:80px; padding-right:80px;" class="btn btn-danger btn-lg">Send<br>SMS</button></a></center>
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
                                                        <label>To :&emsp;</label><input type="date" name="to" value="<?php if(isset($_POST['to'])){echo $_POST['to'];} ?>">
                                                        <label>From :&emsp;</label><input type="date" name="from" value="<?php if(isset($_POST['from'])){echo $_POST['from'];} ?>">
                                                        <button type="submit" class="btn btn-success"> Search</button>
                                                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                                        <?php echo form_close();?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <?php foreach($result as $value):
                                            if($value->status != 'sent'){
                                                if($value->bulkID != NULL){
                                                    foreach($bulksms as $bulksmsDetails){
                                                        if($bulksmsDetails->sms_ID==$value->bulkID){
                                                        
                                            ?>
                                            <tr>
                                                <td><i class="ti-user"></i>&nbsp;<?php echo "<strong>".$bulksmsDetails->cont_name."</strong>&emsp;(Bulk sms)"; ?>&emsp;<?php echo $scontact[$i]; ?>
                                                  <span style="float:right;">
                                                      &emsp;&emsp;
                                                      <i class="ti-timer"></i>
                                                      <?php echo $bulksmsDetails->time;?>&emsp;&emsp;<?php echo $bulksmsDetails->date;?></span>  
                                                    <br>
                                                    &emsp;&nbsp;<i class="ti-email"></i>&nbsp;<?php echo $bulksmsDetails->message?>
                                                </td>
                                            </tr>
                                            <?php
                                                        }
                                                    }
                                                
                                                }
                                            else if($value->teacher_name != NULL){
                                                ?>
                                            <tr>
                                                <td><i class="ti-user"></i>&nbsp;<?php echo "<strong>".$value->teacher_name."</strong>&emsp;(Faculty sms)"; ?>&emsp;<?php echo $scontact[$i]; ?>
                                                  <span style="float:right;">
                                                     &emsp;&emsp;
                                                      <i class="ti-timer"></i>
                                                      <?php echo $value->time;?>&emsp;&emsp;<?php echo $value->date;?></span>  
                                                    <br>
                                                    &emsp;&nbsp;<i class="ti-email"></i>&nbsp;<?php echo $value->message?>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            
                                            else{
                                            ?>
                                            <tr>
                                                <?php $sname = explode(",",$value->student_name);
                                                 $scontact = explode(",",$value->student_contact);
                                                $n = count($scontact);
                                                for($i=0;$i<$n;$i++){
                                                ?>
                                                
                                                <td><i class="ti-user"></i>&nbsp;<?php echo "<strong>".$sname[$i]."</strong>&emsp;(Student sms)"; ?>&emsp;<?php echo $scontact[$i]; ?>
                                                  <span style="float:right;">
                                                      <b>BATCH NAME -> <?php $b = explode(",",$value->batch);echo $b[1]; ?></b>&emsp;&emsp;
                                                      <i class="ti-timer"></i>
                                                      <?php echo $value->time;?>&emsp;&emsp;<?php echo $value->date;?></span>  
                                                    <br>
                                                    &emsp;&nbsp;<i class="ti-email"></i>&nbsp;<?php echo $value->message?>
                                                </td>
                                            </tr>
                                            <?php }}}endforeach;?>
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
<?php include_once "footer.php";?>
<?php include_once "addModel.php"?>
<?php include_once "script_include.php"; ?>