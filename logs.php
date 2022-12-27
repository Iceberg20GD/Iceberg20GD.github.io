<?php
 $page = 'index';
 require('include/header.php');
 $user_id=$_SESSION['user_id'];
?>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php require('include/sidebar.php'); ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Logs</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Logs</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Logs 
                            </div>
                            <div class="card-body">
<style type="text/css">
.cap{
    text-transform: capitalize;
}
</style>
                                
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>User ID</th>
                                            <th>User</th>
                                            <th>Log</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>User ID</th>
                                            <th>User</th>
                                            <th>Log</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    if($_SESSION['role']!='admin'){
                                        $query = "SELECT *,u.user_name as un, u.user_id as id FROM log l LEFT JOIN user u ON u.user_id=l.user_id WHERE u.user_id = $user_id ORDER BY l.id DESC";
                                    }else{
                                        $query = "SELECT *,u.user_name as un, u.user_id as id FROM log l LEFT JOIN user u ON u.user_id=l.user_id ORDER BY l.id DESC";
                                    }
                                    
                                    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
                                     while($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td><?php echo date("F d, Y",strtotime($row['date_added']));?></td>
                                            <td><?php echo date("H:i:s a",strtotime($row['date_added']));?></td>
                                            <td><?php echo $row['id'];?></td>
                                            <td><?php echo $row['un'];?></td>
                                            <td><?php echo $row['content'];?></td>
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
<script>
    $(document).ready(function(){
        $('.edit').click(function(){
            var id = $(this).attr('data-id')
            var pin = $(this).attr('data-pin')
            $('#inputUsername2').val($('#username'+id).html())
            $('#inputEmail2').val($('#email'+id).html())
            $('#inputMobile2').val($('#mobile'+id).html())
            $('#inputEmail2').val($('#email'+id).html())
            $('#inputRole').val($('#role'+id).html().toLowerCase())
            $('#uniquePin3').val(pin)
            $('#uniquePin4').val(pin)
            $('#id2').val((id))
            $('.m-title').html("Edit User")
            $('#m-submit').html("Update")
        })
        $('.deactivate').click(function(){
            var id = $(this).attr('data-id')
            $('#iddeactivate').val((id))
        })
        $('.activate').click(function(){
            var id = $(this).attr('data-id')
            $('#idactivate').val((id))
        })
        $('.add').click(function(){
            $('.user-form').trigger("reset")
            $('#staticBackdropLabel').html("Add User")
            $('#submit').html("Submit")
        })
    })
</script>
