<?php
session_start();
require('include/connection.php');
if (isset($_SESSION['user_id'])){
    echo "<script type='text/javascript'>
            window.location.href = \"index.php\";</script>";

}
date_default_timezone_set('Asia/Manila');
if(isset($_SESSION['attempt_again'])){
    $now = time();
    if($now >= $_SESSION['attempt_again']){
        unset($_SESSION['attempt']);
        unset($_SESSION['attempt_again']);
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="icon" href="assets/img/tesda.png" />
        <meta name=
        "description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="assets/fontawesome/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">MUFDA Farm School Online Enrolment</h3></div>
                                    <div class="card-body">
                                        <form id="login-frm">
                                        <?php 
                                                //unset($_SESSION['attempt']);
                                                //unset($_SESSION['attempt_again']);
                                                if(isset($_SESSION['attempt'])) {
                                                if($_SESSION['attempt'] == 3) {
                                            ?>
                                                <div class='alert alert-danger err_msg'><i class='fa fa-exclamation-triangle'></i> Login attempt limit. Try after <i id="timer"></i></div>
                                            <?php
                                                }else{
                                                ?>
                                                <div class='alert alert-danger err_msg'><i class='fa fa-exclamation-triangle'></i> Unique Pin does'nt match any registered user. You only have <?php echo 3 - $_SESSION['attempt']; ?> attempt left.</div>
                                            <?php } } ?>
                                            
                                            <div class="form-floating mb-3">
                                                <input name="unique_pin" class="form-control" id="inputPassword" type="password"  minlength="6" required maxlength="8" placeholder="Enter Your Unique Pin Code" />
                                                <label for="inputPassword">Enter Your Unique Pin Code</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="">Forgot Pin?</a>
                                                <button class="btn btn-primary" type="submit" >Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">If you still don't have a Unique Pin, Please Sign Up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
            <?php include("include/footer.php") ?>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="js/chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="js/simple-datatables.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="js/jquery.min.js"></script>
        <script>
  $(document).ready(function(){

    $('#login-frm').submit(function(e){
      e.preventDefault()
      if($('.err_msg').length > 0)
        $('.err_msg').remove()
      $.ajax({
        url:'processLogin.php',
        method:'POST',
        data:$(this).serialize(),
        error:err=>{
          console.log(err)

        },
        success:function(resp){
          if(resp){
            resp = JSON.parse(resp)
            if(resp.status == 'success'){
                if(resp.role == 'applicant'){
                    location.replace('index.php')
                }else{
                    location.replace('admin/index.php')
                }
            }else if(resp.status == 'incorrect'){
              var attempt = 3 - resp.attempt
              if(attempt > 1){
                attempt += " attempts"
              }else{
                attempt += " attempt"
              }
              var _frm = $('#login-frm')
              var _msg = "<div class='alert alert-danger err_msg'><i class='fa fa-exclamation-triangle'></i> Unique Pin does'nt match any registered user. You only have "+attempt+" left.</div>"
              _frm.prepend(_msg)
              _frm.find('input').addClass('is-invalid')
              $('[name="unique_pin"]').val("")
              $('[name="unique_pin"]').focus()
            }else if(resp.status == 'limit'){
              var attempt_again = resp.attempt_again
              var _frm = $('#login-frm')
              var _msg = "<div class='alert alert-danger err_msg'><i class='fa fa-exclamation-triangle'></i> Login attempt limit. Try after <i id=\"timer\"></i></div>"
              _frm.prepend(_msg)
              _frm.find('input').addClass('is-invalid')
              $('[name="unique_pin"]').val("")
              $('[name="unique_pin"]').focus()
              Timer(attempt_again)
            }else if(resp.status == 'inactive'){
              var _frm = $('#login-frm')
              var _msg = "<div class='alert alert-danger err_msg'><i class='fa fa-exclamation-triangle'></i> This User is set by the Admin as Inactive. Try to contact the Administrator.<i id=\"timer\"></i></div>"
              _frm.prepend(_msg)
              _frm.find('input').addClass('is-invalid')
              $('[name="unique_pin"]').val("")
              $('[name="unique_pin"]').focus()
            }
          }
        }
      })
    })

  })

function Timer(y){
  var countDownDate = new Date(y).getTime();
  var x = setInterval(function() {

  var now = new Date().getTime();

  var distance = countDownDate - now;

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("timer").innerHTML = minutes + "m " + seconds + "s ";
  if (distance <= 0) {
    clearInterval(x);
    location.reload();
  }
  }, 1000);
}
<?php 
if(isset($_SESSION['attempt'])) {
  if($_SESSION['attempt'] == 3) {
?>    
Timer("<?php echo date("m-d-Y H:").date("i:s",$_SESSION['attempt_again'])." GMT+0800 (Philippine Standard Time)"; ?>"); 
$('#login-frm').find('input').addClass('is-invalid');
$('[name="unique_pin"]').focus();
<?php } } ?>
</script>
    </body>
</html>
