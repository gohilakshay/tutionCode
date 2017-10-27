<?php
foreach($data as $value){
    $category = $value['category'];
    $pass = $value['value1'];
    $avg_pass = $value['value2'];
    $fail = $value['value3'];
    $test_detail = $value['test_detail'];
    $marks_detail = $value['marks_detail'];
    $marksStudEntery = $marks_detail[0];
}
?>
<?php include "header.php";?>
<?php $page='four';include "sidebar.php";?>
<?php include "nav.php";?>
<br>
<?php include"fusioncharts.php";?>
<div class="content">
    <div class="container-fluid">
       
      
        <div class="container-fluid">
            <div class="row">
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
                <div class="card">                               
                    <?php 
                    $arrData = array(
                        "chart" => array(
                        "subCaption"=> "Student Perfomance Graph",
                        "xAxisname"=> "Student ID",
                        "yAxisName"=> "Marks",
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
                    foreach($marks_detail as $value1):
                    if($value1->test_id == $category):
                    $stud_id = explode(",",$value1->stud_id);
                    foreach($stud_id as $id){
                        array_push($categoryArray, array(
                            "label" => $id
                        ));
                    }
                    $marks_obtained = explode(",",$value1->marks_obtained);
                    foreach($marks_obtained as $marks){
                        array_push($dataseries1, array(
                            "value" => $marks
                        ));
                    }
                    /*array_push($dataseries2, array(
                    "value" => 50
                    ));
                    array_push($dataseries3, array(
                    "value" => 60
                    ));*/
                    endif;endforeach;
                    $arrData["categories"]=array(array("category"=>$categoryArray));
                    // creating dataset object
                    $arrData["dataset"] = array(array("seriesName"=> "Marks Obtained ", "data"=>$dataseries1)/*, array("seriesName"=> "Average",  "renderAs"=>"line", "data"=>$dataseries2),array("seriesName"=> "Failed",  "data"=>$dataseries3)*/);
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
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Test Details</h4>
                    </div>
                    <div class="content">
                        <?php foreach($test_detail as $value):?>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                <label>Test ID</label>
                                <input type="text" class="form-control border-input" name="testid" style="padding-left:10px; padding-right:10px;" value="<?php echo $category ; ?>" required readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Batch Name</label>
                                    <input type="text" class="form-control border-input" name="batchname" value="<?php echo $value->batch_id;?>" required readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control border-input" name="subject" value="<?php  echo $value->subject_name; ?>" required readonly>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Supervisor Name</label>
                                    <input type="text" class="form-control border-input" name="supervisorname" value="<?php  echo $value->supervisor_name; ?>" required readonly>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Test Date</label>
                                    <input type="text" class="form-control border-input" name="testdate" value="<?php echo $value->test_date; ?>" required readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Test Time</label>
                                    <input type="text" class="form-control border-input" name="testtime" value="<?php  echo $value->test_time;  ?>" required readonly>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>Total</label>
                                    <input type="text" class="form-control border-input" name="totalmarks" style="padding-left:10px; padding-right:10px;" value="<?php    echo $value->total_marks; ?>" required readonly>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>Passing</label>
                                    <input type="text" class="form-control border-input" name="passingmarks" style="padding-left:10px; padding-right:10px;" value="<?php  echo $value->passing_marks; ?>" required readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <label>Total Pass</label>
                                <input type="text" class="form-control border-input" name="testid" value="<?php echo $pass ; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <label>Total Fail</label>
                                <input type="text" class="form-control border-input" name="testid" value="<?php echo $fail ; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <label>Average Pass</label>
                                <input type="text" class="form-control border-input" name="testid" value="<?php echo $avg_pass ; ?>" required>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div><hr>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="col-1">
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden" style="overflow:auto;">
                                <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                    <h3 class="text-uppercase">Student Details</h3>
                                </div>
                                <?php
                                // to get the id and marks of student in diffrent array
                                foreach($categoryArray as $ids){
                                    $studIds[] = $ids['label'];
                                }
                                foreach($dataseries1 as $marks){
                                    $studMarks[] = $marks['value'];
                                }
                                $idCount=count($studIds);
                                $globalCount = 1;
                                $localCount = 0;
                                $visistedId = array(); // to check if id is repeated
                                $visistedAttempts = array(); // to check if id is repeated to make attempts
                                ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" >
                                        <thead>
                                            <tr style="font-weight: bold;">
                                                <td>Sr No.</td>
                                                <td>Student ID</td>
                                                <?php 
                                                $temp=0;
                                                for($i=0;$i<$idCount;$i++){
                                                    if(in_array($studIds[$i],$visistedAttempts)){
                                                       $globalCount++;
                                                        $local++;
                                                        if($local > $globalCount){
                                                            $temp = $local;
                                                            $local = $globalCount;
                                                            $globalCount = $temp;
                                                        }
                                                    }
                                                    else{
                                                       // $globalCount++;
                                                        $local=0;
                                                        array_push($visistedAttempts,$studIds[$i]);
                                                        
                                                    }
                                                }
                                                for($k=0;$k<$globalCount;$k++){
                                                    $j=$k+1;
                                                    echo "<td>Marks Obtained (attempt $j)</td>";
                                                }
                                                
                                                ?>
                                             </tr>
                                        </thead>
                                        <tbody>
                                            <?php print_r($studMarks[$i]);
                                            for($i=0;$i<$idCount;$i++){
                                                $j = $i+1;
                                                                                        
                                                if(!in_array($studIds[$i],$visistedId)){
                                                    echo "<tr><td>$j</td>";
                                                    echo "<td>$studIds[$i]</td>";
                                                    array_push($visistedId,$studIds[$i]);
                                                    echo "<td>$studMarks[$i]</td>";
                                                }
                                                else{
                                                    echo "<td>$studMarks[$i]</td>";
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>    
                                </div> 
                            </div>
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