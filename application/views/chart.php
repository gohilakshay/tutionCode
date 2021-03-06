<?php include "header.php";?> 
<?php $page = 'nine';include "sidebar.php";?>
<?php include "nav.php";?>
<?php include"fusioncharts.php";?>
 
<html>
    <head>     
        <title>Performance charts</title>
    </head>
   
    <div class="content">
       <div class="container-fluid">
         <div class="row">
            <a href="<?php echo site_url("Student_cont/student") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-center">
                                    <img src="<?php echo base_url()?>assets/icon/students.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Student</p>
                                </div>
                            </div>
                        </div>
                        <div class="footer"><hr>
                            <div class="stats">
                                <a href="<?php echo site_url("Student_cont/addStudent") ?>" >
                                    <i class="ti-plus"></i> Add Student
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a href="<?php echo site_url("Test_cont/addTest") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-center">
                                    <img src="<?php echo base_url()?>assets/icon/test.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Test Marks</p>
                                    <!--Marks-->
                                </div>
                            </div>
                        </div>
                        <div class="footer"><hr>
                            <div class="stats">
                                <a href="<?php echo site_url("Marks_cont/addMarks") ?>" >   
                                    <i class="ti-plus"></i> Add Marks
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a href="<?php echo site_url("Attendance_cont/viewStudentAttendance") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-success text-center">
                                    <img src="<?php echo base_url()?>assets/icon/present.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>View Attendance</p>
                                   <!--Present-->
                                </div>
                            </div>
                        </div>
                        <div class="footer"><hr>
                            <div class="stats">
                                <a href="<?php echo site_url("Attendance_cont/markStudentAttendance") ?>">
                                    <i class="ti-plus"></i> Mark Attendance
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
             <a  href="<?php echo site_url()."/Bar_cont/bar" ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content" style="box-shadow: 0 2px 2px rgb(128, 191, 209)!important;">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-info text-center">
                                    <img src="<?php echo base_url()?>assets/icon/performance.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Performance</p>
                                    <!--Details-->
                                </div>
                            </div>
                        </div>
                        <div class="footer"><hr>
                            <div class="stats">
                                 <a href="<?php echo site_url()."/Bar_cont/bar" ?>">
                                    <i class="ti-plus"></i> view Performance 
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </a>
        </div>
<!--
            <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                    <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;     border-color: #9fcedc;">
                        <h3 class="text-uppercase" style="margin-top: 10px;">View Performance</h3>
                    </div>
                </div>
            </div>
        </div>
-->
           
            <div class="row">
                <div class="card">                               
                    <?php 
                    $arrData = array(
                        "chart" => array(
                        "subCaption"=> "Student Perfomance Graph",
                        "xAxisname"=> "Test",
                        "yAxisName"=> "Total",
                        "numberPrefix"=> "",
                        "exportEnabled" =>"1",
                        "yAxisMaxValue"=> "100",
                        "legendItemFontColor"=> "#666666",
                        "theme"=> "zune"
                    )
                    );
                    // creating array for categories object
                    $categoryArray=array();
                    $dataseries1=array();
                    $dataseries2=array();
                    $dataseries3=array(); 
                    foreach($result as $row){
                        array_push($categoryArray, array(
                            "label" => $row["category"]
                        ));
                        array_push($dataseries1, array(
                            "value" => $row["value1"]
                        ));

                        array_push($dataseries2, array(
                            "value" => $row["value2"]
                        ));
                        array_push($dataseries3, array(
                            "value" => $row["value3"]
                        ));
                    }
                    $arrData["categories"]=array(array("category"=>$categoryArray));
                    // creating dataset object
                    $arrData["dataset"] = array(array("seriesName"=> "Pass ", "data"=>$dataseries1), array("seriesName"=> "Average",  "renderAs"=>"line", "data"=>$dataseries2),array("seriesName"=> "Failed",  "data"=>$dataseries3));
                    /*JSON Encode the data to retrieve the string containing the JSON representation of     the data in the array. */
                    $jsonEncodedData = json_encode($arrData);
                    // chart object
                    $msChart = new FusionCharts("mscombi2d", "chart1" , "600", "350", "chart-container", "json", $jsonEncodedData);

                    // Render the chart
                    $msChart->render();
      
                    ?>  
                    <center>
                        <div id="chart-container">Chart will render here</div>
                    </center>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="card">                     
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" >
                            <thead>
                                <tr style="font-weight:bold;">
                                    <td>Sr No.</td>
                                    <td>Test ID</td>
                                    <td>Test Date</td>
                                    <td>Test Time</td>
                                    <td>Batch ID</td>
                                    <td>Total Marks</td>
                                    <td>Passing Marks</td>
                                    <td>Supervisor Name</td>
                                    <td>Subject Name</td>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php $i=$offset;
                                    foreach($reult1 as $v):
                                ?> 
                                <tr>
                                    <td><?php $i++;echo $i;?></td>
                                    <td><a href="<?php echo site_url();?>/Test_cont/TestMarkDetail/<?php echo $v->test_ID;?>"><?php echo $v->test_ID; ?></a></td>
                                    <td><?php echo $v->test_date; ?></td>
                                    <td><?php echo $v->test_time; ?> </td>
                                    <td><?php echo $v->batch_id; ?></td>
                                    <td><?php echo $v->total_marks;?></td>
                                    <td><?php echo $v->passing_marks;?></td>
                                    <td><?php echo $v->supervisor_name;?></td>
                                    <td><?php echo $v->subject_name;?></td>
                                              
                                </tr>  <?php endforeach; ?>
                            </tbody>
                        </table> 
                        <center>
                            <ul class="pagination">
                                <!-- Show pagination links -->
                                <?php
                                foreach ($links as $link) {
                                          
                                    echo "<li>" . $link . "</li>";
                                }
                                ?>
                            </ul>
                        </center>
                    </div>                                 
                </div>
            </div>
        </div>
    </div>
<!--
    <style> 
input[id=studentsearch] {
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
-->
<?php include_once "footer.php";?>
   
<?php include_once "script_include.php";?>
</html>