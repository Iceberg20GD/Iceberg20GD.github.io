<?php
session_start();
require('include/connection.php');
$target_dir = "uploads/";
$r_id=$_POST['r_id'];
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check == false) {
    $uploadOk = 1;
  } else {
    echo "<script type='text/javascript'>alert('File is invalid');
                  window.location.href = \"registration3.php?r_id=$r_id\";</script>";
    $uploadOk = 0;
  }
}


// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "<script type='text/javascript'>alert('File is too large');
    window.location.href = \"registration3.php?r_id=$r_id\";</script>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "pdf" ) {
    echo "<script type='text/javascript'>alert('Sorry, only JPG, JPEG, PNG, GIF & PDF files are allowed');
                  window.location.href = \"registration3.php?r_id=$r_id\";</script>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
$temp = explode(".", $_FILES["fileToUpload"]["name"]);
$newfilename = round(microtime(true)) ."_".$r_id.mt_rand(0,99999999999). '.' . end($temp);
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$newfilename)) {

    $type = $_POST['uploadtype'];
    $query = "select * from uploads where idregistration = $r_id";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $numrow = mysqli_num_rows($result);
    if($numrow == 0){
        mysqli_query($connection, "INSERT INTO uploads(idregistration,$type) VALUES($r_id,'$newfilename') ") or die(mysqli_error($connection));
    }else{
        mysqli_query($connection, "UPDATE uploads SET $type = '$newfilename' WHERE idregistration = $r_id") or die(mysqli_error($connection));
    }
    echo "<script type='text/javascript'>
                  window.location.href = \"registration3.php?r_id=$r_id\";</script>";
  } else {
    echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file');
                  window.location.href = \"registration3.php?r_id=$r_id\";</script>";
  }
}


?>