<?php include "header.php" ?>
<body><br><br>
    <div class="col-sm-4 col-sm-offset-4">
        <center>
                <img src="<?php echo base_url().'assets/img/logo.png'?>" >
           <!--<h1><b style="color: #68B3C8;">Digital Education</b></h1>-->
        </center>
    </div>
    <div class="col-sm-4 col-sm-offset-4" align="center" style="margin-top: 20px;">
        <div class="card">
            <div class="header" style=" border: 2px solid white; background: #193e77; border-radius: 20px; padding: 10px">
                <h4 class="title" style="color: white; font-weight:800" >Sign-In</h4>
            </div>
            <div class="content" padding-left="10px" >
                <?php echo form_open('CreateNewDb/createDb'); ?>
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
                            <input type="password" class="form-control border-input" placeholder="password" name="password" value="">
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button style=" border:2px solid white; background:#193e77;" type="submit" class="btn btn-info btn-fill btn-wd">LogIn</button>
                </div>
                <div class="clearfix"></div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <?php include "footer.php" ?>
    </div>
</body>