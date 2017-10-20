<!--   Core JS Files   -->

    <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-checkbox-radio.js"></script>



    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url(); ?>assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
    <!--Search script-->
	<script src="<?php echo base_url(); ?>assets/js/searchScript.js"></script> 
    <script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');
</script>
<script>

 window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 1000)
 
 
 $('.surnameInput').keypress(function(key) {
  
     if((key.charCode < 97 || key.charCode > 122) && (key.charCode < 65 || key.charCode > 90) && (key.charCode != 45)) return false;
});
    
     $('.phoneInput').keypress(function(key) {
        if(key.charCode < 48 || key.charCode > 57) 
        return false;
    });
 
    
    $(document).ready(function() {
        $("#enter_disable").bind("keypress", function(e) {
            if (e.keyCode == 13) {
                return false;
            }
        });
    });
    
      
    
    $(".UserName_field").on({
  keydown: function(e) {
    if (this.value.length === 0 && e.which === 32)
     e.preventDefault();
  },
});
     
    
    
    $('#payMode').on('change',function(){
        $("#chqDetail").hide()
            $("#transcDetail").hide()
        if( $(this).val()==="cheque"){
            $("#chqDetail").show()
        }
        else if( $(this).val()==="credit"){
            $("#transcDetail").show()
        }
        else if( $(this).val()==="debit"){
            $("#transcDetail").show()
        }
        else if( $(this).val()==="netbanking"){
            $("#transcDetail").show()
        }
    });
    
</script>