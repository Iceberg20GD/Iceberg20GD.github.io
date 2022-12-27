<?php
 $page = 'index';
 require('include/header.php');
 $user_id=$_SESSION['user_id'];
$query = "select * from registration where user_id = $user_id";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$row = mysqli_fetch_array($result);
?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php require('include/sidebar.php'); ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Registration Form</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Registration Form</li>
                        </ol>
                        <div class="row">
                            <form method="post" action="processRegistration.php">
                                <div class="col-xl-9 col-md-12">
                                    <h4 class="breadcrumb-item active">1. T2MIS Auto Generated</h4>
                                    <div class="row mb-3">
                                        
                                        <div class="col-md-9">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="uli" value="<?php if(isset($row['uli'])){echo $row['uli'];} ?>" class="form-control" id="inputFirstName" type="text" placeholder="Enter your Unique Learner Identifier" />
                                                <label for="inputFirstName">Unique Learner Identifier</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating">
                                                <input name="entrydate" value="<?php if(isset($row['entrydate'])){echo $row['entrydate'];} ?>" class="form-control" id="inputLastName" type="date" placeholder="Enter your last name" />
                                                <label for="inputLastName">Entry Date</label>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="breadcrumb-item active">1. Learner/Manpower Profile</h4>
                                    <div class="row mb-3">
                                        <p class="breadcrumb-item active">2.1 Name</p>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="lastname" value="<?php if(isset($row['lastname'])){echo $row['lastname'];} ?>" class="form-control" id="inputFirstName" type="text" placeholder="Enter your Unique Learner Identifier" />
                                                <label for="inputFirstName">Last Name, Extension Name(Jr., Sr.)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <input name="firstname" value="<?php if(isset($row['firstname'])){echo $row['firstname'];} ?>" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">First Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <input name="middlename" value="<?php if(isset($row['middlename'])){echo $row['middlename'];} ?>" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">Middle Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <p class="breadcrumb-item active">2.2 Complete Mailing Address</p>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="street" value="<?php if(isset($row['street'])){echo $row['street'];} ?>" class="form-control" id="inputFirstName" type="text" placeholder="Enter your Unique Learner Identifier" />
                                                <label for="inputFirstName">Street</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <input name="barangay" value="<?php if(isset($row['barangay'])){echo $row['barangay'];} ?>" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">Barangay</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <input name="district" value="<?php if(isset($row['district'])){echo $row['district'];} ?>" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">District</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="city" value="<?php if(isset($row['city'])){echo $row['city'];} ?>" class="form-control" id="inputFirstName" type="text" placeholder="Enter your Unique Learner Identifier" />
                                                <label for="inputFirstName">City/Municipality</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <input name="province" value="<?php if(isset($row['province'])){echo $row['province'];} ?>" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">Province</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <input name="region" value="<?php if(isset($row['region'])){echo $row['region'];} ?>" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">Region</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="emailfacebook" value="<?php if(isset($row['emailfacebook'])){echo $row['emailfacebook'];} ?>" class="form-control" id="inputFirstName" type="text" placeholder="Enter your Unique Learner Identifier" />
                                                <label for="inputFirstName">Email Address/Facebook Account</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <input name="contactno" value="<?php if(isset($row['contactno'])){echo $row['contactno'];} ?>" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">Contact No.</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <input name="nationality" value="<?php if(isset($row['nationality'])){echo $row['nationality'];} ?>" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">Nationality</label>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="breadcrumb-item active">3. Personal Information</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <p class="breadcrumb-item active">3.1 Sex</p>
                                            <div class="form-floating mb-3 mb-md-0">
                                                <select name="gender" class="form-control"  id="inputFirstName">
                                                    <option></option>
                                                    <option <?php if(isset($row['gender']) && $row['gender']=="male"){echo "selected";} ?> value="male">Male</option>
                                                    <option <?php if(isset($row['gender']) && $row['gender']=="female"){echo "selected";} ?> value="female">Female</option>
                                                </select>
                                                <label for="inputFirstName">Sex</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="breadcrumb-item active">3.2 Civil Status</p>
                                            <div class="form-floating">
                                                <select name="civilstatus" class="form-control"  id="inputFirstName">
                                                    <option></option>
                                                    <option <?php if(isset($row['civilstatus']) && $row['civilstatus']=="single"){echo "selected";} ?> value="single">Single</option>
                                                    <option <?php if(isset($row['civilstatus']) && $row['civilstatus']=="married"){echo "selected";} ?> value="married">Married</option>
                                                    <option <?php if(isset($row['civilstatus']) && $row['civilstatus']=="separated/divorced/annulled"){echo "selected";} ?> value="separated/divorced/annulled">Separated/Divorced/Annulled</option>
                                                    <option <?php if(isset($row['civilstatus']) && $row['civilstatus']=="widow/er"){echo "selected";} ?> value="widow/er">Widow/er</option>
                                                    <option <?php if(isset($row['civilstatus']) && $row['civilstatus']=="common law/live in"){echo "selected";} ?> value="common law/live in">Common Law/Live In</option>
                                                </select>
                                                <label for="inputLastName">Civil Status</label>
                                            </div>
                                        </div>
                                        <div class="row col-md-6">
                                        <p class="breadcrumb-item active">3.3 Employment (before the training)</p>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <select name="employment_status" class="form-control"  id="inputFirstName">
                                                        <option></option>
                                                        <option <?php if(isset($row['employment_status']) && $row['employment_status']=="wage-employed"){echo "selected";} ?> value="wage-employed">Wage-Employed</option>
                                                        <option <?php if(isset($row['employment_status']) && $row['employment_status']=="underemployed"){echo "selected";} ?> value="underemployed">Underemployed</option>
                                                        <option <?php if(isset($row['employment_status']) && $row['employment_status']=="self-employed"){echo "selected";} ?> value="self-employed">Self-Employed</option>
                                                        <option <?php if(isset($row['employment_status']) && $row['employment_status']=="unemployed"){echo "selected";} ?> value="unemployed">Uneployed</option>
                                                    </select>
                                                    <label for="inputLastName">Employment Status</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <select name="employment_type" class="form-control"  id="inputFirstName">
                                                        <option></option>
                                                        <option <?php if(isset($row['employment_type']) && $row['employment_type']=="None"){echo "selected";} ?> value="None">None</option>
                                                        <option <?php if(isset($row['employment_type']) && $row['employment_type']=="Casual"){echo "selected";} ?> value="Casual">Casual</option>
                                                        <option <?php if(isset($row['employment_type']) && $row['employment_type']=="Probationary"){echo "selected";} ?> value="Probationary">Probationary</option>
                                                        <option <?php if(isset($row['employment_type']) && $row['employment_type']=="Contractual"){echo "selected";} ?> value="Contractual">Contractual</option>
                                                        <option <?php if(isset($row['employment_type']) && $row['employment_type']=="Regular"){echo "selected";} ?> value="Regular">Regular</option>
                                                        <option <?php if(isset($row['employment_type']) && $row['employment_type']=="Job Order"){echo "selected";} ?> value="Job Order">Job Order</option>
                                                        <option <?php if(isset($row['employment_type']) && $row['employment_type']=="Permanent"){echo "selected";} ?> value="Permanent">Permanent</option>
                                                        <option <?php if(isset($row['employment_type']) && $row['employment_type']=="Temporary"){echo "selected";} ?> value="Temporary">Temporary</option>
                                                    </select>
                                                    <label for="inputLastName">Employment Type</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <p class="breadcrumb-item active">3.4 Birth Date</p>
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="birthdate" value="<?php if(isset($row['birthdate'])){echo $row['birthdate'];} ?>" class="form-control" id="inputFirstName" type="date" placeholder="Enter your Unique Learner Identifier" />
                                                <label for="inputFirstName">Birth Date</label>
                                            </div>
                                        </div>
                                        <div class="row col-md-9">
                                            <p class="breadcrumb-item active">3.5 Birth Place</p>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input name="birthcity" value="<?php if(isset($row['birthcity'])){echo $row['birthcity'];} ?>" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                    <label for="inputLastName">City/Municipality</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input name="birthprovince" value="<?php if(isset($row['birthprovince'])){echo $row['birthprovince'];} ?>" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                    <label for="inputLastName">Province</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input name="birthregion" value="<?php if(isset($row['birthregion'])){echo $row['birthregion'];} ?>" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                    <label for="inputLastName">Region</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <p class="breadcrumb-item active">3.6 Educational Attainment Before The Training (Trainee)</p>
                                            <div class="form-floating mb-3 mb-md-0">
                                                <select name="educationalattainment" class="form-control"  id="inputFirstName">
                                                        <option></option>
                                                        <option <?php if(isset($row['educationalattainment']) && $row['educationalattainment']=="No Grade Completed"){echo "selected";} ?> value="No Grade Completed">No Grade Completed</option>
                                                        <option <?php if(isset($row['educationalattainment']) && $row['educationalattainment']=="Elementary Undergraduate"){echo "selected";} ?> value="Elementary Undergraduate">Elementary Undergraduate</option>
                                                        <option <?php if(isset($row['educationalattainment']) && $row['educationalattainment']=="Elementary Graduate"){echo "selected";} ?> value="Elementary Graduate">Elementary Graduate</option>
                                                        <option <?php if(isset($row['educationalattainment']) && $row['educationalattainment']=="High School Undergraduate"){echo "selected";} ?> value="High School Undergraduate">High School Undergraduate</option>
                                                        <option <?php if(isset($row['educationalattainment']) && $row['educationalattainment']=="High School Graduate"){echo "selected";} ?> value="High School Graduate">High School Graduate</option>
                                                        <option <?php if(isset($row['educationalattainment']) && $row['educationalattainment']=="Junior High (K-12)"){echo "selected";} ?> value="Junior High (K-12)">Junior High (K-12)</option>
                                                        <option <?php if(isset($row['educationalattainment']) && $row['educationalattainment']=="Senior High (K-12)"){echo "selected";} ?> value="Senior High (K-12)">Senior High (K-12)</option>
                                                        <option <?php if(isset($row['educationalattainment']) && $row['educationalattainment']=="Post-Secondary Non-Tertiary/Technical Vocational Course Undergraduate"){echo "selected";} ?> value="Post-Secondary Non-Tertiary/Technical Vocational Course Undergraduate">Post-Secondary Non-Tertiary/Technical Vocational Course Undergraduate</option>
                                                        <option <?php if(isset($row['educationalattainment']) && $row['educationalattainment']=="Post-Secondary Non-Tertiary/Technical Vocational Course Graduate"){echo "selected";} ?> value="Post-Secondary Non-Tertiary/Technical Vocational Course Graduate">Post-Secondary Non-Tertiary/Technical Vocational Course Graduate</option>
                                                        <option <?php if(isset($row['educationalattainment']) && $row['educationalattainment']=="College Undergraduate"){echo "selected";} ?> value="College Undergraduate">College Undergraduate</option>
                                                        <option <?php if(isset($row['educationalattainment']) && $row['educationalattainment']=="College Graduate"){echo "selected";} ?> value="College Graduate">College Graduate</option>
                                                        <option <?php if(isset($row['educationalattainment']) && $row['educationalattainment']=="Masteral"){echo "selected";} ?> value="Masteral">Masteral</option>
                                                        <option <?php if(isset($row['educationalattainment']) && $row['educationalattainment']=="Doctoral   "){echo "selected";} ?> value="Doctoral">Doctoral</option>
                                                    </select>
                                                <label for="inputFirstName">Educational Attainment</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <p class="breadcrumb-item active">3.6 Birth Date</p>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="parent" value="<?php if(isset($row['region'])){echo $row['region'];} ?>" class="form-control" id="inputFirstName" type="text" placeholder="Enter your Unique Learner Identifier" />
                                                <label for="inputFirstName">Parent/Guardian</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="parentaddress" value="<?php if(isset($row['parentaddress'])){echo $row['parentaddress'];} ?>" class="form-control" id="inputFirstName" type="text" placeholder="wdw" />
                                                <label for="inputFirstName">Complete Permanent Mailing Address</label>
                                            </div>
                                        </div>
                                    </div class="row mb-12 ">
                                <?php if(!isset($row['user_id'])) {?>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn btn-primary btn-lg" type="submit" >Save</button>
                                    </div>
                                <?php } else { ?>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn btn-success btn-lg" disabled>Save Edit</button>
                                    </div>
                                <?php } ?>
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
        <script src="js/jquery.min.js"></script>
    </body>
</html>
