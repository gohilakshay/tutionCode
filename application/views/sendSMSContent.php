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
        </div>
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
                                                <select class="form-control border-input" id="standard" name="standard" required>
                                                    <option value="">Academic Year</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <select class="form-control border-input" id="standard" name="standard" required>
                                                    <option value="">Select Batch</option>
                                                    <option value="9SB1">9SB1</option>
                                                    <option value="9sb2">9SB2</option>
                                                    <option value="9sb3">9SB3</option>
                                                    <option value="9sb4">9SB4</option>
                                                    <option value="9sb5">9SB5</option>
                                                </select>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" id="studentsearch" name="studentsearch" placeholder="Search..." style="width:100%; margin-top:5px;" required>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="submit" class="btn btn-success" style="margin-left:-15px;">search</button>
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
                    <div class="card">
                        <div class="col-1">
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                <div class="table-responsive">
                                    <table class="table table-bordered" >
                                        <thead>
                                            <tr style="font-weight: bold;">
                                                <td><input type="checkbox">&emsp;Select All</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="checkbox">&emsp;Ramu</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox">&emsp;shamu</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox">&emsp;akshay</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox">&emsp;ubaid</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox">&emsp;Leela</td>
                                            </tr>
                                            
                                        </tbody>
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
                                                <div class="col-md-4"> &emsp;<input type="radio" name="route" value="community" checked>Community</div>
                                                <div class="col-md-4">&emsp;<input type="radio" name="route" value="promotional">Promotional</div>
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