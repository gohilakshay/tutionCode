<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                    <ul><a href="<?php echo site_url()."/Home/mainP" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb; border-color:#b7ddfb; color:black; padding:11px; padding-left:15px; padding-right:15px;" class="btn btn-primary btn-lg">Students</button></a>&emsp;
                    <a href="<?php echo site_url()."/Home/mainP" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb; border-color:#b7ddfb; color:black; padding:11px; padding-left:15px; padding-right:15px;" class="btn btn-primary btn-lg">Leads</button></a>&emsp;
                    <a href="<?php echo site_url()."/Home/mainP" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb; border-color:#b7ddfb; color:black; padding:11px; padding-left:15px; padding-right:15px;" class="btn btn-primary btn-lg">Faculties</button></a>&emsp;
                    <a href="<?php echo site_url()."/Home/mainP" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb; border-color:#b7ddfb; color:black; padding:11px; padding-left:15px; padding-right:15px;" class="btn btn-primary btn-lg">Bulk SMS</button></a>&emsp;
                    <a href="<?php echo site_url()."/Home/mainP" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb; border-color:#b7ddfb; color:black; padding:11px; padding-left:15px; padding-right:15px;" class="btn btn-primary btn-lg">Subscriber List</button></a>&emsp;
                    <a href="<?php echo site_url()."/Home/mainP" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb; border-color:#b7ddfb; color:black; padding:11px; padding-left:15px; padding-right:15px;" class="btn btn-primary btn-lg">Student Login</button></a>&emsp;
                    <a href="<?php echo site_url()."/Home/mainP" ?>"> <button type="button" style="border-radius:10px; background-color:#b7ddfb; border-color:#b7ddfb; color:black; padding:11px; padding-left:15px; padding-right:15px;" class="btn btn-primary btn-lg">SMS History</button></a>&emsp;</ul>
            </div>
        </div><?php echo form_open('Sms_cont/sendSMS'); ?>
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
                                                &emsp;<textarea rows="2" type="text" class="form-control border-input" name="msg" value="<?php if(isset($_POST['msg'])){echo $_POST['msg'];} ?>" required></textarea>
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
        <?php }?>
    </div>
    </div>
<style> 
input[id=studentsearch] {
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
    width: 100%;
}
</style>