<?php
 $page = 'index';
 require('include/header.php');
 $user_id=$_SESSION['user_id'];
 $r_id = $_GET['r_id'];
 $query = "select * from registration LEFT JOIN uploads ON uploads.idregistration = registration.idregistration
            LEFT JOIN background_info ON background_info.idregistration = registration.idregistration where registration.idregistration = $r_id";
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
                        <h1 class="mt-4">Approval</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Registration</a></li>
                            <li class="breadcrumb-item active">Approval
                            <?php if($row['status']=='pending'){ ?>
                                <span class="badge bg-secondary">Pending</span>
                            <?php }else if($row['status']=='denied'){ ?>
                                <span class="badge bg-danger">Denied</span>
                            <?php }else if($row['status']=='approved'){ ?>
                                <span class="badge bg-success">Approved</span>
                            <?php } ?>
                                
                            </li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-flex align-items-right mt-12 mb-0">
                                    <a class="btn btn-primary btn-sm float-right" onclick="printDiv()"><i class="fas fa-print"></i>&nbsp;Print</a>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Approval
                            </div>
                            <div class="card-body" id="elem">
<style type="text/css">
.cap{
    text-transform: capitalize;
}
.tb{
    border: 1px solid;
}
.tb tr .al_top{
    vertical-align: top;
}
.no_border{
    padding: .7rem;
    border: 0px;
}
.b{
    border: 2px solid;
    height: 2rem;
    vertical-align: top;
}
.bordered{
    padding: .7rem;
    border: 1px black solid;
}
.center{
    text-align: center;
}
.left{
    text-align: left;
}
.right{
    text-align: right;
}
.avatar{
    width: 180px;
    height: 180px;
}
.b_content{
    text-transform: uppercase;
    font-size: 1rem;
    text-align: center;
    margin-bottom: 10px;
}
.b_right{
    padding: .7rem;
    border-right: 1px black solid;
}
.b_bottom{
    padding: .7rem;
    border-bottom: 1px black solid;
}
</style>
                                <table class="tb">
                                    <tr>
                                        <td class="center b_right b_bottom"><img src="assets/img/tesda.png"width=50%></td>
                                        <td class="center b_right b_bottom" colspan=5>
                                            <h5 style="font-size:1.2rem;font-weight:bold;margin-bottom:-5px;">Technical Education and Skills Development Authority</h5>
                                            <p>Pangasiwaan sa Edukasyon Teknikal at Pagpapaunlad ng Kasanayan</p>
                                        </td>
                                        <td class="center b_bottom" colspan=1>MIS 03-01<br>(ver. 2021)</td>
                                    </tr>
                                    <tr>
                                        <td class="center b_bottom" colspan=7><h2 style="font-size:40px;">Registration Form</h2></td>
                                    </tr>
                                    <tr>
                                        <td class="center b_right b_bottom" colspan=6><h5 style="font-size:40px;">LEARNERS PROFILE FORM</h5></td>
                                        <td colspan=1 class="b_bottom"><div class="avatar bordered" style="float:right;"><img src="uploads/<?php echo $row['idpicture'] ?>"width=100%></div></td>
                                    </tr>
                                    <tr>
                                        <td class="left b_bottom"  colspan=7><h5 style="font-size:1.2rem;font-weight:bold;margin-bottom:-5px;">1. T2MIS Auto Generated</h5></td>
                                    </tr>
                                    <tr>
                                        <td class="left no_border" colspan=1><b>1.1 Unique Learner<br>Identifier (ULI) Number</b></td>
                                        <td class="center no_border" colspan=3 width=30%><div class="b"><p class="b_content"><?php echo $row['uli'] ?></p></div></td>
                                        <td class="right no_border" colspan=2><b>1.2 Entry Date</b></td>
                                        <td class="center no_border" colspan=1><div class="b"><p class="b_content"><?php echo $row['entrydate'] ?></p></div></td>
                                    </tr>
                                    <tr>
                                        <td class="left b_bottom" colspan=1><b>1.2 Course</b></td>
                                        <td class="center b_bottom" colspan=6 width=30%><div class="b"><p class="b_content"><?php echo $row['course'] ?></p></div></td>
                                    </tr>
                                    <tr>
                                        <td class="left b_bottom"  colspan=7><h5 style="font-size:1.2rem;font-weight:bold;margin-bottom:-5px;">2. Learner/Manpower Profile</h5></td>
                                    </tr>
                                    <tr>
                                        <td class="left no_border" colspan=1 width=10%><b>2.1 Name</b></td>
                                        <td class="center no_border" colspan=1  width=25%>
                                            <div class="b"><p class="b_content"><?php echo $row['lastname'] ?></p></div>
                                            <b>Last Name</b>
                                        </td>
                                        <td class="center no_border" colspan=2 width=25%>
                                            <div class="b"><p class="b_content"><?php echo $row['firstname'] ?></p></div>
                                            <b>First</b>
                                        </td>
                                        <td class="center no_border" colspan=2 width=25%>
                                            <div class="b"><p class="b_content"><?php echo $row['middlename'] ?></p></div>
                                            <b>Middle</b>
                                        </td>
                                        <td class="center no_border" colspan=1>
                                            <div class="b"><p class="b_content"><?php echo $row['name_ext'] ?></p></div>
                                            <b>Ext. Name(Jr., Sr.)</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left no_border" colspan=1 width=10%><b>2.2 Complete Permanent Mailing Address</b></td>
                                        <td class="center no_border" colspan=1  width=25%>
                                            <div class="b"><p class="b_content"><?php echo $row['street'] ?></p></div>
                                            <b>Number, Street</b>
                                        </td>
                                        <td class="center no_border" colspan=3 width=25%>
                                            <div class="b"><p class="b_content"><?php echo $row['barangay'] ?></p></div>
                                            <b>Barangay</b>
                                        </td>
                                        <td class="center no_border" colspan=2 1>
                                            <div class="b"><p class="b_content"><?php echo $row['district'] ?></p></div>
                                            <b>District</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left no_border" colspan=1 width=10%></td>
                                        <td class="center no_border" colspan=1  width=25%>
                                            <div class="b"><p class="b_content"><?php echo $row['city'] ?></p></div>
                                            <b>City/ Municipality</b>
                                        </td>
                                        <td class="center no_border" colspan=3 width=25%>
                                            <div class="b"><p class="b_content"><?php echo $row['province'] ?></p></div>
                                            <b>Province</b>
                                        </td>
                                        <td class="center no_border" colspan=2 1>
                                            <div class="b"><p class="b_content"><?php echo $row['region'] ?></p></div>
                                            <b>Region</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left b_bottom" colspan=1 width=15%></td>
                                        <td class="center b_bottom" colspan=1  width=25%>
                                            <div class="b"><p class="b_content"><?php echo $row['emailfacebook'] ?></p></div>
                                            <b>Email/Facebook </b>
                                        </td>
                                        <td class="center b_bottom" colspan=3 width=25%>
                                            <div class="b"><p class="b_content"><?php echo $row['contactno'] ?></p></div>
                                            <b>Contact No.</b>
                                        </td>
                                        <td class="center b_bottom" colspan=3 21>
                                            <div class="b"><p class="b_content"><?php echo $row['nationality'] ?></p></div>
                                            <b>Nationality</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left b_bottom"  colspan=7><h5 style="font-size:1.2rem;font-weight:bold;margin-bottom:-5px;">3. Personal Information</h5></td>
                                    </tr>
                                    <tr>
                                        <td class="left b_right b_bottom" colspan=1>
                                            <b>3.1 Sex</b>
                                        </td>
                                        <td class="left b_right b_bottom" colspan=1>
                                            <b>3.2 Civil Status</b>
                                        </td>
                                        <td class="left b_bottom" colspan=5 >
                                            <b>3.3 Employment (before the training)</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left b_right b_bottom al_top" colspan=1>
                                            <input type="checkbox" id="c1" <?php if($row['gender']=="male"){echo "checked";} ?>><label for="c1">&nbsp;Male</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['gender']=="female"){echo "checked";} ?>><label for="c1">&nbsp;Female</label>
                                        </td>
                                        <td class="left b_right b_bottom al_top" colspan=1>
                                            <input type="checkbox" id="c1" <?php if($row['civilstatus']=="single"){echo "checked";} ?>><label for="c1">&nbsp;Single</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['civilstatus']=="married"){echo "checked";} ?>><label for="c1">&nbsp;Married</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['civilstatus']=="separated/divorced/annulled"){echo "checked";} ?>><label for="c1">&nbsp;Separated/Divorced/ Annulled</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['civilstatus']=="widow/er"){echo "checked";} ?>><label for="c1">&nbsp;Widow/er</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['civilstatus']=="common law/live in"){echo "checked";} ?>><label for="c1">&nbsp;Common Law/ Live-in</label>
                                        </td>
                                        <td class="left b_bottom al_top" colspan=2>
                                            <b>Employment Status</b><br>
                                            <input type="checkbox" id="c1" <?php if($row['employment_status']=="wage-employed"){echo "checked";} ?>><label for="c1">&nbsp;Wage Employed</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['employment_status']=="underemployed"){echo "checked";} ?>><label for="c1">&nbsp;Underemployed</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['employment_status']=="self-employed"){echo "checked";} ?>><label for="c1">&nbsp;Self-Employed</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['employment_status']=="unemployed"){echo "checked";} ?>><label for="c1">&nbsp;Unemployed</label>
                                        </td>
                                        <td class="left b_bottom al_top" colspan=2>
                                            <b>Employment Type</b><br>
                                            <i style="font-size: .6rem;">(if Wage-employed or Underemployed)</i><br>
                                            <input type="checkbox" id="c1" <?php if($row['employment_type']=="None"){echo "checked";} ?>><label for="c1">&nbsp;None</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['employment_type']=="Casual"){echo "checked";} ?>><label for="c1">&nbsp;Casual</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['employment_type']=="Probationary"){echo "checked";} ?>><label for="c1">&nbsp;Probationary</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['employment_type']=="Contractual"){echo "checked";} ?>><label for="c1">&nbsp;Contractual</label>
                                        </td>
                                        <td class="left b_bottom al_top" colspan=1 width=8%>
                                            <br><br>
                                            <input type="checkbox" id="c1" <?php if($row['employment_type']=="Regular"){echo "checked";} ?>><label for="c1">&nbsp;Regular</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['employment_type']=="Job Order"){echo "checked";} ?>><label for="c1">&nbsp;Job Order</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['employment_type']=="Permanent"){echo "checked";} ?>><label for="c1">&nbsp;Permanent</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['employment_type']=="Temporary"){echo "checked";} ?>><label for="c1">&nbsp;Temporary</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left no_border" colspan=1 width=10%><b>3.4 Birthdate</b></td>
                                        <td class="center no_border" colspan=1  width=25%>
                                            <div class="b"><p class="b_content"><?php echo date_format(date_create($row['birthdate']),"F") ?></p></div>
                                            <b>Month of Birth</b>
                                        </td>
                                        <td class="center no_border" colspan=2  width=25%>
                                            <div class="b"><p class="b_content"><?php echo date_format(date_create($row['birthdate']),"d") ?></p></div>
                                            <b>Day</b>
                                        </td>
                                        <td class="center no_border" colspan=1>
                                            <div class="b"><p class="b_content"><?php echo date_format(date_create($row['birthdate']),"Y") ?></p></div>
                                            <b>Year</b>
                                        </td>
                                        <?php
                                        $bday = new DateTime($row['birthdate']);
                                        $today = new Datetime(date('y-m-d'));
                                        $diff = $today->diff($bday);
                                        $age = $diff->y;
                                        ?>
                                        <td class="center no_border" colspan=2>
                                            <div class="b"><p class="b_content"><?php echo $age ?></p></div>
                                            <b>Age</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left b_bottom" colspan=1 width=10%><b>3.5 Birth Place</b></td>
                                        <td class="center b_bottom" colspan=1  width=25%>
                                            <div class="b"><p class="b_content"><?php echo $row['birthcity'] ?></p></div>
                                            <b>City/ Municipality</b>
                                        </td>
                                        <td class="center b_bottom" colspan=2  width=25%>
                                        <div class="b"><p class="b_content"><?php echo $row['birthprovince'] ?></p></div>
                                            <b>Province</b>
                                        </td>
                                        <td class="center b_bottom" colspan=3>
                                        <div class="b"><p class="b_content"><?php echo $row['birthregion'] ?></p></div>
                                            <b>Region</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left b_bottom" colspan=7>
                                            <b>3.6 Educational Attainment Before the Training (Trainee)</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left b_bottom al_top" colspan=2 width=20%>
                                            <input type="checkbox" id="c1" <?php if($row['educationalattainment']=="No Grade Completed"){echo "checked";} ?>><label for="c1">&nbsp;No Grade Completed</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['educationalattainment']=="Elementary Undergraduate"){echo "checked";} ?>><label for="c1">&nbsp;Elementary Undergraduate</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['educationalattainment']=="Elementary Graduate"){echo "checked";} ?>><label for="c1">&nbsp;Elementary Graduate</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['educationalattainment']=="High School Undergraduate"){echo "checked";} ?>><label for="c1">&nbsp;High School Undergraduate</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['educationalattainment']=="High School Graduate"){echo "checked";} ?>><label for="c1">&nbsp;High School Graduate</label>
                                        </td>
                                        <td class="left b_bottom al_top" colspan=3>
                                            <input type="checkbox" id="c1" <?php if($row['educationalattainment']=="Junior High (K-12)"){echo "checked";} ?>><label for="c1">&nbsp;Junior High (K-12)</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['educationalattainment']=="Senior High (K-12)"){echo "checked";} ?>><label for="c1">&nbsp;Senior High (K-12)</label><br>
                                            <input type="checkbox" id="c2" <?php if($row['educationalattainment']=="Post-Secondary Non-Tertiary/Technical Vocational Course Undergraduate"){echo "checked";} ?>><label for="c2">&nbsp;Post-Secondary Non-Tertiary/Technical Vocational Course Undergraduate</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['educationalattainment']=="Post-Secondary Non-Tertiary/Technical Vocational Course Graduate"){echo "checked";} ?>><label for="c1">&nbsp;Post-Secondary Non-Tertiary/Technical Vocational Course Graduate</label>
                                        </td>
                                        <td class="left b_bottom al_top" colspan=2>
                                        <input type="checkbox" id="c1" <?php if($row['educationalattainment']=="College Undergraduate"){echo "checked";} ?>><label for="c1">&nbsp;College Undergraduate</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['educationalattainment']=="College Graduate"){echo "checked";} ?>><label for="c1">&nbsp;College Graduate</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['educationalattainment']=="Masteral"){echo "checked";} ?>><label for="c1">&nbsp;Masteral</label><br>
                                            <input type="checkbox" id="c1" <?php if($row['educationalattainment']=="Doctoral"){echo "checked";} ?>><label for="c1">&nbsp;Doctoral</label> 
                                        </td>
                                    </tr>
                                    <tr style="border-top: 1px solid black;" >
                                        <td class="left no_border" colspan=1 width=10%><b>3.7 Parent/ Guardian</b></td>
                                        <td class="center no_border" colspan=1  width=25%>
                                            <div class="b"><p class="b_content"><?php echo $row['parent'] ?></p></div>
                                            <b>Name</b>
                                        </td>
                                        <td class="center no_border" colspan=5  width=25%>
                                        <div class="b"><p class="b_content"><?php echo $row['parentaddress'] ?></p></div>
                                            <b>Complete Permanent Mailing Address</b>
                                        </td>
                                    </tr>
                                </table>
                            </div>
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
     
<script>
function printDiv() {
            var divContents = document.getElementById("elem").innerHTML;
            var a = window.open('', '', 'height=1000, width=1000');
            a.document.write('<html> <style>.b_content{margin-top:5px;}</style>  ');
            a.document.write('<body>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
</script>
    </body>
</html>
