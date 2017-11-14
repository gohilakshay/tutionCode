<?php include "header.php";?>
<?php $page = 'seven';include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>

<br><br>
<div class="content">
    <div class="container-fluid" style="margin-top:-50px;">
        <?php echo form_open('Expense_cont/staffPaymentDetails'); ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Staff Payment Details</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Staff Name <span class="required" style="color:red;"> * </span></label>
                                    <select name="staffname" class="form-control border-input"  required>
                                        <option value="">-- Select Staff Name --</option>
                                        <?php foreach($result as $staff): ?>
                                        <option value="<?php echo $staff->staff_name;?>"><?php echo $staff->staff_name;?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Staff Salary <span class="required" style="color:red;"> * </span></label>
                                    <input type="text" class="form-control border-input phoneInput" name="staffsalary" value="<?php if(isset($_POST['staffsalary'])){echo $_POST['staffsalary'];} ?>" required>
                                    <?php echo form_error('staffsalary', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Payment Mode <span class="required" style="color:red;"> * </span></label>
                                    <div>
                                        <select  class="form-control border-input" name="paymentmode" required>
                                            <option value="">Payment Mode</option>
                                            <option value="cash">Cash</option>
                                            <option value="cheque">Cheque</option>
                                            <option value="credit">Credit Card</option>
                                            <option value="debit">Debit Card</option>
                                            <option value="netbanking">Net Banking</option>
                                        </select>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Payment Date <span class="required" style="color:red;"> * </span></label>
                                    <input type="date" class="form-control border-input datepicker" name="paymentdate" value="<?php echo date("Y-m-d"); ?>" required>
                                    <?php echo form_error('paymentdate', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <br>
                                    <center><button type="submit" class="btn btn-success" name="pay" style="margin-top: 8px; margin-left: -15px;"> PAY</button></center>
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
                                                <h3 class="text-uppercase">Payment Details</h3>
                                            </div>
                                            <div class="col-md-8" style="margin-top:-2px;">
                                            <h3>
                                                <form action="<?php echo site_url().'/Expense_cont/staffPaymentDetails/'; ?>" method="GET">
                                                    <div class="input-group pull-right">
                                                        <input type="text" class="form-control"  placeholder="Search..." id="staffsearch"  name="staffpayFilter" value="<?php if (!empty($_GET['staffpayFilter'])) { echo $_GET['staffpayFilter'];
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
                                                <td>Status</td>
                                            </tr>
                                        </thead>
                                        <tbody><?php $i=1;foreach($result as $value):?>
                                            <tr>
                                                <td><?php echo $i;$i++;?></td>
                                                <td><?php echo $value->staff_name;?></td>
                                                <td><?php echo $value->staff_contact;?></td>
                                                <td><?php echo $value->staff_salary;?></td>
                                                <?php if($value->status == 'paid'){ ?>
                                                <td><font color="green"><?php echo $value->status?></font></td>
                                                <?php }else { ?>
                                                <td><font color="red"><?php echo $value->status?></font></td>
                                                <?php }?>
                                            </tr>
                                            <?php endforeach; ?>
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
<?php include "footer.php";?>
<?php include "addModel.php";?>
<?php include "script_include.php";?>
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

    .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}


</style>
