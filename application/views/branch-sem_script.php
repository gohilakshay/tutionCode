<script>
    /*For School Subjects*/
    $('#standard').on('change',function(){
        standarOnchange();
    }); 
    /*End*/
    /*update when already know branch and sem*/
    $(document).ready(function(){
        standarOnchange();
    })
    
    function standarOnchange(){
        var obj = $('#standard');
        $("#schoolSubjects").hide();
        $("#scienceSubjects").hide();
        $("#commerceSubjects").hide(); 
        $("#artSubjects").hide(); 
        $("#engisem1").hide();
        $("#engisem2").hide();
        $("#engicomp3").hide();
        $("#engicomp4").hide();
        $("#engicomp5").hide();
        $("#engicomp6").hide();
        $("#engicomp7").hide();
        $("#engicomp8").hide();
        $("#engiIT3").hide();
        $("#engiIT4").hide();
        $("#engiIT5").hide();
        $("#engiIT6").hide();
        $("#engiIT7").hide();
        $("#engiIT8").hide();
        $("#engielectronics3").hide();
        $("#engielectronics4").hide();
        $("#engielectronics5").hide();
        $("#engielectronics6").hide();
        $("#engielectronics7").hide();
        $("#engielectronics8").hide();
        $("#engiextc3").hide();
        $("#engiextc4").hide();
        $("#engiextc5").hide();
        $("#engiextc6").hide();
        $("#engiextc7").hide();
        $("#engiextc8").hide();
        $("#engimech3").hide();
        $("#engimech4").hide();
        $("#engimech5").hide();
        $("#engimech6").hide();
        $("#engimech7").hide();
        $("#engimech8").hide();
        $("#engicivil3").hide();
        $("#engicivil4").hide();
        $("#engicivil5").hide();
        $("#engicivil6").hide();
        $("#engicivil7").hide();
        $("#engicivil8").hide();
        $("#college").hide();
        $("#commerce").hide();
        $("#engineer").hide();
        
        if( $(obj).val()>0 && $(obj).val()<11 ){
            $("#schoolSubjects").show()
        }
        /*For college view of Branch and Semester*/
        else if( $(obj).val()>10 && $(obj).val()<13){
            
            $("#college").show();
            $('#stream').on('change',function(){
                var str = $('#stream');
                if( $(str).val()==="Science") 
                {
                    $("#scienceSubjects").show();
                    $("#commerceSubjects").hide();
                    $("#artSubjects").hide();
                    /*$("#schoolSubjects").hide();*/
                }
                else if($(str).val()==="Commerce")
                {
                    $("#scienceSubjects").hide();
                    $("#artSubjects").hide();
                    $("#commerceSubjects").show();
                }
                else if($(str).val()==="Art")
                {
                    $("#scienceSubjects").hide();
                    $("#commerceSubjects").hide();
                    $("#artSubjects").show();
                }
            });
        }
        /*For Commerce view of Branch and Semester*/
        else if( $(obj).val()==="Commerce"){
            $("#commerce").show();
        }
        /*For Engineering view of Branch and Semester*/
        else if( $(obj).val()==="Engineering"){
            $("#engineer").show();
        }
    }

    
    /*For  Computer Engineering subjects according to branch and semester*/
    $('#engi_branch').on('change',function(){
        BranchOnChange();   
    });
    /*update when already know branch and sem*/
    $(document).ready(function(){
        standarOnchange();
    })
    
    $('#engisemester').on('change',function(){
        BranchOnChange(this);
    })
     $(document).ready(function(){
        BranchOnChange($('#engisemester'));
    })
    
    /*END for Engineering Subjects*/
    function BranchOnChange(comboEngineering){
        var obj = $('#engi_branch');
        $("#engisem1").hide()
        $("#engisem2").hide();
        $("#engicomp3").hide();
        $("#engicomp4").hide();
        $("#engicomp5").hide();
        $("#engicomp6").hide();
        $("#engicomp7").hide();
        $("#engicomp8").hide();
        $("#engiIT3").hide();
        $("#engiIT4").hide();
        $("#engiIT5").hide();
        $("#engiIT6").hide();
        $("#engiIT7").hide();
        $("#engiIT8").hide();
        $("#engielectronics3").hide();
        $("#engielectronics4").hide();
        $("#engielectronics5").hide();
        $("#engielectronics6").hide();
        $("#engielectronics7").hide();
        $("#engielectronics8").hide();
        $("#engiextc3").hide();
        $("#engiextc4").hide();
        $("#engiextc5").hide();
        $("#engiextc6").hide();
        $("#engiextc7").hide();
        $("#engiextc8").hide();
        $("#engimech3").hide();
        $("#engimech4").hide();
        $("#engimech5").hide();
        $("#engimech6").hide();
        $("#engimech7").hide();
        $("#engimech8").hide();
        $("#engicivil3").hide();
        $("#engicivil4").hide();
        $("#engicivil5").hide();
        $("#engicivil6").hide();
        $("#engicivil7").hide();
        $("#engicivil8").hide();
        if( $(obj).val()==="Computer Engineering"){   //Comp 
            if( $(comboEngineering).val()==="1"){
                    $("#engisem1").show();    
            }
            else if($(comboEngineering).val()==="2"){
                $("#engisem2").show();
            }
            else if($(comboEngineering).val()==="3"){ 
                $("#engicomp3").show();
            }
            else if($(comboEngineering).val()==="4"){
                $("#engicomp4").show();
            }
            else if($(comboEngineering).val()==="5"){
                $("#engicomp5").show();
            }
            else if($(comboEngineering).val()==="6"){
                $("#engicomp6").show();
            }
            else if($(comboEngineering).val()==="7"){
                $("#engicomp7").show();
            }
            else if($(comboEngineering).val()==="8"){
                $("#engicomp8").show();
            }
        }
        if( $(obj).val()==="Information Technology Engineering"){  //IT
            if( $(comboEngineering).val()==="1"){
                $("#engisem1").show();
            }
            else if( $(comboEngineering).val()==="2"){
                $("#engisem2").show();
            }
            else if( $(comboEngineering).val()==="3"){
                $("#engiIT3").show();               
            }
            else if( $(comboEngineering).val()==="4"){
                $("#engiIT4").show();
            }
            else if( $(comboEngineering).val()==="5"){
                $("#engiIT5").show();
            }
            else if( $(comboEngineering).val()==="6"){
                $("#engiIT6").show();
            }
            else if( $(comboEngineering).val()==="7"){
                $("#engiIT7").show();
            }
            else if( $(comboEngineering).val()==="8"){
                $("#engiIT8").show();
            }
        }
        if( $(obj).val()==="Electronics Engineering"){   //Electronics Engineering
            if( $(comboEngineering).val()==="1"){
                $("#engisem1").show();
            }
            else if($(comboEngineering).val()==="2"){
                $("#engisem2").show();
            }
            else if($(comboEngineering).val()==="3"){ 
                $("#engielectronics3").show();
            }
            else if($(comboEngineering).val()==="4"){
                $("#engielectronics4").show()  
            }
            else if($(comboEngineering).val()==="5"){
                $("#engielectronics5").show()
            }
            else if($(comboEngineering).val()==="6"){
               $("#engielectronics6").show()
            }
            else if($(comboEngineering).val()==="7"){
               $("#engielectronics7").show()
            }
            else if($(comboEngineering).val()==="8"){
                 $("#engielectronics8").show()
            }
        }
        if( $(obj).val()==="Electronics and Telecommunication"){   //Electronics and Telecommunication
            if( $(comboEngineering).val()==="1"){
                $("#engisem1").show();
            }
            else if($(comboEngineering).val()==="2"){
                $("#engisem2").show()
            }
            else if($(comboEngineering).val()==="3"){ 
                $("#engiextc3").show()
            }
            else if($(comboEngineering).val()==="4"){
                $("#engiextc4").show()
            }
            else if($(comboEngineering).val()==="5"){
                $("#engiextc5").show()
            }
            else if($(comboEngineering).val()==="6"){
                 $("#engiextc6").show()
            }
            else if($(comboEngineering).val()==="7"){
                $("#engiextc7").show()
            }
            else if($(comboEngineering).val()==="8"){
                $("#engiextc8").show()
             }
        }
        if( $(obj).val()==="Mechanical Engineering"){   //Mechanical Engineering
            if( $(comboEngineering).val()==="1"){
                 $("#engisem1").show();
            }
            else if($(comboEngineering).val()==="2"){
                 $("#engisem2").show()
            }
            else if($(comboEngineering).val()==="3"){ 
                 $("#engimech3").show()
             }
            else if($(comboEngineering).val()==="4"){
                 $("#engimech4").show()
            }
            else if($(comboEngineering).val()==="5"){
                 $("#engimech5").show()
             }
            else if($(comboEngineering).val()==="6"){
                $("#engimech6").show()
            }
            else if($(comboEngineering).val()==="7"){
                 $("#engimech7").show()
             }
            else if($(comboEngineering).val()==="8"){
                 $("#engimech8").show()
            }
        }
        if( $(obj).val()==="Civil Engineering"){   //Civil Engineering
            if( $(comboEngineering).val()==="1"){
                $("#engisem1").show();
            }
            else if($(comboEngineering).val()==="2"){
                 $("#engisem2").show()
            }
            else if($(comboEngineering).val()==="3"){ 
                $("#engicivil3").show()
             }
            else if($(comboEngineering).val()==="4"){
               $("#engicivil4").show()
            }
            else if($(comboEngineering).val()==="5"){
                $("#engicivil5").show()
             }
            else if($(comboEngineering).val()==="6"){
                $("#engicivil6").show()
            }
            else if($(comboEngineering).val()==="7"){
                $("#engicivil7").show()
            }
            else if($(comboEngineering).val()==="8"){
                $("#engicivil8").show()
             }
        }
    }
    /*For Commerce subjects according to branch and semester*/
    $('#commerce_branch').on('change',function(){
        commBranchOnChange();
    });
    /*update when already know branch and sem*/
    $(document).ready(function(){
        commBranchOnChange($('#commercesemester'));
    })
    
    $('#commercesemester').on('change',function(){
        
        commBranchOnChange(this);
    });
    
    function commBranchOnChange(objComboBranch){
        var obj = $('#commerce_branch');
        $("#commsem1").hide();
        $("#commsem2").hide();
        $("#commsem3").hide();
        $("#commsem4").hide();
        $("#commsem5").hide();
        $("#commsem6").hide();
        $("#bcommsem1").hide();
        $("#bcommsem3").hide();
        $("#bcommsem5").hide();
        $("#bmscommsem1").hide();
        $("#bmscommsem2").hide();
        $("#bmscommsem3").hide();
        $("#bmscommsem4").hide();
        $("#bmscommsem5").hide();
        $("#bmscommsem6").hide();
        if( $(obj).val()==="Bachelor of Accounting and Finance"){
            if( $(objComboBranch).val()==="1"){
                $("#commsem1").show();
            }
            else if($(objComboBranch).val()==="2"){
                $("#commsem2").show()
            }
            else if($(objComboBranch).val()==="3"){ 
                $("#commsem3").show()
             }
            else if($(objComboBranch).val()==="4"){
                $("#commsem4").show()
             }
            else if($(objComboBranch).val()==="5"){
                $("#commsem5").show()
            }
            else if($(objComboBranch).val()==="6"){
                $("#commsem6").show()
            }
        }
    
        else if( $(obj).val()==="Bachelor of Commerce"){
            if( $(objComboBranch).val()==="1"){
                $("#bcommsem1").show();
            }
            else if($(objComboBranch).val()==="2"){
                $("#bcommsem1").show()
            }
            else if($(objComboBranch).val()==="3"){ 
               $("#bcommsem3").show()
              }
            else if($(objComboBranch).val()==="4"){
                 $("#bcommsem3").show()
            }
            else if($(objComboBranch).val()==="5"){
                $("#bcommsem5").show()
            }
            else if($(objComboBranch).val()==="6"){
               $("#bcommsem5").show()
            }
        }
        
        else if( $(obj).val()==="Bachelor of Management Studies"){
            if( $(objComboBranch).val()==="1"){
                $("#bmscommsem1").show();
            }
            else if($(objComboBranch).val()==="2"){
                $("#bmscommsem2").show()
            }
            else if($(objComboBranch).val()==="3"){ 
                 $("#bmscommsem3").show()
            }
            else if($(objComboBranch).val()==="4"){
                $("#bmscommsem4").show()
            }
            else if($(objComboBranch).val()==="5"){
                $("#bmscommsem5").show()
            }
            else if($(objComboBranch).val()==="6"){
                $("#bmscommsem6").show()
            }
        }
    }
    /*END for Commerce Subjects*/
</script>