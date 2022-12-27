<?php
require('include/connection.php');
$user_name = $_POST['user_name'];
$user_mobile = $_POST['user_mobile'];
$user_email = $_POST['user_email'];
$unique_pin = $_POST['unique_pin'];
$unique_pin_confirm = $_POST['unique_pin_confirm'];

if($unique_pin != $unique_pin_confirm){
    echo "<script type='text/javascript'>alert('Unique Pin Does Not Match!!!')
                    window.location.href = \"register.php\";</script>";
}else{
    $query = "SELECT * FROM user WHERE unique_pin='$unique_pin' LIMIT 1";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $row = mysqli_fetch_array($result);
    if (!empty($row[1])) {
        echo "<script type='text/javascript'>alert('Unique Pin Already Inuse!!!');
                    window.location.href = \"register.php\";</script>";
    }else{
        $query = "INSERT INTO user (user_name,
                        user_mobile,
                        user_email,
                        unique_pin)
                    VALUES ('$user_name','$user_mobile', '$user_email', '$unique_pin')";
        if (mysqli_query($connection, $query)) {
            $n = "SELECT * FROM user ORDER BY user_id DESC LIMIT 1";
            $n_query = mysqli_query($connection, $n) or die(mysqli_error($connection));
            $n_app = mysqli_fetch_array($n_query);
            $id = $n_app['user_id'];
            $u = $n_app['user_name'];
            mysqli_query($connection,"INSERT INTO log SET user_id = $id,  content = 'Action: Register New User; User ID: $id; Username: $u;'") or die(mysqli_error($connection));
            echo "<script type='text/javascript'>alert('You Successfully Created an Account.');
                    window.location.href = \"login.php\";</script>";
        } else {
            echo "<script type='text/javascript'>alert('Error On Registering!!');
                    window.location.href = \"register.php\";</script>";
        }

        
    }
}


?>