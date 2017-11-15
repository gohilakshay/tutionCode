<?php include_once "header.php";?>
<?php $page="one";include_once "sidebar.php";?>
<?php include_once "nav.php";?>
<?php include_once "feeDetailContent.php";?>
<?php include_once "footer.php";?>
 <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" style="display:none">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Payment</h4>
        </div>
        <div class="modal-body">
            <div class="content">
                <?php echo form_open('Student_cont/Payfee'); ?>
                 <!--  <input type="hidden" value="<?php echo $student_data->stud_ID; ?>" name="stud_id" >-->
                <div class="row" >                        
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-group">
                            <label>Student ID</label>
                            <input type="text" class="form-control border-input"  name="studentid" value="<?php echo $_GET['id']; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-group">
                            <label>Student Name</label>
                            <input type="text" class="form-control border-input" name="studentname" value="<?php echo $_GET['name']; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-2">
                        <div class="form-group">
                            <label>Final Fees</label>
                            <input type="text" class="form-control border-input" name="final_fees" value="<?php echo $_GET['final']; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Discount Fees</label>
                            <input type="text" class="form-control border-input" name="discount_fees" value="<?php echo $_GET['discount']; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-2">
                        <div class="form-group">
                            <label>Paid Fees</label>
                            <input type="text" class="form-control border-input" name="paid_fees" value="<?php echo $_GET['paid']; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4 ">
                        <div class="form-group">
                            <label>Balance</label>
                            <input type="text" id="balModal" class="form-control border-input" name="balance" value="<?php echo $_GET['bal']; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" id="Amtmodal" class="form-control border-input" name="amount" value="" >
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
                </div>
                <div class="clearfix"></div>
                <?php echo form_close(); ?>
            </div>
          </div>    
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    </div>
  </div>
<?php include_once "addModel.php"?>
<?php include_once "script_include.php"; ?>
<script>
$('#Amtmodal').keyup(function(){
    var bal = $('#balModal').val();
    var ba = parseInt(bal);
    if ($(this).val() > ba){
    $(this).val(ba);
  }
});
</script>
