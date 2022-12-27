<?php
 $page = 'registration';
 require('include/header.php');
 $user_id=$_SESSION['user_id'];
 $y = date('Y');
$query = "select * from registration where user_id = $user_id AND status='pending' AND EXTRACT(YEAR FROM date_added) = '$y'";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$pending = mysqli_num_rows($result);
?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php require('include/sidebar.php'); ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Registrations</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Registration</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-flex align-items-right justify-content-between mt-12 mb-0">
                                    <a class="btn btn-success btn-sm float-right register"><i class="fas fa-plus"></i>&nbsp;Register</a>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Registrations
                            </div>
                            <div class="card-body">
<style type="text/css">
.cap{
    text-transform: capitalize;
}
.dataTable-search{
    display: none;
}
td .btn{
    margin-top:.2rem;
}
</style>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Application ID</th>
                                            <th>Name</th>
                                            <th>Entry Date</th>
                                            <th>Registration Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Application ID</th>
                                            <th>Name</th>
                                            <th>Entry Date</th>
                                            <th>Registration Status</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $user_id=$_SESSION['user_id'];
                                    $query = "select * from registration where user_id = $user_id ORDER BY entrydate DESC";
                                    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
                                     while($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['app_id'] ?></td>
                                            <td class="cap"><?php echo strtoupper($row['firstname'])." ".strtoupper(substr($row['middlename'], 1,1))." ".strtoupper($row['lastname']);?></td>
                                            <td><?php echo $row['entrydate'] ?></td>
                                            <td class="text-center">
                                                <?php if($row['status']=='pending'){ ?>
                                                    <span class="badge rounded-pill bg-secondary">PENDING</span>
                                                <?php }else if($row['status']=='denied'){ ?>
                                                    <span class="badge rounded-pill bg-danger">DENIED</span>
                                                <?php }else if($row['status']=='approved'){ ?>
                                                    <span class="badge rounded-pill bg-success">APPROVED</span>
                                                <?php } ?>
                                            </td>
                                            <td width="14%" class="text-center">
                                            <?php if($row['status'] == 'pending'){ ?>
                                                <a href="registration1.php?r_id=<?php echo $row['idregistration'] ?>" class="btn btn-success btn-sm"><i class="fas fa-file-edit"></i></a>
                                                <a data-bs-toggle="modal" data-id='<?php echo $row['idregistration'] ?>' data-bs-target="#delete" class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>
                                            <?php } ?>
                                            <a href="approval.php?r_id=<?php echo $row['idregistration'] ?>" class="btn btn-info btn-sm text-white"><i class="fas fa-list"></i></a>
                                            <?php if($row['remarks']!=""){ ?>
                                            <a data-bs-toggle="modal" data-remarks='<?php echo ucfirst($row['remarks']) ?>' data-bs-target="#remarks" class=" position-relative text-white btn btn-info btn-sm remarks"><i class="fas fa-message"></i>
                                                <span style="font-size:.6rem;" class="position-absolute top-0 start-100 translate-middle p-0 bg-danger border border-light rounded-circle">&nbsp;&nbsp;!&nbsp;&nbsp;</span></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include("include/footer.php") ?>
            </div>
        </div>
        <?php require('modals/registration.php'); ?>
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
    var pending = <?php echo $pending; ?>;
                $(".register").click(function() {
                    if (pending == 0) {
                        window.location.href = "registration1.php";
                    } else {
                        alert("You still have a pending Registration.");
                    }
                });

        $('.remarks').click(function(){
            var remarks = $(this).attr('data-remarks')
            $('.content').html(remarks)
        })
        $('.delete').click(function(){
            var id = $(this).attr('data-id')
            $('#iddeletes').val(id)
        })
    })
</script>
    </body>
</html>
