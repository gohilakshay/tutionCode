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
                                    <h3 class="text-uppercase">Student Details</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" >
                                        <thead>
                                            <tr style="font-weight: bold;">
                                                <td>Sr No.</td>
                                                <td>Student ID</td>
                                                <td>Attendance</td>
                                            </tr>
                                        </thead>
                                        <tbody><?php $i=1; foreach($result  as $value):
                                            $studid =explode(",",$value->stud_id); 
                                            $studAbsentid =explode(",",$value->absent_stud_id); 
                                                $n = count($studid); 
                                                for($j=0;$j<$n;$j++){
                                            ?>
                                            <tr>
                                                <td><?php echo $i; $i++; ?></td>
                                                <td><a href="<?php echo site_url("Student_cont/studentProfile/$studid[$j]") ?>"><?php echo $studid[$j]; ?></a></td>
                                                <?php if($studid[$j] == $studAbsentid[$j]){?>
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
  
<?php include "footer.php";?>
<?php include "addModel.php";?>
<?php include "script_include.php";?>