<?php
 $page = 'registration';
 require('include/header.php');
 if(isset($_GET['r_id'])){
  $r_id=$_GET['r_id'];

$query = "select * from registration LEFT JOIN uploads ON uploads.idregistration = registration.idregistration where registration.idregistration = $r_id";
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
                            <div class="col-xl-4 col-md-4 border border-2 border-primary border p-2">
                                <h3>Background Information</h3>
                            </div>
                            <div class="col-xl-4 col-md-4 border border-2 border-primary p-2 bg-primary">
                                <h3 style="color:white;">Files and Credentials</h3>
                            </div>
                        </div>
                        <div class="row">
                            <form method="post" action="processUploads.php" enctype="multipart/form-data">
                                <div class="col-xl-12 col-md-12">
                                    <div class="row mb-3">
                                    <br><br>
                                        <input type="hidden" name="r_id" value="<?php if(isset($_GET['r_id'])){echo $_GET['r_id'];} ?>">
                                        <h4 class="breadcrumb-item active">Name: <span style="color:#0d6efd "><?php if(isset($row['lastname'])){echo $row['firstname']." ".$row['lastname'];} ?></span></h4>
                                        
                                    </div>
                                    <div class="row mb-3">
                                        <h4 class="breadcrumb-item active">Upload Files</h4>
                                        <div class="col-md-7">
                                            <div class="form-floating">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>ID Picture with white background waering wight shirt with collar</td>
                                                        
                                                        <?php if(!isset($row['idpicture'])){ ?>
                                                        <td width="10%" style="color: red; text-align: center;">
                                                        <i class="fas fa-x"></i>
                                                        <?php } else { ?>
                                                            <td width="10%" style="color: green; text-align: center;">
                                                        <a href="uploads/<?php echo $row['idpicture']; ?>" download><i class="fas fa-download"></i></a>
                                                        <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Brangay Good Moral Certificate</td>
                                                        <?php if(!isset($row['goodmoral'])){ ?>
                                                        <td width="10%" style="color: red; text-align: center;">
                                                        <i class="fas fa-x"></i>
                                                        <?php } else { ?>
                                                            <td width="10%" style="color: green; text-align: center;">
                                                            <a href="uploads/<?php echo $row['goodmoral']; ?>" download><i class="fas fa-download"></i></a>
                                                        <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>PSA/NSO Birth Certificate/Barangay Certification</td>
                                                        <?php if(!isset($row['birthcertificate'])){ ?>
                                                        <td width="10%" style="color: red; text-align: center;">
                                                        <i class="fas fa-x"></i>
                                                        <?php } else { ?>
                                                            <td width="10%" style="color: green; text-align: center;">
                                                            <a href="uploads/<?php echo $row['birthcertificate']; ?>" download><i class="fas fa-download"></i></a>
                                                        <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>RSBSA Reference Number</td>
                                                        <?php if(!isset($row['rsbsa'])){ ?>
                                                        <td width="10%" style="color: red; text-align: center;">
                                                        <i class="fas fa-x"></i>
                                                        <?php } else { ?>
                                                            <td width="10%" style="color: green; text-align: center;">
                                                            <a href="uploads/<?php echo $row['rsbsa']; ?>" download><i class="fas fa-download"></i></a>
                                                        <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>College or High School Diploma (not required)</td>
                                                        <?php if(!isset($row['diploma'])){ ?>
                                                        <td width="10%" style="color: red; text-align: center;">
                                                        <i class="fas fa-x"></i>
                                                        <?php } else { ?>
                                                            <td width="10%" style="color: green; text-align: center;">
                                                            <a href="uploads/<?php echo $row['diploma']; ?>" download><i class="fas fa-download"></i></a>
                                                        <?php } ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-floating">
                                                <input name="fileToUpload" class="form-control" type="file" placeholder="Enter your last name" />
                                                <p class="breadcrumb-item active">Select File to Upload</p>
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select name="uploadtype" class="form-control"  id="inputFirstName" required>
                                                        <option></option>
                                                        <option value="idpicture">ID Picture with white background waering wight shirt with collar</option>
                                                        <option value="goodmoral">Brangay Good Moral Certificate</option>
                                                        <option value="birthcertificate">PSA/NSO Birth Certificate/Barangay Certification</option>
                                                        <option value="rsbsa">RSBSA Reference Number</option>
                                                        <option value="diploma">College or High School Diploma (not required)</option>
                                                    </select>
                                                    <label for="inputFirstName">Select Type</label>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-sm float-right mt-2"><i class="fas fa-upload"></i>&nbsp;Upload</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="d-flex align-items-right mt-12 mb-0">
                                            <a href="registration2.php?r_id=<?php echo $r_id; ?>" class="btn btn-primary btn-lg  mr-3" style="margin-right: 1rem;"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
                                            <a data-bs-toggle="modal" data-bs-target="#terms" class="btn btn-success btn-lg float-right"><i class="fas fa-upload"></i>&nbsp;Submit</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
                <?php include("include/footer.php") ?>
                <?php include("modals/terms.php") ?>
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
$(document).ready(function() {
    $('#submit_app').prop('disabled',true)

    $("input[name=agree]").change(function() {
        if(this.checked) {
            $('#submit_app').prop('disabled',false)
        }else{
            $('#submit_app').prop('disabled',true)
        }
    });
    $('#submit_app').click(function(){
        window.location.href = "TableRegistration.php";
    })
});
</script>
</script>       

    </body>
</html>
