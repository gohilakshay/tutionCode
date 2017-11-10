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
        <?php echo form_open('Expense_cont/maintenance'); ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Maintenance Expense</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Title <span class="required" style="color:red;"> * </span></label>
                                    <input type="text" class="form-control border-input UserName_field" name="title" value="<?php  if(isset($_POST['title'])){echo $_POST['title'];}?>" required>
                                    <?php echo form_error('title', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
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
                                    <input type="date" class="form-control border-input datepicker" name="paymentdate" value="<?php echo date("Y-m-d"); ?>" required>
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
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden" style="overflow:auto;">
                                <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="col-md-12">
                                                <h3 class="text-uppercase">Maintenance Details</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-8" style="margin-top:-2px;">
                                            <h3>
                                                <form action="<?php echo site_url().'/Expense_cont/maintenance/'; ?>" method="GET">
                                                    <div class="input-group pull-right">
                                                        <input type="text" class="form-control"  placeholder="Search..." id="maintsearch"  name="maintainFilter" value="<?php if (!empty($_GET['maintainFilter'])) { echo $_GET['maintainFilter'];
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
                                <div class="table-responsive">
                                    <table class="table table-bordered" >
                                        <thead>
                                            <tr style="font-weight: bold;">
                                                <td>Sr No.</td>
                                                <td>Title</td>
                                                <td>Amount</td>
                                                <td>Payment Mode</td>
                                                <td>Payment Date</td>
                                            </tr>
                                        </thead>
                                        <tbody><?php $i=$offset;?>
                                            <tr><?php $i++;foreach($result as $value) {?>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $value->title; ?></td>
                                                <td><?php echo $value->amount; ?></td>
                                                <td><?php echo $value->payment_mode; ?></td>
                                                <td><?php echo $value->payment_date; ?></td>
                                            </tr><?php } ?>
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
input[id=maintsearch] {
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