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
                                                <td>Attend Date</td>
                                                <td>Timing</td>
                                            </tr>
                                        </thead>
                                        <tbody><?php $i=1; foreach($result  as $value): ?>
                                            <tr>
                                                <td><?php echo $i; $i++; ?></td>
                                                <td><a href="<?php echo site_url().'/Attendance_cont/viewTeacherAttendanceDetail/'.$value->t_attend_ID; ?>"><?php echo $value->date; ?></a></td>
                                               <td><?php echo $value->timing; ?></td>
                                            </tr><?php endforeach; ?>
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