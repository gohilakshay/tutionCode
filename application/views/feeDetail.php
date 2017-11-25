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
<script>
 function myFp(){
        /*var sname = document.getElementById('SnameStud').value;*/
        var stname = document.getElementById('StnameStud').value;
        /*var fname = document.getElementById('FnameStud').value;
        var mname = document.getElementById('MnameStud').value;*/
        var name = stname;
        /*var Totfee = document.getElementById('Resources').value;
        var Discfee = document.getElementById('Minutes').value;*/
         var Finalfee = document.getElementById('answer').value;
         var Recfee = document.getElementById('Received').value;
         var Balfee = document.getElementById('balModal').value;
        /*var Installfee = document.getElementById('Installment').value;
        var InstallTypefee = document.getElementById('Payamount').value;*/
         var payMode = document.getElementById('payMode').value;
         var chqDate = document.getElementById('chqDate').value;
         var bankName = document.getElementById('bankName').value;
         var chqNo = document.getElementById('chqNo').value;
         var tranId = document.getElementById('tranId').value;
         var dateRecp = document.getElementById('dateRecp').value;
        /*var AmtperInstal = document.getElementById('result').value;*/
        var urlbase = <?php $siteurl = site_url().'/Student_cont/';echo json_encode($siteurl); ?>
        
        var url = urlbase+'pdfPrint/?name=' + name +'&Finalfee='+Finalfee+'&Recfee='+Recfee+'&Balfee='+Balfee+'&payMode='+payMode+'&chqDate='+chqDate+'&bankName='+bankName+'&chqNo='+chqNo+'&tranId='+tranId+'&dateRecp='+dateRecp;
        window.open(url);
        
    }
</script>

