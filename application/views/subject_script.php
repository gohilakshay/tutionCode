<script>
    /*start of add faculty script*/
    $('#course').on('change',function(){
        if( $(this).val()==="course1"){
            $("#subjects").show()
        }
        else{
            $("#subjects").hide()
        }
    });
    $('#course').on('change',function(){
        if( $(this).val()==="course2"){
            $("#college").show()
        }
        else{
            $("#college").hide()
        }
    });
    $('#course').on('change',function(){
        if( $(this).val()==="course3"){
            $("#engineering").show()
        }
        else{
            $("#engineering").hide()
        }
    });
    /*end of add faculty script*/
</script>