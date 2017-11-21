<?php include_once "header.php";?>
<?php $page = 'two';include_once "sidebar.php";?>
<?php include_once "nav.php";?>
<?php include_once "smsContent.php";?>
<?php include_once "footer.php";?>
<?php include_once "addModel.php"?>
<?php include_once "script_include.php"; ?>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">WARNING !!!</h4>
        </div>
        <div class="modal-body">
          <p>You have exceeded your sms Limit !!!!</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </div>
  </div>