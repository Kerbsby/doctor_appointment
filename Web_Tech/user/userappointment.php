<?php
ob_start();
session_start();
include 'C:\xampp\htdocs\Web_Tech\config\config.php';
include 'C:\xampp\htdocs\Web_Tech\user\userheader.php';

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM appointment WHERE requestID = '$id'");
    header('Location: /Web_Tech/user/userappointment.php');
};

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedBook</title>
    <script src="https://kit.fontawesome.com/bf1c643ee2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/Web_Tech/css/style.css">
    <link rel="stylesheet" type="text/css" href="/Web_Tech/css/reglog.css">
    <link rel="stylesheet" type="text/css" href="/Web_Tech/css/header.css">
</head>

<body>
    <div class="appointment-table container border rounded mt-5 p-4">
        <div class="page-header">
            <h1 style="font-size: 65px;">Appointment List</h1>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading" style="background-color: #006cff; color: white">List of Appointment</div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Patient Email</th>
                            <th>Doctor Name</th>
                            <th>Doctor Email</th>
                            <th>Patient Date</th>
                            <th>Patient Time</th>
                            <th>Patient Symptoms</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    $currentUser = $_SESSION['email'];
                    $sql = "SELECT * FROM appointment WHERE p_email = '$currentUser'";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                  
                    ?>
                    <tbody>
                    <?php
                      while ($row = mysqli_fetch_array($result)) {
                        ?>
                    
                        <tr>
                            <td><?= $row['p_email'];?></td>
                            <td><?= $row['d_name'];?></td>
                            <td><?= $row['d_email'];?></td>
                            <td><?= $row['appDate'];?></td>
                            <td><?= date('h:i A', strtotime($row['appTime']));?></td>
                            <td><?= $row['appSymptoms'];?></td>
                            <td><?= $row['appComments'];?></td>
                            <td>
                                <div class="appointedit-btn">
                                <a type="button" name="update" id="edit_button" class="btn btn-warning btn-xs update" style="text-decoration: none;" href="appointedit.php?update=<?php echo $row['requestID']; ?>">Edit</a>                                   
                                <a class="btn btn-warning btn-xs delete" href="/Web_Tech/user/userappointment.php?delete=<?php echo $row['requestID']; ?>" title="Edit">Delete</a>
                                </div>
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
        <div class="quick-appoint">
        <div class="appoint-btn">
            <a class="btn appointbtn" id="appointbtn"  data-bs-toggle="modal" data-bs-target="#myModal">Add Appointment</a>       
        </div>
    </div>
    


    <?php

$currentUser = $_SESSION['email'];
$sql = "SELECT * FROM patient WHERE p_email = '$currentUser'";
$result = mysqli_query($conn, $sql);

if ($result) {
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_array($result)) {


?>

<div id="myUpdate" class="modal fade" >
    <div class="modal-dialog">
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






<!--Add new apppointment-->
<?php

if (isset($_POST['appoint'])) {
    $doctorEmail = mysqli_real_escape_string($conn, $_POST['doctor']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $symptoms = mysqli_real_escape_string($conn, $_POST['symptom']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $currentUser = $_SESSION['email'];

    // Retrieve the start time and end time for the selected doctor
    $doctorTimeQuery = "SELECT start_time, end_time FROM doctor WHERE d_email = '$doctorEmail'";
    $doctorTimeResult = mysqli_query($conn, $doctorTimeQuery);

    if ($doctorTimeResult) {
        $doctorTimeRow = mysqli_fetch_assoc($doctorTimeResult);
        $startTime = $doctorTimeRow['start_time'];
        $endTime = $doctorTimeRow['end_time'];

        // Check if the selected time is within the specified range
        if ($time < $startTime || $time > $endTime) {
            echo '<style>';
            echo '.modal-alert {';
            echo '    display: block;';
            echo '    position: fixed;';
            echo '    top: 20%;';
            echo '    left: 50%;';
            echo '    transform: translate(-50%, -50%);';
            echo '    padding: 20px;';
            echo '    background-color: #ff6666;'; // Updated to a higher and red color
            echo '    border: 1px solid #f00;';
            echo '    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);';
            echo '    z-index: 9999;'; // Ensure it appears above other elements
            echo '}';
            echo '.close-button {';
            echo '    position: absolute;';
            echo '    top: 5px;';
            echo '    right: 10px;';
            echo '    font-size: 20px;';
            echo '    cursor: pointer;';
            echo '}';
            echo '</style>';
        
            echo '<div class="modal-alert">';
            echo '    <span class="close-button" onclick="closeAlert()">&times;</span>';
            echo '    <p>The selected time is not available. Please choose another time.</p>';
            echo '</div>';
        
            echo '<script>';
            echo 'function closeAlert() {';
            echo '    var alertBox = document.querySelector(".modal-alert");';
            echo '    if (alertBox) { alertBox.remove(); }';
            echo '}';
            echo '</script>';
        } else {
            // Check for booked dates
            $bookedDatesQuery = "SELECT DISTINCT appDate FROM appointment WHERE d_email = '$doctorEmail'";
            $bookedDatesResult = mysqli_query($conn, $bookedDatesQuery);

            if ($bookedDatesResult) {
                $bookedDates = [];
                while ($row = mysqli_fetch_assoc($bookedDatesResult)) {
                    $bookedDates[] = $row['appDate'];
                }

                if (in_array($date, $bookedDates)) {
                    echo '<style>';
                    echo '.modal-alert {';
                    echo '    display: block;';
                    echo '    position: fixed;';
                    echo '    top: 20%;';
                    echo '    left: 50%;';
                    echo '    transform: translate(-50%, -50%);';
                    echo '    padding: 20px;';
                    echo '    background-color: #ff6666;'; // Updated to a higher and red color
                    echo '    border: 1px solid #f00;';
                    echo '    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);';
                    echo '    z-index: 9999;'; // Ensure it appears above other elements
                    echo '}';
                    echo '.close-button {';
                    echo '    position: absolute;';
                    echo '    top: 5px;';
                    echo '    right: 10px;';
                    echo '    font-size: 20px;';
                    echo '    cursor: pointer;';
                    echo '}';
                    echo '</style>';
                
                    echo '<div class="modal-alert">';
                    echo '    <span class="close-button" onclick="closeAlert()">&times;</span>';
                    echo '    <p>The selected date is not available. Please choose another date.</p>';
                    echo '</div>';
                
                    echo '<script>';
                    echo 'function closeAlert() {';
                    echo '    var alertBox = document.querySelector(".modal-alert");';
                    echo '    if (alertBox) { alertBox.remove(); }';
                    echo '}';
                    echo '</script>';
                } else {
                    // Fetch the doctor's name based on the selected email
                    $doctorQuery = "SELECT d_FullName FROM doctor WHERE d_email = '$doctorEmail'";
                    $doctorResult = mysqli_query($conn, $doctorQuery);

                    if ($doctorResult) {
                        $doctorRow = mysqli_fetch_assoc($doctorResult);
                        $doctorName = $doctorRow['d_FullName'];

                        // Insert appointment with doctor's name
                        $insertQuery = "INSERT INTO appointment (p_email, d_email, d_name, appDate, appTime, appSymptoms, appComments) 
                                        VALUES ('$currentUser', '$doctorEmail', '$doctorName', '$date', '$time', '$symptoms', '$comment')";

                        $result = mysqli_query($conn, $insertQuery);

                        if ($result) {
                        
                            header("Location: /Web_Tech/user/userappointment.php");
                        } else {
                            echo "Error: " . mysqli_error($conn);
                        }
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>


<?php

$currentUser = $_SESSION['email'];
$sql = "SELECT * FROM patient WHERE p_email = '$currentUser'";
$result = mysqli_query($conn, $sql);

if ($result) {
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_array($result)) {


?>






<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- modal content -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contact Us</h5>
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
                                        <select class="form-select" aria-label="Default select example" name="doctor">
                                        <option selected>Select a doctor</option>
                                        <?php
                                        $query = "SELECT * FROM doctor";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0){
                                            foreach ($query_run as $row){
                                                // Fetch the doctor's specialty from the database based on the email
                                                $doctorEmail = $row['d_email'];
                                                $specialtyQuery = "SELECT d_specialize FROM doctor WHERE d_email = '$doctorEmail'";
                                                $specialtyResult = mysqli_query($conn, $specialtyQuery);
                                                $specialtyRow = mysqli_fetch_assoc($specialtyResult);
                                                $specialty = $specialtyRow['d_specialize'];
                                        ?>
                                        <option value="<?= $doctorEmail; ?>" data-specialty="<?= $specialty; ?>">
                                            <?= $row['d_FullName']; ?> - <?= $specialty; ?>
                                        </option>
                                                                                
                                                <?php
                                            }
                                            }
                                            ?>
                                        </select>
                                <br>
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
                            <button type="submit" name="appoint" id="appoint" class="btn btn-primary">Submit</button>
                            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
</body>

</html>

