<?php
require('include/session.php');
require('include/connection.php');

$uli = $_POST['uli'];
$course = $_POST['course'];
$entrydate = $_POST['entrydate'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$name_ext = $_POST['name_ext'];
$street = $_POST['street'];
$barangay = $_POST['barangay'];
$district = $_POST['district'];
$city = $_POST['city'];
$province = $_POST['province'];
$region = $_POST['region'];
$emailfacebook = $_POST['emailfacebook'];
$contactno = $_POST['contactno'];
$nationality = $_POST['nationality'];
$gender = $_POST['gender'];
$civilstatus = $_POST['civilstatus'];
$employment_status = $_POST['employment_status'];
$employment_type = $_POST['employment_type'];
$birthdate = $_POST['birthdate'];
$birthcity = $_POST['birthcity'];
$birthprovince = $_POST['birthprovince'];
$birthregion = $_POST['birthregion'];
$educationalattainment = $_POST['educationalattainment'];
$parent = $_POST['parent'];
$parentaddress = $_POST['parentaddress'];
$user_id = $_SESSION['user_id'];

if($_POST['r_id']==null){
      $n = "SELECT idregistration FROM registration";
      $n_query = mysqli_query($connection, $n) or die(mysqli_error($connection));
      $n_app = 1 + mysqli_num_rows($n_query);
      if(strlen($n_app)==1){
            $i = date('Ymd')."-00000".$n_app;
      }else if(strlen($n_app)==2){
            $i = date('Ymd')."-0000".$n_app;
      }else if(strlen($n_app)==3){
            $i = date('Ymd')."-000".$n_app;
      }else if(strlen($n_app)==4){
            $i = date('Ymd')."-00".$n_app;
      }else if(strlen($n_app)==5){
            $i = date('Ymd')."-0".$n_app;
      }else if(strlen($n_app)==6){
            $i = date('Ymd')."-".$n_app;
      }
      $query = "INSERT INTO `olreg`.`registration`
                        (`app_id`,
                        `firstname`,
                        `middlename`,
                        `lastname`,
                        `name_ext`,
                        `uli`,
                        `course`,
                        `entrydate`,
                        `street`,
                        `barangay`,
                        `district`,
                        `city`,
                        `province`,
                        `region`,
                        `emailfacebook`,
                        `contactno`,
                        `nationality`,
                        `gender`,
                        `civilstatus`,
                        `employment_status`,
                        `employment_type`,
                        `birthdate`,
                        `birthcity`,
                        `birthprovince`,
                        `birthregion`,
                        `educationalattainment`,
                        `parent`,
                        `parentaddress`,
                        `user_id`)
                        VALUES
                        ('$i',
                        '$firstname',
                        '$middlename',
                        '$lastname',
                        '$name_ext',
                        '$uli',
                        '$course',
                        '$entrydate',
                        '$street',
                        '$barangay',
                        '$district',
                        '$city',
                        '$province',
                        '$region',
                        '$emailfacebook',
                        '$contactno',
                        '$nationality',
                        '$gender',
                        '$civilstatus',
                        '$employment_status',
                        '$employment_type',
                        '$birthdate',
                        '$birthcity',
                        '$birthprovince',
                        '$birthregion',
                        '$educationalattainment',
                        '$parent',
                        '$parentaddress',
                        '$user_id')";

                                
      if (mysqli_query($connection, $query)) {

            $id = $_SESSION['user_id'];
	      mysqli_query($connection,"INSERT INTO log SET user_id = $id,  content = 'Added Application: Application ID: $i'") or die(mysqli_error($connection));
            $query = "select idregistration as i from registration ORDER BY idregistration DESC LIMIT 1";
            $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
            $row = mysqli_fetch_array($result);
            $r_id = $row['i'];
          
          echo "<script type='text/javascript'>
                  window.location.href = \"registration2.php?r_id=$r_id\";</script>";
      } else {
          echo "<script type='text/javascript'>alert('Error Registering!!');
                  window.location.href = \"registration1.php\";</script>";
      }
}else{
      $r_id=$_POST['r_id'];

      $query = "UPDATE `olreg`.`registration`
                        SET
                        `firstname` = '$firstname',
                        `middlename` = '$middlename',
                        `lastname` = '$lastname',
                        `uli` = '$uli',
                        `course` = '$course',
                        `entrydate` = '$entrydate',
                        `street` = '$street',
                        `barangay` = '$barangay',
                        `district` = '$district',
                        `city` = '$city',
                        `province` = '$province',
                        `region` = '$region',
                        `emailfacebook` = '$emailfacebook',
                        `contactno` = '$contactno',
                        `nationality` = '$nationality',
                        `gender` = '$gender',
                        `civilstatus` = '$civilstatus',
                        `employment_status` = '$employment_status',
                        `employment_type` = '$employment_type',
                        `birthdate` = '$birthdate',
                        `birthcity` = '$birthcity',
                        `birthprovince` = '$birthprovince',
                        `birthregion` = '$birthregion',
                        `educationalattainment` = '$educationalattainment',
                        `parent` = '$parent',
                        `parentaddress` = '$parentaddress'
                        WHERE `idregistration` = '$r_id';
                        ";
      if (mysqli_query($connection, $query)) {
            $n = "SELECT app_id FROM registration WHERE idregistration = $r_id";
            $n_query = mysqli_query($connection, $n) or die(mysqli_error($connection));
            $n_app = mysqli_fetch_array($n_query);
            $id = $_SESSION['user_id'];
            $i = $n_app['app_id'];
	      mysqli_query($connection,"INSERT INTO log SET user_id = $id,  content = 'Action: Update Application; Application ID: $i;'") or die(mysqli_error($connection));
          echo "<script type='text/javascript'>
                  window.location.href = \"registration2.php?r_id=$r_id\";</script>";
      } else {
          echo "<script type='text/javascript'>alert('Error Updating!!$r_id');
                  window.location.href = \"registration1.php\";</script>";
      }
}


mysqli_close($connection);


?>