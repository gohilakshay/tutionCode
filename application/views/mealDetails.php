<?php include "header.php";?>
<?php $page = 'five';include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>

<br><br>
<div class="content">
    <div class="container-fluid" style="margin-top:-50px;">
        <?php if($this->session->flashdata('success')) { ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-right: 25px;"><span aria-hidden="true">&times;</span></button>
                  <h5><?php echo $this->session->flashdata('success'); ?></h5>
              </div>
        <?php } ?>
        <?php echo form_open('Expense_cont/meals'); ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Meals Expense</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Message <span class="required" style="color:red;"> * </span></label>
                                    <input type="text" class="form-control border-input UserName_field" name="message" value="<?php  if(isset($_POST['message'])){echo $_POST['message'];}?>" required>
                                    <?php echo form_error('message', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Amount <span class="required" style="color:red;"> * </span></label>
                                    <input type="text" class="form-control border-input phoneInput" name="amt" value="<?php         if(isset($_POST['amt'])){echo $_POST['amt'];} ?>" required>
                                    <?php echo form_error('amt', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
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
                                    <input type="date" class="form-control border-input" name="paymentdate" value="<?php echo date("Y-m-d"); ?>" required>
                                    <?php echo form_error('paymentdate', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <br>
                                    <center><button type="submit" class="btn btn-success" name="pay" style="margin-top: 8px; margin-left: -15px;"> ADD</button></center>
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
                                            <div class="col-md-12">
                                                <h3 class="text-uppercase">Meals And Entertainment Details</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" >
                                        <thead>
                                            <tr style="font-weight: bold;">
                                                <td>Sr No.</td>
                                                <td>Message</td>
                                                <td>Amount</td>
                                                <td>Payment Mode</td>
                                                <td>Payment Date</td>
                                            </tr>
                                        </thead>
                                        <tbody><?php $i=1;?>
                                            <tr><?php foreach ($result as $value) {
                                             ?>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $value->message?></td>
                                                <td><?php echo $value->amount?></td>
                                                <td><?php echo $value->payment_mode?></td>
                                                <td><?php echo $value->payment_date?></td>
                                            </tr><?php } ?>
                                            <tr>
                                               <!--  <td>2.</td>
                                                <td>office Party</td>
                                                <td>1500</td>
                                                <td>cash</td>
                                                <td>07/08/2017</td> -->
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