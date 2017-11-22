<?php include "header.php" ?>
<body>
    <div class="container">
        <div class="row" style="margin-top: 30px;" align="right">
            <form action="<?php echo site_url("Home") ?>" method="post">
                <input type="hidden" name="signout" />
                <button class="btn btn-primary">Sign Out</button>
            </form>  
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="col-sm-6 col-sm-offset-4" style="margin-top: -50px;">
                    <center><h2><b >Renew Sms limit</b></h2></center>
                </div>
                <div class="col-sm-6 col-sm-offset-4" align="center" style="margin-top: 10px;">
                    <?php echo form_open('Sms_cont/SmsLimit'); ?>
                    <div class="card">
                        <div class="content" padding-left="10px" style="margin-top:-25px">
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row" style="margin-bottom:10px;">
                                            <label>Previous Limit</label>
                                            <input type="text" name="prev_limit" id="prevlimit" value="<?php echo $limitDetails[0]->previousLimit; ?>" class="form-control border-input UserName_field" readonly/>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row" style="margin-bottom:10px;">
                                            <label>Balance</label>
                                            <input type="text" name="balance" id="balAnce" value="<?php echo $limitDetails[0]->balanceLimit; ?>" class="form-control border-input UserName_field" readonly/>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row" style="margin-bottom:10px;">
                                            <label>Recharge</label>
                                            <input type="text" name="recharge" onblur="smsLimitSet()" id="reChrge" placeholder="Enter Recharge value" class="form-control border-input UserName_field"/>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row" style="margin-bottom:10px;">
                                            <label>New Limit</label>
                                            <input type="text" name="newLimit" id="new_limit" value="<?php echo $limitDetails[0]->newlimit; ?>" class="form-control border-input UserName_field" readonly/>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info btn-fill btn-wd" name="rechrg">
                        Rechrage
                    </button>
                    <?php echo form_close(); ?>
                </div>
            </div>
              <div class="col-md-6">
                <div class="col-sm-6 col-sm-offset-4" style="margin-top:-80px;">
                    <center><h2><b style="color: #68B3C8;">Create Database Tables</b></h2></center>
                </div>
                <div class="col-sm-6 col-sm-offset-4" align="center" style="margin-top: 10px;">
                    <div class="card">
                        <div class="content" padding-left="10px" style="margin-top:-25px">
                            <?php echo form_open('CreateDbTable_cont/standard'); ?>
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row" style="margin-bottom:10px;">
                                            <button type="submit" class="btn btn-info btn-fill btn-wd" name="db" value="">
                                            Create Standard Table
                                            </button>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>

                            <?php echo form_open('CreateDbTable_cont/semester'); ?>
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row" style="margin-bottom:10px;">
                                            <button type="submit" class="btn btn-info btn-fill btn-wd" name="db" value="">
                                            Create Semester Table
                                            </button>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>

                            <?php echo form_open('CreateDbTable_cont/branch'); ?>
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row" style="margin-bottom:10px;">
                                            <button type="submit" class="btn btn-info btn-fill btn-wd" name="db" value="">
                                            Create Branch Table
                                            </button>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>

                            <?php echo form_open('CreateDbTable_cont/subject'); ?>
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row" style="margin-bottom:10px;">
                                            <button type="submit" class="btn btn-info btn-fill btn-wd" name="db" value="">
                                            Create Subject Table
                                            </button>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-sm-12 col-sm-offset-4">
        <?php echo form_open('DbCreate/Table'); ?>
        <div class="text-center" style="margin-right:76px;">
            <button type="submit" class="btn btn-success btn-fill btn-wd">Finish</button>
        </div>
        <?php echo form_close(); ?>
            </div>
    </div><br>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <?php echo form_open('Home/mainP'); ?>
            <center>
                <p>If Already Created <button type="submit" class="btn btn-warning btn-fill ">Skip</button></p>
            </center>
            <?php echo form_close(); ?>
        </div>
    </div>
    </div>
</body>
<script>
    function smsLimitSet() {
            var previousLimit = parseInt(document.getElementById("prevlimit").value);
            var balanceLimit = parseInt(document.getElementById("balAnce").value);
            var recharge = parseInt(document.getElementById("reChrge").value);
            var newlimit = parseInt(document.getElementById("new_limit").value);
            var new_Limit = recharge + balanceLimit;
            document.getElementById("new_limit").value = new_Limit;
        }
</script>