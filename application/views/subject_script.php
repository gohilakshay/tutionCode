<?php 
$this->load->library('session');
$db = $this->session->userdata('db');//load db      
$this->load->database($db);//call db
$this->db->database;
$query['result'] = $this->SelectData->course(); 
$coursename = array();
foreach($result as $value){ 
    array_push ($coursename,$value->course_name);
}
?>

<script>
    $(document).ready(function(){
        $('#course').change(function() {
            var j = $('#course option:selected').text();
            alert(j);
        });  
    });
       
    /*start of add faculty script*/
    var course_name = <?php echo json_encode($coursename); ?>;
    $('#course').on('change',function(){
            if($.inArray($(this).val(), course_name) > -1){
                $("#subjects").show()
            }
            else{
                $("#subjects").hide()
            }
        });
    
    /*$('#course').on('change',function(){
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
    });*/
    /*end of add faculty script*/
</script>