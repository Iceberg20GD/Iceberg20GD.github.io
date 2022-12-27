<?php
require('include/connection.php');
require('include/session.php');

$user_name = $_POST['user_name'];
$user_mobile = $_POST['user_mobile'];
$user_email = $_POST['user_email'];
$unique_pin = $_POST['unique_pin'];
$unique_pin_confirm = $_POST['unique_pin_confirm'];
$user_id = $_SESSION['user_id'];


if($unique_pin != $unique_pin_confirm){
    echo "<script type='text/javascript'>alert('Unique Pin Does Not Match!!!')
                history.back();</script>";
}else{
    $query = "SELECT * FROM user WHERE unique_pin='$unique_pin' AND user_id != $user_id LIMIT 1";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $row = mysqli_fetch_array($result);
    if (!empty($row[1])) {
        echo "<script type='text/javascript'>alert('Unique Pin Already Inuse!!!');
                history.back();</script>";
    }else{
        $query = "UPDATE user SET user_name = '$user_name', user_mobile = '$user_mobile', user_email='$user_email', unique_pin='$unique_pin' WHERE user_id=$user_id";
        if (mysqli_query($connection, $query)) {
            $_SESSION['user_name'] = $user_name;
        	$_SESSION['user_email']  = $user_email;
            $_SESSION['user_mobile']  = $user_mobile;
            $_SESSION['unique_pin']  = $unique_pin;
            
            echo "<script type='text/javascript'>alert('You updated your account.');
                    history.back();</script>";
        } else {
            echo "<script type='text/javascript'>alert('Error on updating!!');
                    history.back();</script>";
        }

        
    }
}


?>