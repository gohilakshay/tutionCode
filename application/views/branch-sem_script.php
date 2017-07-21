<script>
    /*For School Subjects*/
    $('#standard').on('change',function(){ 
        if( $(this).val()>0 && $(this).val()<11 ){
            $("#schoolSubjects").show()
            $("#engisem1").hide()
            $("#engisem2").hide()
            $("#engicomp3").hide()
            $("#engicomp4").hide()
            $("#engicomp5").hide()
            $("#engicomp6").hide()
            $("#engicomp7").hide()
            $("#engicomp8").hide()
            $("#commercesem1").hide()
            $("#commercesem2").hide()
            $("#commercesem3").hide()
            $("#commercesem4").hide()
            $("#commercesem5").hide()
            $("#commercesem6").hide()
        }
        else{
            $("#schoolSubjects").hide()
        }
    }); 
    /*End*/
    
    /*For Commerce view of Branch and Semester*/
    $('#standard').on('change',function(){
        if( $(this).val()==="Commerce"){
            $("#commerce").show()
            $("#schoolSubjects").hide()
            $("#engisem1").hide()
            $("#engisem2").hide()
            $("#engicomp3").hide()
            $("#engicomp4").hide()
            $("#engicomp5").hide()
            $("#engicomp6").hide()
            $("#engicomp7").hide()
            $("#engicomp8").hide()
        }
        else{
            $("#commerce").hide()
        }
    });
    /*End*/
    
    /*For Engineering view of Branch and Semester*/
    $('#standard').on('change',function(){
        if( $(this).val()==="Engineering"){
            $("#engineer").show()
        }
        else{
            $("#engineer").hide()
        }
    });
    /*End*/
    
    /*For  Computer Engineering subjects according to branch and semester*/
    $('#engi_branch').on('change',function(){
        if( $(this).val()==="Computer Engineering"){
            $('#semester').on('change',function(){
                if( $(this).val()==="1"){
                    $("#engisem1").show()
                    $("#engisem2").hide()
                    $("#engicomp3").hide()
                    $("#engicomp4").hide()
                    $("#engicomp5").hide()
                    $("#engicomp6").hide()
                    $("#engicomp7").hide()
                    $("#engicomp8").hide()
                    $("#commercesem1").hide()
                    $("#commercesem2").hide()
                    $("#commercesem3").hide()
                    $("#commercesem4").hide()
                    $("#commercesem5").hide()
                    $("#commercesem6").hide()
                }
                else if($(this).val()==="2"){
                    $("#engisem1").hide()
                    $("#engisem2").show()
                    $("#engicomp3").hide()
                    $("#engicomp4").hide()
                    $("#engicomp5").hide()
                    $("#engicomp6").hide()
                    $("#engicomp7").hide()
                    $("#engicomp8").hide()
                    $("#commercesem1").hide()
                    $("#commercesem2").hide()
                    $("#commercesem3").hide()
                    $("#commercesem4").hide()
                    $("#commercesem5").hide()
                    $("#commercesem6").hide()
                    }
                else if($(this).val()==="3"){ 
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engicomp3").show()
                    $("#engicomp4").hide()
                    $("#engicomp5").hide()
                    $("#engicomp6").hide()
                    $("#engicomp7").hide()
                    $("#engicomp8").hide()
                    $("#commercesem1").hide()
                    $("#commercesem2").hide()
                    $("#commercesem3").hide()
                    $("#commercesem4").hide()
                    $("#commercesem5").hide()
                    $("#commercesem6").hide()
                    }
                else if($(this).val()==="4"){
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engicomp3").hide()
                    $("#engicomp4").show()
                    $("#engicomp5").hide()
                    $("#engicomp6").hide()
                    $("#engicomp7").hide()
                    $("#engicomp8").hide()
                    $("#commercesem1").hide()
                    $("#commercesem2").hide()
                    $("#commercesem3").hide()
                    $("#commercesem4").hide()
                    $("#commercesem5").hide()
                    $("#commercesem6").hide()
                    }
                else if($(this).val()==="5"){
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engicomp3").hide()
                    $("#engicomp4").hide()
                    $("#engicomp5").show()
                    $("#engicomp6").hide()
                    $("#engicomp7").hide()
                    $("#engicomp8").hide()
                    $("#commercesem1").hide()
                    $("#commercesem2").hide()
                    $("#commercesem3").hide()
                    $("#commercesem4").hide()
                    $("#commercesem5").hide()
                    $("#commercesem6").hide()
                    }
                else if($(this).val()==="6"){
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engicomp3").hide()
                    $("#engicomp4").hide()
                    $("#engicomp5").hide()
                    $("#engicomp6").show()
                    $("#engicomp7").hide()
                    $("#engicomp8").hide()
                    $("#commercesem1").hide()
                    $("#commercesem2").hide()
                    $("#commercesem3").hide()
                    $("#commercesem4").hide()
                    $("#commercesem5").hide()
                    $("#commercesem6").hide()
                    }
                else if($(this).val()==="7"){
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engicomp3").hide()
                    $("#engicomp4").hide()
                    $("#engicomp5").hide()
                    $("#engicomp6").hide()
                    $("#engicomp7").show()
                    $("#engicomp8").hide()
                    $("#commercesem1").hide()
                    $("#commercesem2").hide()
                    $("#commercesem3").hide()
                    $("#commercesem4").hide()
                    $("#commercesem5").hide()
                    $("#commercesem6").hide()
                    }
                else if($(this).val()==="8"){
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engicomp3").hide()
                    $("#engicomp4").hide()
                    $("#engicomp5").hide()
                    $("#engicomp6").hide()
                    $("#engicomp7").hide()
                    $("#engicomp8").show()
                    $("#commercesem1").hide()
                    $("#commercesem2").hide()
                    $("#commercesem3").hide()
                    $("#commercesem4").hide()
                    $("#commercesem5").hide()
                    $("#commercesem6").hide()
                    }
                
                else{
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engicomp3").hide()
                    $("#engicomp4").hide()
                    $("#engicomp5").hide()
                    $("#engicomp6").hide()
                    $("#engicomp7").hide()
                    $("#engicomp8").hide()
                    $("#commercesem1").hide()
                    $("#commercesem2").hide()
                    $("#commercesem3").hide()
                    $("#commercesem4").hide()
                    $("#commercesem5").hide()
                    $("#commercesem6").hide()
                    }
            })
        }
   /* if( $(this).val()==="Information Technology Engineering"){
            $('#semester').on('change',function(){
                if( $(this).val()==="1"){
                    $("#engisem1").show()
                    $("#engisem2").hide()
                    $("#engicomp3").hide()
                    $("#engicomp4").hide()
                    $("#engisem5").hide()
                    $("#engisem6").hide()
                    $("#engisem7").hide()
                    $("#engisem8").hide()
                }
                else if($(this).val()==="2"){
                    $("#engisem1").hide()
                    $("#engisem2").show()
                    $("#engicomp3").hide()
                    $("#engicomp4").hide()
                    $("#engisem5").hide()
                    $("#engisem6").hide()
                    $("#engisem7").hide()
                    $("#engisem8").hide()
                    }
                else if($(this).val()==="3"){ 
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engicomp3").hide()
                    $("#engicomp4").hide()
                    $("#engisem5").hide()
                    $("#engisem6").hide()
                    $("#engisem7").hide()
                    $("#engisem8").hide()
                    }
                else if($(this).val()==="4"){
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engicomp3").hide()
                    $("#engicomp4").hide()
                    $("#engisem5").hide()
                    $("#engisem6").hide()
                    $("#engisem7").hide()
                    $("#engisem8").hide()
                    }
                else if($(this).val()==="5"){
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engicomp3").hide()
                    $("#engicomp4").hide()
                    $("#engisem5").show()
                    $("#engisem6").hide()
                    $("#engisem7").hide()
                    $("#engisem8").hide()
                    }
                else if($(this).val()==="6"){
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engicomp3").hide()
                    $("#engicomp4").hide()
                    $("#engisem5").hide()
                    $("#engisem6").show()
                    $("#engisem7").hide()
                    $("#engisem8").hide()
                    }
                else if($(this).val()==="7"){
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engicomp3").hide()
                    $("#engicomp4").hide()
                    $("#engisem5").hide()
                    $("#engisem6").hide()
                    $("#engisem7").show()
                    $("#engisem8").hide()
                    }
                else if($(this).val()==="8"){
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engicomp3").hide()
                    $("#engicomp4").hide()
                    $("#engisem5").hide()
                    $("#engisem6").hide()
                    $("#engisem7").hide()
                    $("#engisem8").show()
                    }
                
                else{
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engicomp3").hide()
                    $("#engicomp4").hide()
                    $("#engisem5").hide()
                    $("#engisem6").hide()
                    $("#engisem7").hide()
                    $("#engisem8").hide()
                    }
            })
        }*/
    });
    /*END for Engineering Subjects*/
    
    /*For Commerce subjects according to branch and semester*/
    $('#commerce_branch').on('change',function(){
        if( $(this).val()==="fybcom"){
            $('#commercesemester').on('change',function(){
                if( $(this).val()==="commerce1"){
                    $("#commercesem1").show()
                    $("#commercesem2").hide()
                    $("#commercesem3").hide()
                    $("#commercesem4").hide()
                    $("#commercesem5").hide()
                    $("#commercesem6").hide()
                }
                else if($(this).val()==="commerce2"){
                    $("#commercesem1").hide()
                    $("#commercesem2").show()
                    $("#commercesem3").hide()
                    $("#commercesem4").hide()
                    $("#commercesem5").hide()
                    $("#commercesem6").hide()
                    }
                else if($(this).val()==="commerce3"){ 
                    $("#commercesem1").hide()
                    $("#commercesem2").hide()
                    $("#commercesem3").show()
                    $("#commercesem4").hide()
                    $("#commercesem5").hide()
                    $("#commercesem6").hide()
                    }
                else if($(this).val()==="commerce4"){
                    $("#commercesem1").hide()
                    $("#commercesem2").hide()
                    $("#commercesem3").hide()
                    $("#commercesem4").show()
                    $("#commercesem5").hide()
                    $("#commercesem6").hide()
                    }
                else if($(this).val()==="commerce5"){
                    $("#commercesem1").hide()
                    $("#commercesem2").hide()
                    $("#commercesem3").hide()
                    $("#commercesem4").hide()
                    $("#commercesem5").show()
                    $("#commercesem6").hide()
                    }
                else if($(this).val()==="commerce6"){
                    $("#commercesem1").hide()
                    $("#commercesem2").hide()
                    $("#commercesem3").hide()
                    $("#commercesem4").hide()
                    $("#commercesem5").hide()
                    $("#commercesem6").show()
                    }
                else{
                    $("#commercesem1").hide()
                    $("#commercesem2").hide()
                    $("#commercesem3").hide()
                    $("#commercesem4").hide()
                    $("#commercesem5").hide()
                    $("#commercesem6").hide()
                    }
            })
        }});
    /*END for Commerce Subjects*/
</script>