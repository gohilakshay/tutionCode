<?php include "header.php" ?>
<body>
    <div class="col-sm-4 col-sm-offset-4">
        <?php echo form_open('Home/mainP'); ?>
            <div class="text-center">
                <button class="btn btn-success" style="margin-top: 20px;">HOME PAGE</button>
            </div>
        <?php echo form_close(); ?>
        <center><h2><b style="color: #68B3C8;">Create Database</b></h2></center></div>
    <div class="col-sm-4 col-sm-offset-4" align="center" style="margin-top: 20px;">
    <div class="card">
        <div class="content" padding-left="10px" style="margin-top:-25px">
            <?php echo form_open('Home/mainP'); ?>
                <div class="row" >                        
                    <div class="col-md-12">
                        <div class="form-group">
                        <label>Database Name</label>
                            <input type="text" class="form-control border-input" placeholder="Database Name" name="databasename" value="">
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
                                <input type="password" class="form-control border-input" placeholder="Password" name="password" value="">
                        </div>
                    </div>
                </div>
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
    <?php include "footer.php" ?>
 </div>
</body>