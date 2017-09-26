<?php include "header.php" ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>

<script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
    type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('#lstFruits').multiselect({
            includeSelectAllOption: true
        });
    });
</script>
<style>
    .dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover{
        background-color: #68b3c8;
    }
</style>
<body>
    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="col-sm-12">
                <center><h2><b style="color: #68B3C8;">Create Database</b></h2></center>
            </div>
            <div class="col-sm-12" align="center" style="margin-top: 20px;">
                <div class="card">
                    <div class="content" padding-left="10px" style="margin-top:-25px">
                    <?php echo form_open('Home/tomainP'); ?>
                        <div class="row" >                        
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Database Name</label>
                                    <input type="text" class="form-control border-input" placeholder="Database Name" name="databasename" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Database Type</label>
                                    <select  name="databasetype[]" id="lstFruits" multiple="multiple">
                                        <!--<option value="">---Select Type---</option>-->
                                        <option value="school">School</option>
                                        <option value="jrcolg_sci">Jr. College (science)</option>
                                        <option value="jrcolg_com">Jr. College (commerce)</option>
                                        <option value="engicolg">Engineering College</option>
                                        <option value="comcolg">Commerce College</option>
                                        <!--<option value="school,jrcolg_sci">School & Jr. College (science)</option>          
                                        <option value="school,jrcolg_com">School & Jr. College (commerce)</option>          
                                        <option value="jrcolg_sci,jrcolg_com">Jr. College (science) & Jr. College (commerce)</option>          
                                        <option value="jrcolg_sci,engicolg">Jr. College (science) & Engineering college</option>          
                                        <option value="jrcolg_com,comcolg">Jr. College (commerce) & Commerce college</option> -->         
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" >                        
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Username</label>
                                    <input type="text" class="form-control border-input" placeholder="Username" name="username" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Password</label>
                                        <input type="password" class="form-control border-input" placeholder="Password" name="password" id="password" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Re-Password</label>
                                        <input type="password" class="form-control border-input" placeholder="Re Type Password" id="confirm_password" name="repassword" value="">
                                </div>
                            </div>
                            <div style="margin-top:29px;" class="col-md-2">
                                <span id='message'></span>
                            </div>
                        </div>
                        <span id='message'></span>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd" name="addDb">Submit</button>
                        </div>
                        <div class="clearfix"></div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <?php echo form_open('CreateNewDb/deleteDb'); ?>
                    <div class="text-center">
                        <button type="submit" class="btn btn-danger btn-fill btn-wd">Delete</button>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="col-sm-12" style="margin-top: 3px;">
                <center><h2><b style="color: #68B3C8;">Select Database</b></h2></center>
            </div>
            <div class="col-sm-12" align="center" style="margin-top: 30px;">
                <div class="card">
                    <div class="content" padding-left="10px" style="margin-top:-25px">
                        <?php echo form_open('SelectDataBase_cont/select'); ?>
                        <?php foreach($result as $value):?>
                        <div class="row" > 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd" name="db" value="<?php echo $value->dbName; ?>"><?php echo $value->dbName; ?></button>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script>
$('#password, #confirm_password').on('keyup', function () {
    if ($('#password').val() == $('#confirm_password').val()) {
        $('#message').html('Matching').css('color', 'green');
    } else 
        $('#message').html('Not Matching').css('color', 'red');
});
</script>

