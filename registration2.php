<?php
 $page = 'registration';
 require('include/header.php');
 if(isset($_GET['r_id'])){
  $r_id=$_GET['r_id'];

$query = "select * from registration LEFT JOIN background_info ON background_info.idregistration = registration.idregistration where registration.idregistration = $r_id";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$row = mysqli_fetch_array($result);
}
?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php require('include/sidebar.php'); ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Registration Form</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Registration Form</li>
                        </ol>
                        <div class="row m-1">
                            <div class="col-xl-4 col-md-4 border border-2 border-primary border p-2">
                                <h3>Learners Profile Form</h3>
                            </div>
                            <div class="col-xl-4 col-md-4 border border-2 border-primary border p-2 bg-primary">
                                <h3 style="color: white">Background Information</h3>
                            </div>
                            <div class="col-xl-4 col-md-4 border border-2 border-primary p-2">
                                <h3>Files and Credentials</h3>
                            </div>
                        </div>
                        
                        <br><br>
                        <div class="row">
                            <form method="post" action="processBackgroundInfo.php">
                            <div class="col-xl-9 col-md-12">
                                    <div class="row mb-3">
                                        <br><br>
                                        <input type="hidden" name="r_id" value="<?php if(isset($_GET['r_id'])){echo $_GET['r_id'];} ?>">
                                        <input type="hidden" name="type" value="<?php if($row['question1']==null && $row['question2']==null && $row['question3']==null){echo 'add';}else{echo 'edit';} ?>">
                                        <h4 class="breadcrumb-item active">Name: <span style="color:#0d6efd "><?php if(isset($row['lastname'])){echo $row['firstname']." ".$row['lastname'];} ?></span></h4>
                                        
                                    </div>
                                    <div class="row mb-3">
                                        <br>
                                        <h4 class="breadcrumb-item active">Unsay atong maayong makuha kon magtuon kita sa pag-uma ug humayan? Interesting ba kini alang kanimo?</h4>
                                        <div class="col-md-12">
                                            <div class="form-floating mb-12 mb-md-0 validate">
                                                <textarea name="question1" required class="form-control"><?php if(isset($row['question1'])){echo $row['question1'];} ?></textarea>
                                                <p class="req_lbl">*this field is required</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <br>
                                        <h4 class="breadcrumb-item active">Nganong nka desisyon man ka nga magtuon niini nga kurso?</h4>
                                        <div class="col-md-12">
                                            <div class="form-floating mb-12 mb-md-0 validate">
                                                
                                                <textarea name="question2" required class="form-control"><?php if(isset($row['question2'])){echo $row['question2'];} ?></textarea>
                                            
                                                <p class="req_lbl">*this field is required</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <br>
                                        <h4 class="breadcrumb-item active">Duna ba kini kalabtan sa imong kaugmaon ilabina sa imong pamilya?</h4>
                                        <div class="col-md-12">
                                            <div class="form-floating mb-12 mb-md-0 validate">
                                                
                                                <textarea name="question3" required class="form-control"><?php if(isset($row['question3'])){echo $row['question3'];} ?></textarea>
                                            <p class="req_lbl">*this field is required</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="d-flex align-items-right mt-12 mb-0">
                                            <a href="registration1.php?r_id=<?php echo $r_id; ?>" class="btn btn-primary btn-lg  mr-3" style="margin-right: 1rem;"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
                                            <button type="submit" class="btn btn-primary btn-lg float-right"><i class="fas fa-arrow-right"></i>&nbsp;Next</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
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
    </body>
</html>
<script>
    $(document).ready(function(){
        $('.validate').focusout(function(){
            let x = $(this)
            if($(this).find('textarea').val() != "")
            x.find('p').hide()
            else
            x.find('p').show()
        })
        $('.validate').each(function(){
            let x = $(this)
            if($(this).find('textarea').val() != "")
            x.find('p').hide()
            else
            x.find('p').show()
        })
    })
</script>