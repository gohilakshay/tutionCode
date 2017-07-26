<?php include "header.php" ?>
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
                        <div class="row" >                        
                            <div class="col-md-12">
                                <div class="form-group">   
                                <label>Database Type</label>
                                    <input type="text" class="form-control border-input" placeholder="Insert comma(,) between two types"  name="databasetype" value="">
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