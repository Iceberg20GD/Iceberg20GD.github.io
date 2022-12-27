<?php
 $page = 'registration';
 require('include/header.php');
if(isset($_GET['r_id'])){
  $r_id=$_GET['r_id'];

$query = "select * from registration where idregistration = $r_id";
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
                            <div class="col-xl-4 col-md-4 border border-2 border-primary border bg-primary p-2">
                                <h3 style="color: white">Learners Profile Form</h3>
                            </div>
                            <div class="col-xl-4 col-md-4 border border-2 border-primary border p-2">
                                <h3>Background Information</h3>
                            </div>
                            <div class="col-xl-4 col-md-4 border border-2 border-primary p-2">
                                <h3>Files and Credentials</h3>
                            </div>
                        </div>
                        <div class="row">
                            <form method="post" action="processRegistration.php">
                                <div class="col-xl-9 col-md-12">
                                    <h4 class="breadcrumb-item active">1. T2MIS Auto Generated</h4>
                                    <div class="row mb-3">
                                        <input type="hidden" name="r_id" value="<?php if(isset($row[0])){echo $row[0];} ?>">
                                        <div class="col-md-9">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="uli" value="<?php if(isset($row['uli'])){echo $row['uli'];} ?>" class="form-control" id="inputFirstName" type="text" placeholder="Enter your Unique Learner Identifier" />
                                                <label for="inputFirstName">Unique Learner Identifier</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating validate">
                                                <input name="entrydate" value="<?php if(isset($row['entrydate'])){echo $row['entrydate'];} ?>" class="form-control" id="inputLastName" type="date" placeholder="Enter your last name" required/>
                                                <label for="inputLastName">Entry Date</label>
                                                <p class="req_lbl">*this field is required</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                    <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0 validate">
                                            <select name="course" class="form-control"  id="inputFirstName" required>
                                                    <option></option>
                                                    <option <?php if(isset($row['course']) && $row['course']=="FFS Rice Farming NCII"){echo "selected";} ?> value="FFS Rice Farming NCII">FFS Rice Farming NCII</option>
                                                    <option <?php if(isset($row['course']) && $row['course']=="RMO Driving NCII"){echo "selected";} ?> value="RMO Driving NCII">RMO Driving NCII</option>
                                                </select>
                                                <label for="inputFirstName">Course</label>
                                            <p class="req_lbl">*this field is required</p>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="breadcrumb-item active">1. Learner/Manpower Profile</h4>
                                    <div class="row mb-3">
                                        <p class="breadcrumb-item active">2.1 Name</p>
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3 mb-md-0 validate">
                                                <input name="lastname" value="<?php if(isset($row['lastname'])){echo $row['lastname'];} ?>" required class="form-control" id="inputFirstName" type="text" placeholder="Enter your Unique Learner Identifier" />
                                                <label for="inputFirstName">Last Name</label>
                                            <p class="req_lbl">*this field is required</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating validate">
                                                <input name="firstname" value="<?php if(isset($row['firstname'])){echo $row['firstname'];} ?>" required class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">First Name</label>
                                                <p class="req_lbl">*this field is required</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating">
                                                <input name="middlename" value="<?php if(isset($row['middlename'])){echo $row['middlename'];} ?>" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">Middle Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="name_ext" value="<?php if(isset($row['name_ext'])){echo $row['name_ext'];} ?>" class="form-control" id="inputFirstName" type="text" placeholder="Enter your Unique Learner Identifier" />
                                                <label for="inputFirstName">Extension Name(Jr., Sr.)</label>
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
                                            <div class="form-floating validate">
                                                <input name="barangay" value="<?php if(isset($row['barangay'])){echo $row['barangay'];} ?>" required class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">Barangay</label>
                                                <p class="req_lbl">*this field is required</p>
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
                                            <div class="form-floating mb-3 mb-md-0 validate">
                                                <input name="city" value="<?php if(isset($row['city'])){echo $row['city'];} ?>" required class="form-control" id="inputFirstName" type="text" placeholder="Enter your Unique Learner Identifier" />
                                                <label for="inputFirstName">City/Municipality</label>
                                                <p class="req_lbl">*this field is required</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating validate">
                                                <input name="province" value="<?php if(isset($row['province'])){echo $row['province'];} ?>" required class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">Province</label>
                                                <p class="req_lbl">*this field is required</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating validate">
                                                <input name="region" value="<?php if(isset($row['region'])){echo $row['region'];} ?>" required class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">Region</label>
                                                <p class="req_lbl">*this field is required</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3 mb-md-0 validate">
                                                <input name="emailfacebook" value="<?php if(isset($row['emailfacebook'])){echo $row['emailfacebook'];} ?>" required class="form-control" id="inputFirstName" type="text" placeholder="Enter your Unique Learner Identifier" />
                                                <label for="inputFirstName">Email Address/Facebook Account</label>
                                                <p class="req_lbl">*this field is required</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating validate">
                                                <input name="contactno" value="<?php if(isset($row['contactno'])){echo $row['contactno'];} ?>" required class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">Contact No.</label>
                                                <p class="req_lbl">*this field is required</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating validate">
                                                <input name="nationality" value="<?php if(isset($row['nationality'])){echo $row['nationality'];} ?>" required class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">Nationality</label>
                                                <p class="req_lbl">*this field is required</p>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="breadcrumb-item active">3. Personal Information</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <p class="breadcrumb-item active">3.1 Sex</p>
                                            <div class="form-floating mb-3 mb-md-0 validate">
                                                <select name="gender" class="form-control"  id="inputFirstName">
                                                    <option></option>
                                                    <option <?php if(isset($row['gender']) && $row['gender']=="male"){echo "selected";} ?> value="male">Male</option>
                                                    <option <?php if(isset($row['gender']) && $row['gender']=="female"){echo "selected";} ?> value="female">Female</option>
                                                </select>
                                                <label for="inputFirstName">Sex</label>
                                                <p class="req_lbl">*this field is required</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="breadcrumb-item active">3.2 Civil Status</p>
                                            <div class="form-floating validate">
                                                <select name="civilstatus" class="form-control"  id="inputFirstName" required>
                                                    <option></option>
                                                    <option <?php if(isset($row['civilstatus']) && $row['civilstatus']=="single"){echo "selected";} ?> value="single">Single</option>
                                                    <option <?php if(isset($row['civilstatus']) && $row['civilstatus']=="married"){echo "selected";} ?> value="married">Married</option>
                                                    <option <?php if(isset($row['civilstatus']) && $row['civilstatus']=="separated/divorced/annulled"){echo "selected";} ?> value="separated/divorced/annulled">Separated/Divorced/Annulled</option>
                                                    <option <?php if(isset($row['civilstatus']) && $row['civilstatus']=="widow/er"){echo "selected";} ?> value="widow/er">Widow/er</option>
                                                    <option <?php if(isset($row['civilstatus']) && $row['civilstatus']=="common law/live in"){echo "selected";} ?> value="common law/live in">Common Law/Live In</option>
                                                </select>
                                                <label for="inputLastName">Civil Status</label>
                                                <p class="req_lbl">*this field is required</p>
                                            </div>
                                        </div>
                                        <div class="row col-md-6">
                                        <p class="breadcrumb-item active">3.3 Employment (before the training)</p>
                                            <div class="col-md-6">
                                                <div class="form-floating validate">
                                                    <select name="employment_status" class="form-control"  id="inputFirstName" required>
                                                        <option></option>
                                                        <option <?php if(isset($row['employment_status']) && $row['employment_status']=="wage-employed"){echo "selected";} ?> value="wage-employed">Wage-Employed</option>
                                                        <option <?php if(isset($row['employment_status']) && $row['employment_status']=="underemployed"){echo "selected";} ?> value="underemployed">Underemployed</option>
                                                        <option <?php if(isset($row['employment_status']) && $row['employment_status']=="self-employed"){echo "selected";} ?> value="self-employed">Self-Employed</option>
                                                        <option <?php if(isset($row['employment_status']) && $row['employment_status']=="unemployed"){echo "selected";} ?> value="unemployed">Uneployed</option>
                                                    </select>
                                                    <label for="inputLastName">Employment Status</label>
                                                <p class="req_lbl">*this field is required</p>
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
                                            <div class="form-floating mb-3 mb-md-0 validate">
                                                <input name="birthdate" value="<?php if(isset($row['birthdate'])){echo $row['birthdate'];} ?>" required class="form-control" id="inputFirstName" type="date" placeholder="Enter your Unique Learner Identifier" />
                                                <label for="inputFirstName">Birth Date</label>
                                                <p class="req_lbl">*this field is required</p>
                                            </div>
                                        </div>
                                        <div class="row col-md-9">
                                            <p class="breadcrumb-item active">3.5 Birth Place</p>
                                            <div class="col-md-4">
                                                <div class="form-floating validate">
                                                    <input name="birthcity" value="<?php if(isset($row['birthcity'])){echo $row['birthcity'];} ?>" required class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                    <label for="inputLastName">City/Municipality</label>
                                                    <p class="req_lbl">*this field is required</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating validate">
                                                    <input name="birthprovince" value="<?php if(isset($row['birthprovince'])){echo $row['birthprovince'];} ?>" required class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                    <label for="inputLastName">Province</label>
                                                    <p class="req_lbl">*this field is required</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating validate">
                                                    <input name="birthregion" value="<?php if(isset($row['birthregion'])){echo $row['birthregion'];} ?>" required class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                    <label for="inputLastName">Region</label>
                                                    <p class="req_lbl">*this field is required</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <p class="breadcrumb-item active">3.6 Educational Attainment Before The Training (Trainee)</p>
                                            <div class="form-floating mb-3 mb-md-0 validate">
                                                <select name="educationalattainment" class="form-control"  id="inputFirstName" required>
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
                                                        <option <?php if(isset($row['educationalattainment']) && $row['educationalattainment']=="Doctoral"){echo "selected";} ?> value="Doctoral">Doctoral</option>
                                                    </select>
                                                <label for="inputFirstName">Educational Attainment</label>
                                                <p class="req_lbl">*this field is required</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <p class="breadcrumb-item active">3.6 Parent/Guardian Information</p>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3 mb-md-0 validate">
                                                <input name="parent" value="<?php if(isset($row['region'])){echo $row['region'];} ?>" required class="form-control" id="inputFirstName" type="text" placeholder="Enter your Unique Learner Identifier" />
                                                <label for="inputFirstName">Parent/Guardian</label>
                                                <p class="req_lbl">*this field is required</p>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-floating mb-3 mb-md-0 validate">
                                                <input name="parentaddress" value="<?php if(isset($row['parentaddress'])){echo $row['parentaddress'];} ?>" required class="form-control" id="inputFirstName" type="text" placeholder="wdw" />
                                                <label for="inputFirstName">Complete Permanent Mailing Address</label>
                                            <p class="req_lbl">*this field is required</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="d-flex align-items-right justify-content-between mt-12 mb-0">
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
            if($(this).find('.form-control').val() != "")
            x.find('p').hide()
            else
            x.find('p').show()

        })
        
        $('.validate').each(function(){
            let x = $(this)
            if($(this).find('.form-control').val() != "")
            x.find('p').hide()
            else
            x.find('p').show()
            
        })
    })
</script>