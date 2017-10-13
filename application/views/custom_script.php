<script>
    // Activate Next Step
        $(document).ready(function() {
            var navListItems = $('ul.setup-panel li a'),
            allWells = $('.setup-content');

        allWells.hide();
        navListItems.click(function(e)
        {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this).closest('li');

            if (!$item.hasClass('disabled')) {
                navListItems.closest('li').removeClass('active');
                $item.addClass('active');
                allWells.hide();
                $target.show();
            }
        });

        $('ul.setup-panel li.active a').trigger('click');

        // DEMO ONLY //
        $('#activate-step-2').on('click', function(e) {
            $('ul.setup-panel li:eq(1)').removeClass('disabled');
            $('ul.setup-panel li a[href="#step-2"]').trigger('click');
            $(this).remove();
        })

        $('#activate-step-3').on('click', function(e) {
            $('ul.setup-panel li:eq(2)').removeClass('disabled');
            $('ul.setup-panel li a[href="#step-3"]').trigger('click');
            $(this).remove();
        })

        $('#activate-step-4').on('click', function(e) {
            $('ul.setup-panel li:eq(3)').removeClass('disabled');
            $('ul.setup-panel li a[href="#step-4"]').trigger('click');
            $(this).remove();
        })

        $('#activate-step-3').on('click', function(e) {
            $('ul.setup-panel li:eq(2)').removeClass('disabled');
            $('ul.setup-panel li a[href="#step-3"]').trigger('click');
            $(this).remove();
        })
         });
    
    
        function Calculate()
        {
            
          var resources = document.getElementById('Resources').value;
          var minutes = document.getElementById('Minutes').value; 
          
          var payamount = document.getElementById('Payamount').value;
         
          document.getElementById('answer').value=parseFloat(resources) - parseFloat(minutes);


          var tempamount = document.getElementById('answer').value;
          document.getElementById('result').value=parseFloat(tempamount)/parseFloat(payamount);
         
          // for balance amount

          var receive = document.getElementById('Received').value;
          document.getElementById('balance').value=parseFloat(tempamount)-parseFloat(receive);
           document.form1.submitt();
        } 
    
  $('#Installment').on('change',function(){
        if( $(this).val()==="yes"){
            $("#installmenttype").show()
        }
        else{
            $("#installmenttype").hide()
        }
    });
   
    /*NExt button1 diabled*/
    function validateInput() {
        var ins=document.getElementsByClassName("student_details");
        //var ins1=document.getElementsByClassName("student_admission");
        debugger;
        pass = true;
        passICount=0;
        passTCount=0;

        for (var i=0; i<ins.length-1;i++) {
            if (ins[i].value =="") {
                pass = false;
                passICount++;
            }
        }

        document.getElementById("activate-step-2").disabled=!pass?true:false;
        /*document.getElementById("activate-step-2").value=!pass?(passICount+passTCount) + " questions remains":"Go to next questions";*/
    }
    /*NExt button2 diabled*/
    function validateInput1() {
       // var ins=document.getElementsByClassName("student_details");
        var ins=document.getElementsByClassName("student_admission");
        pass = true;
        passICount=0;
        passTCount=0;

        for (var i=0; i<ins.length;i++) {
            if (ins[i].value =="") {
                pass = false;
                passICount++;
            }
        }

        document.getElementById("activate-step-3").disabled=!pass?true:false;
        /*document.getElementById("activate-step-3").value=!pass?(passICount+passTCount) + " questions remains":"Go to next questions";*/
    }
    /*NExt button diabled*/
    function validateInput2() {
       // var ins=document.getElementsByClassName("student_details");
        var ins=document.getElementsByClassName("student_payment");
       
        pass = true;
        passICount=0;
        passTCount=0;

        for (var i=0; i<ins.length;i++) {
            if (ins[i].value =="") {
                pass = false;
                passICount++;
            }
        }

        document.getElementById("activate-step-4").disabled=!pass?true:false;
        /*document.getElementById("activate-step-3").value=!pass?(passICount+passTCount) + " questions remains":"Go to next questions";*/
    }
    
</script>
