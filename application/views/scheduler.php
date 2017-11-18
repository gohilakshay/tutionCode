<html>   
    <?php include_once "scheduler_script.php" ?>
<?php include_once "header.php";?>
<?php $page = 'one';include "sidebar.php";?>
<?php include_once "nav.php";?>
    <?php
    $dbname = $this->db->database;
      $name = 'db_config.php';
    $myfile = fopen("$name", "w") or die("Unable to open file!");
    if($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == "[::1]"){
    $file_write = '<?php $bdd = new PDO("mysql:host=localhost;dbname='.$dbname.'","root","");?>';
    }
    else if($_SERVER['SERVER_NAME'] == '139.59.183.48'){
        $file_write = '<?php $bdd = new PDO("mysql:host=localhost;dbname='.$dbname.'","root","N5sZmB2KTdI1");?>';
    }
    else{
       $file_write = '<?php $bdd = new PDO("mysql:host=localhost;dbname='.$dbname.'","root","N5sZmB2KTdI1");?>';
    }

    fwrite($myfile, $file_write);
    ?>
<style>
 #calendar {
  width: 100%;
  margin: 0 auto;
     background-color: white;
  }
</style>
   
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="card card-calendar">
                    <div class="card-content">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php include_once "footer.php";?>
</html>