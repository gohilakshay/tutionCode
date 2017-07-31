<!-- <?php include "header.php";?> <!-- -->
<?php $page = 'ten';include "sidebar.php";?>
<?php include "nav.php";?>
<?php include"fusioncharts.php";?>
 
<html>
    <head>     
        <title>Performance charts</title>
    </head>
    <script src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
    <script src="http://static.fusioncharts.com/code/latest/fusioncharts.charts.js"></script>
    <script src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.zune.js"></script>
    <div class="content">
        <div class="container-fluid">
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
                                <tr style="font-weight: bold;">
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
                                
                                <?php $i=1; 
                                    foreach($result as $value):
                                    $test = $value["test_detail"];
                                    foreach($test as $v):
                                ?> 
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><a href="<?php echo site_url();?>/Test_cont/TestMarkDetail/<?php echo $v->test_ID;?>"><?php echo $v->test_ID; ?></a></td>
                                    <td><?php echo $v->test_date; ?></td>
                                    <td><?php echo $v->test_time; ?>  </td>
                                    <td><?php echo $v->batch_id; ?></td>
                                    <td><?php echo $v->total_marks;?></td>
                                    <td><?php echo $v->passing_marks;?></td>
                                    <td><?php echo $v->supervisor_name;?></td>
                                    <td><?php echo $v->subject_name;?></td>
                                              
                                </tr>  <?php endforeach; break;endforeach; ?>
                            </tbody>
                        </table>    
                    </div>                                 
                </div>
            </div>
        </div>
    </div>
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
<?php include_once "footer.php";?>
<?php include_once "script_include.php";?>
</html>