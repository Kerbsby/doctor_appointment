<?php
include 'D:\xampp\htdocs\Web_Tech\config\config.php';
session_start();
include 'D:\xampp\htdocs\Web_Tech\admin\adminheader.php';

?>


<?php
$currentAd = $_SESSION['email'];
$sql = "SELECT * FROM app_admin WHERE admin_email = '$currentAd'";

$result = mysqli_query($conn, $sql);

if ($result) {
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_array($result)) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bf1c643ee2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Web_Tech/css/style.css">
    <link rel="stylesheet" href="/Web_Tech/css/dochome.css">
    <title>MedBook</title>
</head>
<body>


<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
            <a href="#" class="navbar-brand mb-0" >
                <i class="fa-solid fa-truck-medical"></i>MedBook
            </a>
        </div>
        <div class="list-group list-group-flush my-3">
            <a href="adminhome.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                    class="fas fa-tachometer-alt me-2"></i>Appointment</a>
            <a href="adminpatient.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fas fa-hospital-user me-2"></i>Patient List</a>
            <a href="patientlist.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fas fa-hospital-user me-2"></i>Doctor List</a>
            <a href="doctorprofile.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    class="fas fa-user me-2"></i>Profile</a>
            <a href="/Web_Tech/user/userlogout.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    class="fas fa-power-off me-2" style="color: #c72a2a;"></i>Logout</a>

        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-2 m-0">Patient List</h2>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-2"></i><?php echo $row['admin_name'];?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="doctorprofile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="/Web_Tech/user/userlogout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>


        <div class="container-fluid px-4">
            <div class="row g-3 my-2">
                <div class="row g-3 my-2">
                    <!--patient-->
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <?php
                                $query = "SELECT patientID FROM patient ORDER BY patientID";
                                $query_run = mysqli_query($conn, $query);
                                if ($row = mysqli_num_rows($query_run)) {
                                    echo '<h3 class="fs-2">' . $row . '</h3>';
                                }else{
                                    echo '<h3 class="fs-2">No Data</h3>';
                                }

                                ?>
                                <p class="fs-5" style="color:#046167;"><b>All Patients</b></p>
                            </div>
                            <i class="fas fa-users fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                    <!--doctor-->
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <?php
                                $query = "SELECT doctorID FROM doctor ORDER BY doctorID";
                                $query_run = mysqli_query($conn, $query);
                                if($row = mysqli_num_rows($query_run))
                                {
                                    echo '<h3 class="fs-2">'.$row.'</h3>';
                                }
                                else{
                                    echo '<h3 class="fs-2">No Data</h3>';
                                }
                                ?>
                                <p class="fs-5" style="color:#046167;"><b>All doctors</b></p>
                            </div>
                            <i class="fas fa-user-doctor fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <?php
                                $query = "SELECT adminID FROM app_admin ORDER BY adminID";
                                $query_run = mysqli_query($conn, $query);
                                if($row = mysqli_num_rows($query_run))
                                {
                                    echo '<h3 class="fs-2">'.$row.'</h3>';
                                }
                                else{
                                    echo '<h3 class="fs-2">No Data</h3>';
                                }
                                ?>
                                <p class="fs-5" style="color:#046167;"><b>Admin</b></p>
                            </div>
                            <i class="fas fa-address-card fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>


                    <!--appointments-->
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <?php
                                $query = "SELECT requestID FROM appointment ORDER BY requestID";
                                $query_run = mysqli_query($conn, $query);
                                if($row = mysqli_num_rows($query_run))
                                {
                                    echo '<h3 class="fs-2">'.$row.'</h3>';
                                }
                                else{
                                    echo '<h3 class="fs-2">No Data</h3>';
                                }
                                ?>
                                <p class="fs-5" style="color:#046167;"><b>All appointments</b></p>
                            </div>
                            <i class="fas fa-calendar-check fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>



                <div class="row my-5">
                <h3 class="fs-4 mb-3">Patient List</h3>
                <div class="col text-center">
                    <table class="table bg-white rounded shadow-sm  table-hover">
                        <thead>
                        <tr>
                            <th scope="col" width="50">Patient Name</th>
                            <th scope="col" width="50">Patient Gender</th>
                            <th scope="col" width="30">Patient Email</th>
                            <th scope="col" width="50">Patient Number</th>
                            <th scope="col" width="50">Patient DOB</th>
                            <th scope="col" width="50">Patient Address</th>
                            <th scope="col" width="50">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM patient";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['p_FullName'] ?></td>
                                        <td><?php echo $row['p_gender'] ?></td>
                                        <td><?php echo $row['p_email'] ?></td>
                                        <td><?php echo $row['p_number'] ?></td>
                                        <td><?php echo $row['p_DOB'] ?></td>
                                        <td><?php echo $row['p_address'] ?></td>
                                        <td>
                                            <button type="button" name="update" id="act_button" class="btn btn-warning btn-xs update" data-bs-toggle="modal" data-bs-target="#myUpdate"><a class="glyphicon glyphicon-edit" style="text-decoration: none;" href="/Web_Tech/admin/adminhome.php?update=" title="Edit">Edit</a></button>
                                            <button type="button" name="delete" id="act_button" class="btn btn-danger btn-xs update"><a class="glyphicon glyphicon-edit" style="text-decoration: none; " href="/Web_Tech/admin/adminhome.php?delete=" title="Edit">Delete</a></button>
                                        </td>
                                    </tr>
                                    <?php

                                }
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
</div>
<?php
}
}
}
?>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>


</body>
</html>