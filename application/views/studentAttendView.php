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
                                                <h3 class="text-uppercase">Student Details&emsp;</h3>
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
                                            <tr style="font-weight: bold;">
                                                <td>Sr No.</td>
                                                <td>Attend Date</td>
                                                <td>Batch ID</td>
                                                <td>Faculty Name</td>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable"><?php $i=1; foreach($result  as $value): ?>
                                            <tr>
                                                <td><?php echo $i; $i++; ?></td>
                                                <td><a href="<?php echo site_url().'/Attendance_cont/viewAttendanceDetail/'.$value->attend_ID; ?>"><?php echo $value->attend_date; ?></a></td>
                                                <td><?php echo $value->batch_id; ?></td>
                                                <td><?php echo $value->faculty_name; ?></td>
                                                
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
<?php include "addModel.php";?>
<?php include "script_include.php";?>