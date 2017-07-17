<?php include "header.php";?>
<?php $page = 'seven';include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>

<br>
<div class="content">
    <div class="container-fluid" style="margin-top:-50px;">
        <div class="row">
            <div class="col-md-12">
               
                    <div class="col-md-12">
                        <center>
                        <h3>
                            <a href="<?php echo site_url()."/Expense_cont/staffPaymentDetails" ?>"><button type="submit" class="btn btn-success">Make Payment</button></a>
                        </h3>
                        </center>
                    </div>
                
            </div>
        </div>
        <?php echo form_open('Expense_cont/staffDetails'); ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Update Staff</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Staff Name</label>
                                    <input type="text" class="form-control border-input" name="staffname" value="<?php         if(isset($_POST['staffname'])){echo $_POST['staffname'];}?>" required>
                                    <?php echo form_error('staffname', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Staff Salary</label>
                                    <input type="text" class="form-control border-input" name="staffsalary" value="<?php         if(isset($_POST['staffsalary'])){echo $_POST['staffsalary'];} ?>" required>
                                    <?php echo form_error('staffsalary', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Staff Contact</label>
                                    <input type="text" class="form-control border-input" name="staffsalary" value="<?php         if(isset($_POST['staffsalary'])){echo $_POST['staffsalary'];} ?>" required>
                                    <?php echo form_error('staffsalary', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Staff Address</label>
                                    <input type="text" class="form-control border-input" name="staffsalary" value="<?php         if(isset($_POST['staffsalary'])){echo $_POST['staffsalary'];} ?>" required>
                                    <?php echo form_error('staffsalary', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-1">
                                <div class="form-group">
                                    <br>
                                    <center><button type="submit" class="btn btn-success" style="margin-top: 8px; margin-left: -22px;"> Update</button></center>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                </div>
            </div>
        </div>
        <?php echo form_close();?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="col-1">
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <h3 class="text-uppercase">Staff Details&emsp;</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" >
                                        <thead>
                                            <tr style="font-weight: bold;">
                                                <td>Sr No.</td>
                                                <td>Name</td>
                                                <td>Contact</td>
                                                <td>Salary</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>Ramu</td>
                                                <td>7896541236</td>
                                                <td>1200</td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>Ramesh</td>
                                                <td>5896236512</td>
                                                <td>2000</td>
                                            </tr>
                                        </tbody>
                                    </table>    
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php";?>
<?php include "addModel.php";?>
<?php include "script_include.php";?>
<?php include "custom_script.php";?>