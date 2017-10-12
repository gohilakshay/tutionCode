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
<script>

 window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 1000)
 
 
  
     function allLatters(surname, e)  
    {  
        var letters = /^[A-Za-z ]+$/;  
        if(surname.value.match(letters))  
        {  
            return true;  
        }
        else if(e.keyCode===9){
            return true;
        }
        else  
        {  
            alert("Enter only alphabets");
            $(".validName").val('');
            return false;  
        }  
    }  
     
    function allLatters_1(studentname, e)  
    {  
       
        var letters = /^[A-Za-z ]+$/;  
        if(studentname.value.match(letters))  
        {  
            return true;  
        }
        else if(e.keyCode===9){
            return true;
        }
        else  
        {  
            alert("Enter only alphabets");
            $(".validName_1").val('');
            return false;  
        }  
    }  
      
    function allLatters_2(fathername, e)  
    {  
       
        var letters = /^[A-Za-z ]+$/;  
        if(fathername.value.match(letters))  
        {  
            return true;  
        }
        else if(e.keyCode===9){
            return true;
        }
        else  
        {  
            alert("Enter only alphabets");
            $(".validName_2").val('');
            return false;  
        }  
    }  
    
       function allLatters_3(mothername, e)  
    {  
        var letters = /^[A-Za-z ]+$/;  
        if(mothername.value.match(letters))  
        {  
            return true;  
        }
        else if(e.keyCode===9){
            return true;
        }
        else  
        {  
            alert("Enter only alphabets");
            $(".validName_3").val('');
            return false;  
        }  
    }  
    
    function phoneno(){          
        $('#phone').keypress(function(e) {
            var a = [];
            var k = e.which;
            for (i = 48; i < 58; i++)
                a.push(i);
            if (!(a.indexOf(k)>=0))
                e.preventDefault();
            });
    }
    
     function allnumerics(total_fees, e)  
    {  
        var numbers = /^[0-9]+$/; 
        if(total_fees.value.match(numbers))  
        {  
            return true;  
        }
       else if(e.keyCode===9){
           return true;
        } 
        else  
        {  
            alert("Enter only Digits");
            $(".validnumbers").val('');
            return false;  
        }  
    }  
     
    function allnumerics_1(discount, e)  
    {  
        var numbers = /^[0-9]+$/; 
        if(discount.value.match(numbers))  
        {  
            return true;  
        }
       else if(e.keyCode===9){
           return true;
        } 
        else  
        {  
            alert("Enter only Digits");
            $(".validnumbers_1").val('');
            return false;  
        }  
    }  
     
    function allnumerics_2(received, e)  
    {  
        var numbers = /^[0-9]+$/; 
        if(received.value.match(numbers))  
        {  
            return true;  
        }
       else if(e.keyCode===9){
           return true;
        } 
        else  
        {  
            alert("Enter only Digits");
            $(".validnumbers_2").val('');
            return false;  
        }  
    } 
    
    
    $('#enterDisable').on('keyup',function(e){  
                          debugger;
        var keyCode = e.keyCode || e.which;
        if(keyCode===13){
            e.preventDefault();
           return false;
        }  
    });
    
</script>