<!-- <?php include "header.php";?> <!-- -->
<?php $page = 'ten';include "sidebar.php";?>
<?php include "nav.php";?>
<?php include"fusioncharts.php";?>
 
    <html>

    <head>
       
        <title>Fusion charts</title>
        <!-- <script src="<?php echo base_url(); ?>assets/js/bar2.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bar1.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bar.js"></script> -->
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
            "caption"=> "Made By Ubaid Mukati",
            "subCaption"=> "Student Perfomance Graph",
            "xAxisname"=> "Subject",
            "yAxisName"=> "Marks",
            "numberPrefix"=> "",
            "exportEnabled" =>"1",
            "yAxisMaxValue"=> "100",
            "legendItemFontColor"=> "#666666",
            "theme"=> "zune"
            )
          );

    // //       // creating array for categories object

          $categoryArray=array();
          $dataseries1=array();
          $dataseries2=array();
          $dataseries3=array();
          
          $res = $this->db->query("SELECT DISTINCT category,value1,value2,value3 FROM  `bar`");
          foreach ($res->result_array() as $row) {
            array_push($categoryArray, array(
            "label" => $row["category"]
          )
        );
        array_push($dataseries1, array(
          "value" => $row["value1"]
          )
        );

        array_push($dataseries2, array(
          "value" => $row["value2"]
          )
        );
        array_push($dataseries3, array(
          "value" => $row["value3"]
          )
        );
       

      }      
        


      $arrData["categories"]=array(array("category"=>$categoryArray));
      // creating dataset object
      $arrData["dataset"] = array(array("seriesName"=> "Highest ", "data"=>$dataseries1), array("seriesName"=> "Student Marks",  "renderAs"=>"line", "data"=>$dataseries2),array("seriesName"=> "Average",  "data"=>$dataseries3));


      /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */
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
</div>

                           
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">       
                                
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" >
                                        <thead>
                                            <tr style="font-weight: bold;">
                                                <td>Sr No.</td>
                                                <td>Student ID</td>
                                                <td>Student Name</td>
                                                <td>Exam</td>
                                                <td>Highest Marks</td>
                                                <td>Obtained Marks</td>
                                                <td>Average Marks</td>
                                                <td>% Obatined</td>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                      


                                              <?php $i=1; ?> 
                                            <tr> <?php foreach ($result2 as $value):?> 
                                                <td><?php echo $i++; ?></td>
                                                <td>  <?php foreach ($result1 as $key ) {
                                                echo  $key->stud_ID;
                                                } ?></td>
                                                <td><a href="<?php echo site_url("Student_cont/studentProfile") ?>
                                                "><?php echo $key->stud_name; ?></a></td>
                                                <td> <?php  
                                                    echo $value['category'];
                                                   ?>  </td>
                                                <td><?php echo $value['value1']; ?></td>
                                                <td><?php echo $value['value2']?></td>
                                                <td><?php echo $value['value3']?></td>
                                                <td>45.00%</td>
                                               
                                            </tr>  <?php endforeach; ?>
                                           <!--  <tr>
                                                <td>2.</td>
                                                <td>102</td>
                                                <td><a href="#">Bill</a></td>
                                                <td>Regular</td>
                                                <td>8659321456</td>
                                                <td>12th</td>
                                                <td>XII-science</td>
                                                <td>Universal</td>
                                                
                                            </tr> -->
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