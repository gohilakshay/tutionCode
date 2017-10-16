<html>   
    <?php include_once "scheduler_script.php" ?>
<?php include_once "header.php";?>
<?php $page = 'one';include "sidebar.php";?>
<?php include_once "nav.php";?>
    <?php
    $dbname = $this->db->database;
      $name = 'db_config.php';
    $myfile = fopen("$name", "w") or die("Unable to open file!");
     $file_write = '<?php $bdd = new PDO("mysql:host=localhost;dbname='.$dbname.'","root","");?>';
fwrite($myfile, $file_write);
    ?>
<style>
 body {
  text-align: center;
  font-size: 14px;
  font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
  }
 #calendar {
  width: 90%;
  margin: 0 auto;
     background-color: white;
  }
</style>



 <h2>Scheduler</h2>
 <br/>
 <div id='calendar'></div>
<?php include_once "footer.php";?>
</html>