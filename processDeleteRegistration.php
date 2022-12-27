<?php
require('include/session.php');
require('include/connection.php');


if(isset($_POST['id'])){
    $r_id = $_POST['id'];
      $query = "DELETE registration, background_info, uploads
                FROM registration
                LEFT JOIN background_info ON registration.idregistration = background_info.idregistration
                LEFT JOIN uploads ON registration.idregistration = uploads.idregistration
                WHERE registration.idregistration = $r_id ";
    
    $n = "SELECT app_id FROM registration WHERE idregistration = $r_id";
    $n_query = mysqli_query($connection, $n) or die(mysqli_error($connection));
    $n_app = mysqli_fetch_array($n_query);
    $id = $_SESSION['user_id'];
    $i = $n_app['app_id'];
                                
      if (mysqli_query($connection, $query)) {
        mysqli_query($connection,"INSERT INTO log SET user_id = $id,  content = 'Action: Delete Application; Application ID: $i;'") or die(mysqli_error($connection));
          echo "<script type='text/javascript'>alert('Registration Successfully Deleted');
                  window.location.href = \"TableRegistration.php\";</script>";
      } else {
          echo "<script type='text/javascript'>alert('Error Deleting!!');
                  window.location.href = \"TableRegistration.php\";</script>";
      }
}



mysqli_close($connection);


?>