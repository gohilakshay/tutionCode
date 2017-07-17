<?php include "header.php" ?>
<body>
    <div class="col-sm-4 col-sm-offset-4">
        <center><h1><b style="color: #68B3C8;">Digital Education</b></h1></center></div>
    <div class="col-sm-4 col-sm-offset-4" align="center" style="margin-top: 20px;">
    <div class="card">
        <div class="header" style=" border: 2px solid white;
    background: #68B3C8;
    border-radius: 20px;
    padding: 10px">
            <h4 class="title" style="color: white; font-weight:800" >LogIn</h4>
        </div>
        <div class="content" padding-left="10px" >
           <?php echo form_open('Home/mainP'); ?>
                <div class="row" >                        
                    <div class="col-md-12">
                        <div class="form-group">
                        <label>Username</label>
                            <input type="text" class="form-control border-input" placeholder="Username" name="username" value="michael23">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Password</label>
                                <input type="text" class="form-control border-input" placeholder="Company" name="password" value="Chet">
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-fill btn-wd">LogIn</button>
                </div>
                <div class="clearfix"></div>
            <?php echo form_close(); ?>
        </div>
    </div><div class="row" >                        
                    <div class="col-md-12">
                       <a href=""><label><h5>Forgot Your Password ??</h5></label></a>
                            
                    </div>
                </div>
    <?php include "footer.php" ?>
 </div>
</body>