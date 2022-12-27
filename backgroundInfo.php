<?php
 $page = 'index';
 require('include/header.php');

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
                            <li class="breadcrumb-item active">Applicants Background Information</li>
                        </ol>
                        <div class="row">
                            <form method="post" action="processRegistration.php">
                                <div class="col-xl-9 col-md-12">
                                    <h4 class="breadcrumb-item active">1. T2MIS Auto Generated</h4>
                                    <div class="row mb-3">
                                        
                                        <div class="col-md-9">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="uli" class="form-control" id="inputFirstName" type="text" placeholder="Enter your Unique Learner Identifier" />
                                                <label for="inputFirstName">Unique Learner Identifier</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating">
                                                <input name="entrydate" class="form-control" id="inputLastName" type="date" placeholder="Enter your last name" />
                                                <label for="inputLastName">Entry Date</label>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="breadcrumb-item active">1. Learner/Manpower Profile</h4>
                                    <div class="row mb-3">
                                        <p class="breadcrumb-item active">2.1 Name</p>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="lastname" class="form-control" id="inputFirstName" type="text" placeholder="Enter your Unique Learner Identifier" />
                                                <label for="inputFirstName">Last Name, Extension Name(Jr., Sr.)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <input name="firstname" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">First Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <input name="middlename" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">Middle Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <p class="breadcrumb-item active">2.2 Complete Mailing Address</p>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="street" class="form-control" id="inputFirstName" type="text" placeholder="Enter your Unique Learner Identifier" />
                                                <label for="inputFirstName">Street</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <input name="barangay" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">Barangay</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <input name="district" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">District</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="city" class="form-control" id="inputFirstName" type="text" placeholder="Enter your Unique Learner Identifier" />
                                                <label for="inputFirstName">City/Municipality</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <input name="province" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">Province</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <input name="region" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">Region</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="emailfacebook" class="form-control" id="inputFirstName" type="text" placeholder="Enter your Unique Learner Identifier" />
                                                <label for="inputFirstName">Email Address/Facebook Account</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <input name="contactno" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">Contact No.</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <input name="nationality" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
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
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                                <label for="inputFirstName">Sex</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="breadcrumb-item active">3.2 Civil Status</p>
                                            <div class="form-floating">
                                                <select name="civilstatus" class="form-control"  id="inputFirstName">
                                                    <option></option>
                                                    <option value="single">Single</option>
                                                    <option value="married">Married</option>
                                                    <option value="separated/divorced/annulled">Separated/Divorced/Annulled</option>
                                                    <option value="widow/er">Widow/er</option>
                                                    <option value="common law/live in">Common Law/Live In</option>
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
                                                        <option value="wage-employed">Wage-Employed</option>
                                                        <option value="underemployed">Underemployed</option>
                                                        <option value="self-employed">Self-Employed</option>
                                                        <option value="unemployed">Uneployed</option>
                                                    </select>
                                                    <label for="inputLastName">Employment Status</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <select name="employment_type" class="form-control"  id="inputFirstName">
                                                        <option></option>
                                                        <option value="None">None</option>
                                                        <option value="Casual">Casual</option>
                                                        <option value="Probationary">Probationary</option>
                                                        <option value="Contractual">Contractual</option>
                                                        <option value="Regular">Regular</option>
                                                        <option value="Job Order">Job Order</option>
                                                        <option value="Permanent">Permanent</option>
                                                        <option value="Temporary">Temporary</option>
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
                                                <input name="birthdate" class="form-control" id="inputFirstName" type="date" placeholder="Enter your Unique Learner Identifier" />
                                                <label for="inputFirstName">Birth Date</label>
                                            </div>
                                        </div>
                                        <div class="row col-md-9">
                                            <p class="breadcrumb-item active">3.5 Birth Place</p>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input name="birthcity" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                    <label for="inputLastName">City/Municipality</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input name="birthprovince" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                    <label for="inputLastName">Province</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input name="birthregion" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
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
                                                        <option value="No Grade Completed">No Grade Completed</option>
                                                        <option value="Elementary Undergraduate">Elementary Undergraduate</option>
                                                        <option value="Elementary Graduate">Elementary Graduate</option>
                                                        <option value="High School Undergraduate">High School Undergraduate</option>
                                                        <option value="High School Graduate">High School Graduate</option>
                                                        <option value="Junior High (K-12)">Junior High (K-12)</option>
                                                        <option value="Senior High (K-12)">Senior High (K-12)</option>
                                                        <option value="Post-Secondary Non-Tertiary/Technical Vocational Course Undergraduate">Post-Secondary Non-Tertiary/Technical Vocational Course Undergraduate</option>
                                                        <option value="Post-Secondary Non-Tertiary/Technical Vocational Course Graduate">Post-Secondary Non-Tertiary/Technical Vocational Course Graduate</option>
                                                        <option value="College Undergraduate">College Undergraduate</option>
                                                        <option value="College Graduate">College Graduate</option>
                                                        <option value="Masteral">Masteral</option>
                                                        <option value="Doctoral">Doctoral</option>
                                                    </select>
                                                <label for="inputFirstName">Educational Attainment</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <p class="breadcrumb-item active">3.6 Birth Date</p>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="parent" class="form-control" id="inputFirstName" type="text" placeholder="Enter your Unique Learner Identifier" />
                                                <label for="inputFirstName">Parent/Guardian</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="parentaddress" class="form-control" id="inputFirstName" type="text" placeholder="wdw" />
                                                <label for="inputFirstName">Complete Permanent Mailing Address</label>
                                            </div>
                                        </div>
                                    </div class="row mb-12 ">
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn btn-primary btn-lg" type="submit" >Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
                <?php include("include/footer.php") ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
