<?php  
session_start();
require('include/connection.php');
date_default_timezone_set('Asia/Manila');
if(!isset($_SESSION['attempt'])){
    $_SESSION['attempt'] = 0;
}
if($_SESSION['attempt'] == 3){
    echo json_encode(array('status'=>'limit','attempt_again'=>date("m-d-Y H:").date("i:s",$_SESSION['attempt_again'])." GMT+0800 (Philippine Standard Time)"));
}else{
    if (isset($_POST['unique_pin'])){
        // Assigning POST values to variables.
        $unique_pin = $_POST['unique_pin'];
        
        // CHECK FOR THE RECORD FROM TABLE
        $query = "SELECT * FROM `user` WHERE unique_pin='$unique_pin'";
         
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        $count = mysqli_num_rows($result);
        $array = mysqli_fetch_array($result);
        if ($count == 1){
            if($array['user_status'] == 0){
                echo json_encode(array('status'=>'inactive'));
            }else{
            
                        $_SESSION['user_name'] = $array['user_name'];
                        $_SESSION['user_email']  = $array['user_email'];
                        $_SESSION['user_mobile']  = $array['user_mobile'];
                        $_SESSION['unique_pin']  = $array['unique_pin'];
                        $_SESSION['user_status']  = $array['user_status'];
                        $_SESSION['role']  = $array['role'];
                        $_SESSION['user_id']  = $array['user_id'];
                        unset($_SESSION['attempt']);
                        $id = $_SESSION['user_id'];
                        mysqli_query($connection,"INSERT INTO log SET user_id = $id,  content = 'Action: User login;'") or die(mysqli_error($connection));
                if($_SESSION['role']!='applicant'){
                    echo json_encode(array('status'=>'success','role'=>'admin'));
                }else{
                    echo json_encode(array('status'=>'success','role'=>'applicant'));
                }  
            }
        
      
                                        
        }else{
            $_SESSION['attempt'] += 1;
            if($_SESSION['attempt'] == 3){
                $_SESSION['attempt_again'] = time() + (15*60);
                echo json_encode(array('status'=>'limit','attempt_again'=>date("m-d-Y H:").date("i:s",$_SESSION['attempt_again'])." GMT+0800 (Philippine Standard Time)"));
            }else{
                echo json_encode(array('status'=>'incorrect','attempt'=>$_SESSION['attempt']));
            }
        }
    }
}

?>