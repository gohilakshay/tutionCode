<?php include "header.php" ?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-sm-4 col-sm-offset-4" style="margin-top: 52px;">
                    <center><h2><b style="color: #68B3C8;">Create Database Tables</b></h2></center>
                </div>
                <div class="col-sm-4 col-sm-offset-4" align="center" style="margin-top: 30px;">
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
        <?php echo form_open('DbCreate/Table'); ?>
        <div class="text-center">
            <button type="submit" class="btn btn-success btn-fill btn-wd">Finish</button>
        </div>
        <?php echo form_close(); ?>
    </div><br>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <?php echo form_open('Home/mainP'); ?>
            <center>
                <p>If Already Created <button type="submit" class="btn btn-warning btn-fill ">Skip</button></p>
            </center>
            <?php echo form_close(); ?>
        </div>
    </div>
    </div>
</body>