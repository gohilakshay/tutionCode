<?php include "header.php" ?>
<body>
    <div class="col-sm-4 col-sm-offset-4">
        <center><h1><b style="color: #68B3C8;">Delete Database</b></h1></center></div>
    <div class="col-sm-4 col-sm-offset-4" align="center" style="margin-top: 20px;">
    <div class="card">
        <div class="content" padding-left="10px" >
            <?php echo form_open('CreateNewDb/deleteDb'); ?>
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
                    <button type="submit" class="btn btn-danger btn-fill btn-wd" name="delete">DELETE</button>
                </div>
                <div class="clearfix"></div>
            <?php echo form_close(); ?>
        </div>
    </div>
        <?php echo form_open('Home/DeleteLogout'); ?>
        <div class="text-center">
            <button type="submit" class="btn btn-success btn-fill btn-wd" name="Deletelogout">LogOut</button>
        </div>
        <?php echo form_close(); ?>
    <?php include "footer.php" ?>
 </div>
</body>