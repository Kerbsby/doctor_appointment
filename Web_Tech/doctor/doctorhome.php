<?php
include 'D:\xampp\htdocs\Web_Tech\config\config.php';
session_start();
include 'D:\xampp\htdocs\Web_Tech\doctor\doctorheader.php';
?>




<?php

if(isset($_POST['appointsub'])) {
    $id = $_GET['update'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $symptoms = $_POST['symptom'];
    $comment = $_POST['comment'];
    $status = $_POST['status'];


    $sql = "UPDATE appointment SET requestID =  '$id', appDate = '$date', appTime = '$time', appSymptoms = '$symptoms', appComments = '$comment', status = '$status' WHERE requestID = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo 'updated';
    }

}

?>

<?php
$currentDoc = $_SESSION['d_email'];
$sql = "SELECT * FROM doctor WHERE d_email = '$currentDoc'";

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
            <a href="doctorhome.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="patientlist.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                      <i class="fas fa-hospital-user me-2"></i>Patient List</a>
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
                <h2 class="fs-2 m-0">Dashboard</h2>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto" id="nav_right">
                    <li class="nav-item dropdown collapse navbar-collapse" id="navbarSupportedContent">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-2"></i><?php echo $row['d_FullName'];?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="doctorprofile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="/Web_Tech/user/userlogout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </nav>
        <?php
        }
        }
        }
        ?>

        <div class="container-fluid px-4">
            <div class="row g-3 my-2" style="">
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

                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <?php
                            $query = "SELECT * FROM appointment WHERE d_name = '$currentDoc'";
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
                <h3 class="fs-4 mb-3">All Appointments</h3>
                <div class="col">
                    <table class="table bg-white rounded shadow-sm  table-hover">
                        <thead>
                        <tr class="text-center">
                            <th  scope="col" width="50">Patient Email</th>
                            <th scope="col" width="40">Patient Date</th>
                            <th scope="col" width="40">Patient Time</th>
                            <th scope="col" width="50">Patient Symptoms</th>
                            <th scope="col" width="30">Comment</th>
                            <th scope="col" width="30">Status</th>
                            <th scope="col" width="80">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $currentUser = $_SESSION['d_email'];
                        $sql = "SELECT * FROM appointment WHERE d_name = '$currentUser'";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {

                                ?>

                        <tr class="text-center">
                            <td><?= $row['p_email'];?></td>
                            <td><?= $row['appDate'];?></td>
                            <td><?= $row['appTime'];?></td>
                            <td><?= $row['appSymptoms'];?></td>
                            <td><?= $row['appComments'];?></td>
                            <td><?= $row['status'];?></td>
                            <td>
                                <button type="button" name="view" id="act_button" class="btn btn-info btn-xs view" data-bs-toggle="modal" data-bs-target="#patientDetails"><a class="glyphicon glyphicon-file" style="text-decoration: none;" title="View">View</a></button>
                                <button type="button" name="update" id="act_button" class="btn btn-warning btn-xs update" data-bs-toggle="modal" data-bs-target="#myUpdate"><a class="glyphicon glyphicon-edit" style="text-decoration: none;" href="/Web_Tech/doctor/doctorhome.php?update=<?php echo $row['requestID']; ?>" title="Edit">Edit</a></button>
                                <button type="button" name="delete" id="act_button" class="btn btn-danger btn-xs update"><a class="glyphicon glyphicon-edit" style="text-decoration: none; " href="/Web_Tech/doctor/doctorhome.php?delete=<?php echo $row['requestID']; ?>" title="Edit">Delete</a></button>
                            </td>
                        </tr>
                            <?php

                        }
                        }
                        else{
                                ?>

                                <tr>
                                    <td style=" text-transform: capitalize;" class ="text-center" colspan="6"><h3>no items added</h3></td>
                                </tr>
                                <?php
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



<div id="patientDetails" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Patient Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <?php
            $sql = "SELECT * FROM appointment WHERE d_name = '$currentDoc'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    foreach ($result as $row){
                        ?>
                        <div class="modal-body">
                            <div class="panel panel-default">
                                <div class="panel-heading">Patient Information</div>
                                <div class="panel-body">
                                    <label>Patient Name:</label> <?php echo $row['p_email'] ?><br>
                                    <label>Gender:</label> <?php echo $row['appDate'] ?><br>
                                    <label>Email:</label> <?php echo $row['appComments'] ?><br>
                                    <label>Contact Number:</label> <?php echo $row['appSymptoms'] ?><br>
                                    <label>Birth Date:</label> <?php echo $row['appDate'] ?><br>
                                    <label>Contact Number:</label> <?php echo $row['appTime'] ?><br>
                                </div>
                            </div>
                        </div>
                        <?php

                    }
                }
            }
            ?>

        </div>
    </div>
</div>






<div class="modal fade" id="myUpdate">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- modal content -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- modal body start -->
            <div class="modal-body">
                <!-- form start -->
                <div class="container" id="wrap">
                    <div class="row">
                        <div class="col">
                            <form class="form" role="form" method="POST" accept-charset="UTF-8">
                                <div class="row">
                                    <div class="form-group col-sm-6 col-sm-6">
                                        <label for="">Preferred Date</label>
                                        <input type="date" name="date" id="data" class="form-control"/>
                                    </div>
                                    <div class="form-group col-sm-6 col-sm-6">
                                        <label for="">Time</label>
                                        <input type="time" name="time" id="time" class="form-control">
                                    </div>
                                </div>
                                <br>


                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Symptom:</label>
                                    <textarea class="form-control" id="symptom" name="symptom" required><?php echo $row['appSymptoms']?></textarea>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="message-text" class="control-label">Comment:</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="4" required><?php echo $row['appComments']?></textarea><br>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="control-label">Status</label>
                                    <select class="form-control" id="status" name="status"/>
                                    <option value="process">process</option>
                                    <option value="ongoing">ongoing</option>
                                    <option value="done">Cancelled</option>
                                    </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="appointsub" id="appointsub" class="btn btn-primary">Submit</button>
                            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>











<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>


</body>
</html>