<?php
include 'C:\xampp\htdocs\Web_Tech\config\config.php';
session_start();
include 'C:\xampp\htdocs\Web_Tech\user\userheader.php';

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM appointment WHERE requestID = '$id'");
    header('Location: /Web_Tech/user/userappointment.php');
};

?>

<?php
include 'C:\xampp\htdocs\Web_Tech\config\config.php';

if(isset($_POST['appointsub'])) {
    $id = $_GET['update'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $doctor = $_POST['doctor'];
    $symptoms = $_POST['symptom'];
    $comment = $_POST['comment'];


    $sql = "UPDATE appointment SET requestID =  '$id', d_name = '$doctor', appDate = '$date', appTime = '$time', appSymptoms = '$symptoms', appComments = '$comment' WHERE requestID = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
       echo 'updated';
    }

}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bf1c643ee2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/Web_Tech/css/style.css">
    <link rel="stylesheet" type="text/css" href="/Web_Tech/css/reglog.css">
    <title>MedBook</title>
</head>

<body>
<?php
echo "<div class='container' style=' border: none; border-radius: 2px; box-sizing: border-box;'>";
    echo "<div class='row'>";
        echo "<div class='page-header'>";
            echo "<h1 style='font-size: 65px;'>Your appointment list. </h1>";
            echo "</div>";
        echo "<div class='panel panel-primary'>";
            echo "<div class='panel-heading' style='background-color: #006cff; color: white'>List of Appointment</div>";
            echo "<div class='panel-body'>";
                echo "<table class='table table-hover'>";
                    echo "<thead>";
                    echo "<tr>";
                        echo "<th>Patient Email</th>";
                        echo "<th>Doctor Email</th>";
                        echo "<th>Patient Date</th>";
                        echo "<th>Patient Time</th>";
                        echo "<th>Patient Symptoms</th>";
                        echo "<th>Comment</th>";
                        echo "<th>Action</th>";
                        echo "</tr>";
                    echo "</thead>";
                    ?>
                    <?php
                    $currentUser = $_SESSION['email'];
                    $sql = "SELECT * FROM appointment WHERE p_email = '$currentUser'";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <tbody>
                        <tr>
                            <td><?= $row['p_email'];?></td>
                            <td><?= $row['d_name'];?></td>
                            <td><?= $row['appDate'];?></td>
                            <td><?= $row['appTime'];?></td>
                            <td><?= $row['appSymptoms'];?></td>
                            <td><?= $row['appComments'];?></td>
                            <td>
                                <button type="button" name="view" id="act_button" class="btn btn-info btn-xs view" data-bs-toggle="modal" data-bs-target="#patientDetails"><a class="glyphicon glyphicon-file" style="text-decoration: none;" title="View">View</a></button>
                                <button type="button" name="update" id="act_button" class="btn btn-warning btn-xs update" data-bs-toggle="modal" data-bs-target="#myUpdate"><a class="glyphicon glyphicon-edit" style="text-decoration: none;" href="/Web_Tech/user/userappointment.php?update=<?php echo $row['requestID']; ?>" title="Edit">Edit</a></button>
                                <button type="button" name="delete" id="act_button" class="btn btn-warning btn-xs update"><a class="glyphicon glyphicon-edit" style="text-decoration: none;" href="/Web_Tech/user/userappointment.php?delete=<?php echo $row['requestID']; ?>" title="Edit">Delete</a></button>
                            </td>

                                  <!--  <span class="badge badge-warning">Pending Request</span>

                                    <span class="badge badge-primary">Confirmed</span>

                                    <span class="badge badge-info">Rescheduled</span>

                                    <span class="badge badge-info">Done</span>


                            <td class="text-center">
                                <button  class="btn btn-primary btn-sm update_app" type="button">Update</button>
                                <button  class="btn btn-danger btn-sm delete_app" type="button" >Delete</button>-->
                        </tr>
                    <?php

                    }
                    }
                    }
                    ?>
                    </tbody>



<div id="patientDetails" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Patient Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php
            $currentUser = $_SESSION['email'];
            $sql = "SELECT * FROM patient WHERE p_email = '$currentUser'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
            if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {

            ?>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-heading">Patient Information</div>
                    <div class="panel-body">
                        <label>Patient Name:</label> <?php echo $row['p_FullName'] ?><br>
                        <label>Gender:</label> <?php echo $row['p_gender'] ?><br>
                        <label>Email:</label> <?php echo $row['p_email'] ?><br>
                        <label>Contact Number:</label> <?php echo $row['p_number'] ?><br>
                        <label>Birth Date:</label> <?php echo $row['p_DOB'] ?><br>
                        <label>Contact Number:</label> <?php echo $row['p_address'] ?><br>
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



<?php
include 'C:\xampp\htdocs\Web_Tech\config\config.php';

$currentUser = $_SESSION['email'];
$sql = "SELECT * FROM patient WHERE p_email = '$currentUser'";
$result = mysqli_query($conn, $sql);

if ($result) {
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_array($result)) {


?>



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



                                <div class="panel panel-default">
                                    <div class="panel-heading">Patient Information</div>
                                    <div class="panel-body">
                                        Patient Name: <?php echo $row['p_FullName'] ?><br>
                                        Email: <?php echo $row['p_email'] ?><br>
                                        Contact Number: <?php echo $row['p_number'] ?><br>
                                        Address: <?php echo $row['p_address'] ?>
                                    </div>
                                </div>
                                <?php

                                                }
                                            }
                                        }
                                        ?>

                                <div class="row">
                                    <div class="form-group col-sm-6 col-sm-6">
                                        <label for="">Preferred Date</label>
                                        <input type="date" name="date" id="date" class="form-control" />
                                    </div>
                                    <div class="form-group col-sm-6 col-sm-6">
                                        <label for="">Time</label>
                                        <input type="time" name="time" id="time" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <select class="form-select" aria-label="Default select example" name="doctor" id="doctor">
                                    <option selected>Select doctors</option>
                                    <?php
                                    $query = "SELECT * FROM doctor";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0){
                                        foreach ($query_run as $row){
                                            ?>
                                            <option value="<?= $row['d_email'];?>"><?= $row['d_FullName'];?></option>
                                            <?php
                                        }
                                    }

                                    ?>
                                </select>
                                <br>


                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Symptom:</label>
                                    <input type="text" class="form-control" id="symptom" name="symptom" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="message-text" class="control-label">Comment:</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="4" required></textarea><br>
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






