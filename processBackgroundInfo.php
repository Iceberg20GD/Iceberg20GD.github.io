<?php
require('include/session.php');
require('include/connection.php');

$question1 = $_POST['question1'];
$question2 = $_POST['question2'];
$question3 = $_POST['question3'];
$r_id = $_POST['r_id'];
$type = $_POST['type'];

if($type == "add"){
      $query = "INSERT INTO `olreg`.`background_info`
                  (`idregistration`,
                  `question1`,
                  `question2`,
                  `question3`)
                  VALUES
                  ('$r_id',
                  '$question1',
                  '$question2',
                  '$question3');
                  ";
      if (mysqli_query($connection, $query)) {

          
          echo "<script type='text/javascript'>
                  window.location.href = \"registration3.php?r_id=$r_id\";</script>";
      } else {
          echo "<script type='text/javascript'>alert('Error Adding!!');
                  </script>";
      }
}else{
      $query = "UPDATE `olreg`.`background_info`
                  SET
                  `question1` = '$question1',
                  `question2` = '$question2',
                  `question3` = '$question3'
                  WHERE `idregistration` = '$r_id';
                  ";
      if (mysqli_query($connection, $query)) {

          
          echo "<script type='text/javascript'>
                  window.location.href = \"registration3.php?r_id=$r_id\";</script>";
      } else {
          echo "<script type='text/javascript'>alert('Error Adding!!');
                  window.location.href = \"registration2.php?r_id=$r_id\";</script>";
      }
}
 

mysqli_close($connection);


?>