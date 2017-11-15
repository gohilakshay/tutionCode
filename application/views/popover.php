<html lang="en-US">
<head>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
</head>
</html>
<?php 
$options = array(0=>'No', 1=>'Yes');
?>
<script type="text/javascript">
$(window).bind('ChangeView', function(e, data){
		$('.change-project').popover({
            placement : 'left',
            title : 'Change',
            color : 'red',
            trigger : 'click',
            html : true,
            content : function(){
                var content = '';
				content = $('#select-div').html();
				return content;
            } 
        }).on('shown.bs.popover', function(){
        });
        $(document).delegate('.btn-cancel-option', 'click', function(e){
            e.preventDefault();
            var element = $(this).parents('.popover');
            if(element.size()){
                $(element).removeClass('in').addClass('out');
            }
        });
	});
$(document).ready(function(){
$(window).trigger('ChangeView', {});  
});
</script>