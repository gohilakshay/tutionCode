<div class="content"><?php  $button= end($result);  ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                    <ul><a href="<?php echo site_url()."/Sms_cont/sendSMS/1" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb; <?php if($button == 1){echo 'border-color:black;';}else{ echo 'border-color: #b7ddfb;';}?> color:black; padding:11px; padding-left:15px; padding-right:15px;" class="btn btn-primary btn-lg">Students</button></a>&emsp;
                    <a href="<?php echo site_url()."/Sms_cont/sendSMS/2" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb; <?php if($button == 2){echo 'border-color:black;';}else{echo 'border-color: #b7ddfb;';}?> color:black; padding:11px; padding-left:15px; padding-right:15px;" class="btn btn-primary btn-lg">Faculties</button></a>&emsp;
                    <a href="<?php echo site_url()."/Sms_cont/sendSMS/3" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb; <?php if($button == 3){echo 'border-color:black;';}else{echo 'border-color: #b7ddfb;';}?> color:black; padding:11px; padding-left:15px; padding-right:15px;" class="btn btn-primary btn-lg">Bulk SMS</button></a>&emsp;
                    <a href="<?php echo site_url()."/Sms_cont/sendSMS/4" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb; <?php if($button == 4){echo 'border-color:black;';}else{echo 'border-color: #b7ddfb;';}?> color:black; padding:11px; padding-left:15px; padding-right:15px;" class="btn btn-primary btn-lg">Subscriber List</button></a>&emsp;
                    <a href="<?php echo site_url()."/Sms_cont/sendSMS/5" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb; <?php if($button == 5){echo 'border-color:black;';}else{echo 'border-color: #b7ddfb;';}?> color:black; padding:11px; padding-left:15px; padding-right:15px;" class="btn btn-primary btn-lg">Enquiry</button></a>&emsp;
                </ul>
            </div>
        </div>
        <!--first button start-->
        <?php if($button==1){ ?>
        <?php echo form_open('Sms_cont/sendSMS/1'); ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="col-1">
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <select class="form-control border-input" id="batch" name="batch" required>
                                                    <option value=" <?php if(isset($_POST['batch1'])){echo $_POST['batch'];} ?>"><?php         if(isset($_POST['batch1'])){echo $_POST['batch'];}else echo '----Select Batch----'; ?></option>
                                                    <?php foreach($result as $value):?>
                                                    <option value="<?php echo $value->batch_ID.','.$value->batch_name; ?>"><?php echo $value->batch_name; ?></option>
                                                    <?php endforeach;?>
                                                </select>
                                                <?php echo form_error('batch', '<div class="alert alert-danger contact-warning">', '</div>');?> 
                                            </div>
                                            <div class="col-md-1">
                                                <button type="submit" class="btn btn-success" style="margin-left:-15px;" name="batch1">Enter</button>
                                            </div><?php echo form_close();?>
                                            <div class="col-md-5">
                                                <input type="text" id="studentsearch" name="studentsearch" placeholder="Search..." style="width:100%; margin-top:5px;" >
                                            </div>
                                        </div>
                                    </div>
                                </div>                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><?php if(isset($_POST['batch1'])){?>
        <?php array_pop($result1) //remove the laste element as it is not needed here;?>
        <?php echo form_open('Sms_cont/sendSMSSender');?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="col-1">
                            <input type="hidden" name="batch" value="<?php echo $_POST['batch']; ?>" >
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                <div class="table-responsive">
                                    <table class="table table-bordered" >
                                        <thead>
                                            <tr style="font-weight: bold;">
                                                <td><input type="checkbox" id="ckbCheckAll">&emsp;Select All</td>
                                            </tr>
                                        </thead>
                                        <p id="checkBoxes">
                                        <tbody>
                                            <?php foreach($result1 as $value): ?>
                                            <tr>
                                                <td><input type="checkbox" class="checkBoxClass" value="<?php echo $value->stud_contact.",".$value->stud_surname." ".$value->stud_name." ".$value->father_name." ".$value->mother_name; ?>" name="contact[]">&emsp;<?php echo $value->stud_surname." ".$value->stud_name." ".$value->father_name." ".$value->mother_name;?>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                        </p>
                                    </table>    
                                </div>  
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>&emsp;Send SMS To :</label>
                                            <div class="row">
                                                <div class="col-md-4"> &emsp;
                                                    <input type="radio" name="send" value="student" checked>Students
                                                </div>
                                                <div class="col-md-4"> &emsp;
                                                    <input type="radio" name="send" value="parents">Parents
                                                </div>
                                                <div class="col-md-4"> &emsp;
                                                    <input type="radio" name="send" value="both">Both
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>&emsp;SMS Route :</label>
                                            <div class="row">
                                                <div class="col-md-4"> &emsp;<input type="radio" name="route" value="3" checked>EnterpriseSMS</div>
                                                <div class="col-md-4">&emsp;<input type="radio" name="route" value="1">Promotional</div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>&emsp;Message :</label>
                                            <div style="margin-left:15px; margin-right:15px;">
                                                &emsp;<textarea rows="2" type="text" class="form-control border-input" name="msg" required><?php if(isset($_POST['msg'])){echo $_POST['msg'];} ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        <?php echo form_close();?>
        <!--first button end-->
        <!--for 2nd button-->
        <?php }}
        else if($button == 2){ 
        ?>
        <?php echo form_open('Sms_cont/sendSMS/2'); ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="col-1">
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <select class="form-control border-input" id="teacher" name="teacher[]" multiple required>
                                                    <?php foreach($_POST['teacher'] as $value){ print_r($value);?>
                                                    
                                                    <option value=" <?php if(isset($_POST['teacher'])){print_r($value);} ?>"><?php         if(isset($_POST['teacher'])){echo print_r($value);}else echo '----Select Faculty----'; ?></option>
                                                    <?php } ?>
                                                    <?php foreach($teacher as $value):?>
                                                    <option value="<?php echo $value->t_ID.','.$value->t_name; ?>"><?php echo $value->t_name; ?></option>
                                                    <?php endforeach;?>
                                                </select>
                                                <?php echo form_error('teacher', '<div class="alert alert-danger contact-warning">', '</div>');?> 
                                            </div>
                                            <div class="col-md-1">
                                                <button type="submit" class="btn btn-success" style="margin-left:-15px;" name="t_submit">Enter</button>
                                            </div><?php echo form_close();?>
                                            <div class="col-md-5">
                                                <input type="text" id="studentsearch" name="studentsearch" placeholder="Search..." style="width:100%; margin-top:5px;" >
                                            </div>
                                        </div>
                                    </div>
                                </div>                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><?php if(isset($_POST['t_submit'])){?>
        <?php// array_pop($result1); //remove the laste element as it is not needed here;?>
        <?php echo form_open('Sms_cont/sendTeacherSMSSender');?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="col-1">
                            <?php 
                              foreach($_POST['teacher'] as $t_IdName){
                                  $idName[] = explode(",",$t_IdName);   
                              }
                             ?>
                            <input type="hidden" name="teacherid" value="<?php print_r($_POST['teacher']); ?>" >
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                <?php foreach($teacher as $value){
                                 foreach($idName as $idteacher){
                                   //  print_r($value->t_ID);echo "<br>";
                                if($value->t_ID == $idteacher[0]){  
                                   ?>
                                <input type="hidden" name="t_contact[]" value="<?php print_r($value->t_contact.",".$value->t_name." ".$value->t_surname); ?>" >
                                <?php }}} ?>
                                <div class="row"><br><br>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>&emsp;SMS Route :</label>
                                            <div class="row">
                                                <div class="col-md-4"> &emsp;<input type="radio" name="route" value="3" checked>EnterpriseSMS</div>
                                                <div class="col-md-4">&emsp;<input type="radio" name="route" value="1">Promotional</div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>&emsp;Message :</label>
                                            <div style="margin-left:15px; margin-right:15px;">
                                                &emsp;<textarea rows="2" type="text" class="form-control border-input" name="msg" required><?php if(isset($_POST['msg'])){echo $_POST['msg'];} ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        <?php echo form_close();?>
        <!-- 3rd button start -->
        <?php
        }}
        else if($button == 3){ ?>
        <?php echo form_open_multipart('Sms_cont/sendSMS/3'); ?>
        <?php if($this->session->flashdata('success')) { ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-right: 25px;"><span aria-hidden="true">&times;</span></button>
            <h5><?php echo $this->session->flashdata('success'); ?></h5>
        </div>
        <?php } ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="col-1">
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                              <input type="file" name="excel_file" id="file"> 
                                            </div>
                                            <div class="col-md-1">
                                                <button type="submit" class="btn btn-success" style="margin-left:-15px;" name="excel_submit">Enter</button>
                                            </div><?php echo form_close();?>
                                            <div class="col-md-5">
                                                 <input type="text" id="teachersearch"
                                                           onkeyup="myFunction()"        placeholder="Search..." style="width:          80%;" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_open('Sms_cont/sendBulkSMSSender');?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="col-1">
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered"  >
                                       <thead>
                                            <tr class="header" >
                                                <th style="font-weight: bold;width:10%;">Sr No.</th>
                                                <th style="font-weight: bold;width:6%;"><input type="checkbox" onclick="toggle(this);" />All</th>
                                                <th style="font-weight: bold;">Name</th>
                                                <th style="font-weight: bold;">Location</th>
                                                <th style="font-weight: bold;">Contact</th>
                                            </tr>
                                        </thead>
                                        
                                            <tbody id="myTable">
                                                <?php $i=0; foreach($importContact as $contacts){?>
                                                <tr>
                                                    <td><?php $i++;echo $i;?></td>
                                                    <td><input type="checkbox" value="<?php echo $contacts->contact.",".$contacts->name; ?>" name="contact[]" /></td>
                                                    <td><?php echo $contacts->name;?></td>
                                                    <td><?php echo $contacts->location;?></td>
                                                    <td><?php echo $contacts->contact;?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>  
                                    </div>
                               
                                <div class="row"><br><br>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>&emsp;SMS Route :</label>
                                            <div class="row">
                                                <div class="col-md-4"> &emsp;<input type="radio" name="route" value="3" checked>EnterpriseSMS</div>
                                                <div class="col-md-4">&emsp;<input type="radio" name="route" value="1">Promotional</div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>&emsp;Message :</label>
                                            <div style="margin-left:15px; margin-right:15px;">
                                                &emsp;<textarea rows="2" type="text" class="form-control border-input" name="msg" required><?php if(isset($_POST['msg'])){echo $_POST['msg'];} ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        <?php echo form_close();?>
        <?php }
        else if($button == 4){ echo 4;}
        else if($button == 5){ echo 5;}
        ?>
    </div>
    </div>
<style> 
input[id=teachersearch] {
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

input[id=studentsearch]:focus {
    width: 80%;
}
</style>
<script>
function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
</script>
