<?php include_once "header.php";?>
<?php $page="one";include_once "sidebar.php";?>
<?php include_once "nav.php";?>
<?php include_once "feeDetailContent.php";?>
<?php include_once "footer.php";?>
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
