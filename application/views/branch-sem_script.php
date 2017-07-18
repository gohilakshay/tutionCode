<script>
    /*For School Subjects*/
    $('#standard').on('change',function(){ 
        if( $(this).val()>0 && $(this).val()<11 ){
            $("#schoolSubjects").show()
            $("#engisem1").hide()
            $("#engisem2").hide()
            $("#engisem3").hide()
            $("#engisem4").hide()
            $("#engisem5").hide()
            $("#engisem6").hide()
            $("#engisem7").hide()
            $("#engisem8").hide()
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
            $("#engisem3").hide()
            $("#engisem4").hide()
            $("#engisem5").hide()
            $("#engisem6").hide()
            $("#engisem7").hide()
            $("#engisem8").hide()
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
    
    /*For Engineering subjects according to branch and semester*/
    $('#engi_branch').on('change',function(){
        if( $(this).val()==="Computer"){
            $('#semester').on('change',function(){
                if( $(this).val()==="engi1"){
                    $("#engisem1").show()
                    $("#engisem2").hide()
                    $("#engisem3").hide()
                    $("#engisem4").hide()
                    $("#engisem5").hide()
                    $("#engisem6").hide()
                    $("#engisem7").hide()
                    $("#engisem8").hide()
                    $("#commercesem1").hide()
                    $("#commercesem2").hide()
                    $("#commercesem3").hide()
                    $("#commercesem4").hide()
                    $("#commercesem5").hide()
                    $("#commercesem6").hide()
                }
                else if($(this).val()==="engi2"){
                    $("#engisem1").hide()
                    $("#engisem2").show()
                    $("#engisem3").hide()
                    $("#engisem4").hide()
                    $("#engisem5").hide()
                    $("#engisem6").hide()
                    $("#engisem7").hide()
                    $("#engisem8").hide()
                    $("#commercesem1").hide()
                    $("#commercesem2").hide()
                    $("#commercesem3").hide()
                    $("#commercesem4").hide()
                    $("#commercesem5").hide()
                    $("#commercesem6").hide()
                    }
                else if($(this).val()==="engi3"){ 
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engisem3").show()
                    $("#engisem4").hide()
                    $("#engisem5").hide()
                    $("#engisem6").hide()
                    $("#engisem7").hide()
                    $("#engisem8").hide()
                    $("#commercesem1").hide()
                    $("#commercesem2").hide()
                    $("#commercesem3").hide()
                    $("#commercesem4").hide()
                    $("#commercesem5").hide()
                    $("#commercesem6").hide()
                    }
                else if($(this).val()==="engi4"){
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engisem3").hide()
                    $("#engisem4").show()
                    $("#engisem5").hide()
                    $("#engisem6").hide()
                    $("#engisem7").hide()
                    $("#engisem8").hide()
                    $("#commercesem1").hide()
                    $("#commercesem2").hide()
                    $("#commercesem3").hide()
                    $("#commercesem4").hide()
                    $("#commercesem5").hide()
                    $("#commercesem6").hide()
                    }
                else if($(this).val()==="engi5"){
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engisem3").hide()
                    $("#engisem4").hide()
                    $("#engisem5").show()
                    $("#engisem6").hide()
                    $("#engisem7").hide()
                    $("#engisem8").hide()
                    $("#commercesem1").hide()
                    $("#commercesem2").hide()
                    $("#commercesem3").hide()
                    $("#commercesem4").hide()
                    $("#commercesem5").hide()
                    $("#commercesem6").hide()
                    }
                else if($(this).val()==="engi6"){
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engisem3").hide()
                    $("#engisem4").hide()
                    $("#engisem5").hide()
                    $("#engisem6").show()
                    $("#engisem7").hide()
                    $("#engisem8").hide()
                    $("#commercesem1").hide()
                    $("#commercesem2").hide()
                    $("#commercesem3").hide()
                    $("#commercesem4").hide()
                    $("#commercesem5").hide()
                    $("#commercesem6").hide()
                    }
                else if($(this).val()==="engi7"){
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engisem3").hide()
                    $("#engisem4").hide()
                    $("#engisem5").hide()
                    $("#engisem6").hide()
                    $("#engisem7").show()
                    $("#engisem8").hide()
                    $("#commercesem1").hide()
                    $("#commercesem2").hide()
                    $("#commercesem3").hide()
                    $("#commercesem4").hide()
                    $("#commercesem5").hide()
                    $("#commercesem6").hide()
                    }
                else if($(this).val()==="engi8"){
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engisem3").hide()
                    $("#engisem4").hide()
                    $("#engisem5").hide()
                    $("#engisem6").hide()
                    $("#engisem7").hide()
                    $("#engisem8").show()
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
                    $("#engisem3").hide()
                    $("#engisem4").hide()
                    $("#engisem5").hide()
                    $("#engisem6").hide()
                    $("#engisem7").hide()
                    $("#engisem8").hide()
                    $("#commercesem1").hide()
                    $("#commercesem2").hide()
                    $("#commercesem3").hide()
                    $("#commercesem4").hide()
                    $("#commercesem5").hide()
                    $("#commercesem6").hide()
                    }
            })
        }
    if( $(this).val()==="IT"){
            $('#semester').on('change',function(){
                if( $(this).val()==="engi1"){
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engisem3").hide()
                    $("#engisem4").hide()
                    $("#engisem5").hide()
                    $("#engisem6").hide()
                    $("#engisem7").hide()
                    $("#engisem8").hide()
                }
                else if($(this).val()==="engi2"){
                    $("#engisem1").hide()
                    $("#engisem2").show()
                    $("#engisem3").hide()
                    $("#engisem4").hide()
                    $("#engisem5").hide()
                    $("#engisem6").hide()
                    $("#engisem7").hide()
                    $("#engisem8").hide()
                    }
                else if($(this).val()==="engi3"){ 
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engisem3").show()
                    $("#engisem4").hide()
                    $("#engisem5").hide()
                    $("#engisem6").hide()
                    $("#engisem7").hide()
                    $("#engisem8").hide()
                    }
                else if($(this).val()==="engi4"){
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engisem3").hide()
                    $("#engisem4").show()
                    $("#engisem5").hide()
                    $("#engisem6").hide()
                    $("#engisem7").hide()
                    $("#engisem8").hide()
                    }
                else if($(this).val()==="engi5"){
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engisem3").hide()
                    $("#engisem4").hide()
                    $("#engisem5").show()
                    $("#engisem6").hide()
                    $("#engisem7").hide()
                    $("#engisem8").hide()
                    }
                else if($(this).val()==="engi6"){
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engisem3").hide()
                    $("#engisem4").hide()
                    $("#engisem5").hide()
                    $("#engisem6").show()
                    $("#engisem7").hide()
                    $("#engisem8").hide()
                    }
                else if($(this).val()==="engi7"){
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engisem3").hide()
                    $("#engisem4").hide()
                    $("#engisem5").hide()
                    $("#engisem6").hide()
                    $("#engisem7").show()
                    $("#engisem8").hide()
                    }
                else if($(this).val()==="engi8"){
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engisem3").hide()
                    $("#engisem4").hide()
                    $("#engisem5").hide()
                    $("#engisem6").hide()
                    $("#engisem7").hide()
                    $("#engisem8").show()
                    }
                
                else{
                    $("#engisem1").hide()
                    $("#engisem2").hide()
                    $("#engisem3").hide()
                    $("#engisem4").hide()
                    $("#engisem5").hide()
                    $("#engisem6").hide()
                    $("#engisem7").hide()
                    $("#engisem8").hide()
                    }
            })
        }});
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