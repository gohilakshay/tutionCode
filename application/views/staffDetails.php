<?php include "header.php";?>
<?php $page = 'five';include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>


<br>
<div class="content">
    <div class="container-fluid" style="margin-top:-50px;">
        <div class="row">
            <div class="col-md-12">
                    <div class="col-md-6">
                        <center>
                        <h3>
                            <a href="<?php echo site_url()."/Expense_cont/staffPaymentDetails" ?>"><button type="submit" class="btn btn-success">Make Staff Payment</button></a>
                        </h3>
                        </center>
                    </div>
                <div class="col-md-6">
                        <center>
                        <h3>
                            <a href="<?php echo site_url()."/Teacher_cont/TeacherPaymentDetails" ?>"><button type="submit" class="btn btn-success">Make Faculty Payment</button></a>
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
                        <h4 class="title">Add Staff</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Staff Name <span class="required" style="color:red;"> * </span></label>
                                    <input type="text" class="form-control border-input surnameInput" name="staffname" value="<?php  if(isset($_POST['staffname'])){echo $_POST['staffname'];}?>" required>
                                    <?php echo form_error('staffname', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Staff Salary <span class="required" style="color:red;"> * </span></label>
                                    <input type="text" class="form-control border-input phoneInput" name="staffsalary" value="<?php if(isset($_POST['staffsalary'])){echo $_POST['staffsalary'];} ?>" required>
                                    <?php echo form_error('staffsalary', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Staff Contact <span class="required" style="color:red;"> * </span></label>
                                    <input type="text" class="form-control border-input phoneInput"  maxlength="10" name="staffcontact" value="<?php  if(isset($_POST['staffcontact'])){echo $_POST['staffcontact'];} ?>" required>
                                    <?php echo form_error('staffcontact', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Staff Address <span class="required" style="color:red;"> * </span></label>
                                    <input type="text" class="form-control border-input UserName_field" name="staffaddress" value="<?php if(isset($_POST['staffaddress'])){echo $_POST['staffaddress'];} ?>" required>
                                    <?php echo form_error('staffaddress','<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-1">
                                <div class="form-group">
                                    <br>
                                    <center><button type="submit" class="btn btn-success" style="margin-top: 8px; margin-left: -15px;" >ADD</button></center>
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
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden" style="overflow:auto;">
                                <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <h3 class="text-uppercase">Staff Details</h3>
                                            </div>
                                            <div class="col-md-8" style="margin-top:-2px;">
                                            <h3>
                                                <form action="<?php echo site_url().'/Expense_cont/staffDetails/'; ?>" method="GET">
                                                    <div class="input-group pull-right">
                                                        <input type="text" class="form-control"  placeholder="Search..." id="staffsearch"  name="staffFilter" value="<?php if (!empty($_GET['staffFilter'])) { echo $_GET['staffFilter'];
                                                             }
                                                             ?>">
                                                        <span class="input-group-btn">
                                                            <button type="submit" class="btn btn-success">Search</button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </h3>
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
                                                <td>Address</td>
                                            </tr>
                                        </thead>
                                        <tbody><?php $i=$offset; ?>
                                            <tr><?php $i++;foreach ($result as $key):  ?>
                                                <td><?php echo $i++; ?></td>
                                                <td><a href="<?php echo site_url()."/Expense_cont/updateStaffDetails" ?>">
                                                    <?php  echo $key->staff_name; ?>
                                                </a></td>
                                                <td><?php  echo $key->staff_contact; ?></td>
                                                <td><?php  echo $key->staff_salary; ?></td>
                                                <td><?php  echo $key->staff_address; ?></td>
                                            </tr><?php endforeach; ?>
                                        </tbody>
                                    </table> 
                                    <center>
                                      <ul class="pagination">
                                          <!-- Show pagination links -->
                                          <?php
                                          foreach ($links as $link) {
                                          
                                              echo "<li>" . $link . "</li>";
                                          }
                                          ?>
                                    </ul>
                                    </center>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style> 
input[id=staffsearch] {
    width: 5px;
    box-sizing: border-box;
    border: 1px solid #c5e2ea;;
    border-radius: 50px;
    font-size: 16px;
    background-color: white;
    background-image: url('<?php echo base_url()?>assets/icon/search.png');
    background-position: 11px 7px; 
    background-repeat: no-repeat;
    background-size: 21px;
    padding-left: 35px;
  
    
}
</style>
<?php include "footer.php";?>
<?php include "addModel.php";?>
<?php include "script_include.php";?>
<?php include "custom_script.php";?>