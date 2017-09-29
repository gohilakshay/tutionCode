<?php include "header.php";?>
<?php $page="six";include "sidebar.php";?>
<?php include "nav.php";?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="col-1">
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <h3 class="text-uppercase">Teacher Attendance Details&emsp;</h3>
                                            </div>
                                            <div class="col-md-8" style="margin-top:-2px;">
                                                    <h3>
                                                         <input type="text" id="teachersearch"
                                                           onkeyup="myFunction()"        placeholder="Search..." style="width:          80%;" required> 
                                                    </h3>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" >
                                        <thead>
                                            <tr style="font-weight: bold;" class="header">
                                                <th style="font-weight: bold;">Sr No.</th>
                                                <th style="font-weight: bold;">Teacher ID</th>
                                                <th style="font-weight: bold;">Teacher Name</th>
                                                <th style="font-weight: bold;">Attendance</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable"><?php $i=1; foreach($result  as $value):
                                            $teacherid =explode(",",$value->t_id); 
                                            $teachAbsentid =explode(",",$value->absent_teacher_attend_id); 
                                                $n = count($teacherid); 
                                                $n1 = count($teachAbsentid); 
                                                for($j=0;$j<$n;$j++){
                                            ?>
                                            <tr>
                                                <td><?php echo $i; $i++; ?></td>
                                                <td><a href="<?php echo site_url("Teacher_cont/teacherProfile/$teacherid[$j]") ?>"><?php echo $teacherid[$j]; ?></a></td>
                                                 <td><a href="<?php echo site_url("Teacher_cont/teacherProfile/$teacherid[$j]") ?>"><?php foreach($teacher_detail as $teacher){
                                                if($teacher->t_ID == $teacherid[$j]){
                                                    echo $teacher->t_name." ".$teacher->t_fathername." ".$teacher->t_surname;
                                                }
                                                
                                            } ?></a></td>
                                                <?php 
                                                    if(!empty(array_search($teacherid[$j],$teachAbsentid)) || array_search($teacherid[$j],$teachAbsentid)=== 0){
                                                
                                                ?>
                                               <td><font color="red"><?php echo "Absent"; ?></font></td>
                                                <?php }
                                                else {
                                                    ?>
                                                <td><font color="green"><?php echo "Present"; ?></font></td>
                                                <?php } ?>
                                            </tr><?php } endforeach; ?>
                                        </tbody>
                                    </table>    
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <style> 
input[id=teachersearch] {
    width: 5px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 50px;
    font-size: 16px;
    background-color: white;
    background-image: url('<?php echo base_url()?>assets/icon/search.png');
    background-position: 7px 1px; 
    background-repeat: no-repeat;
    background-size: 21px;
    padding-left: 35px;
}

input[id=studentsearch]:focus {
    width: 80%;
}
</style> 
<?php include "footer.php";?>
<?php include "addModel.php";?>
<?php include "script_include.php";?>