<?php
ob_start();
session_start();
include 'C:\xampp\htdocs\Web_Tech\config\config.php';
include 'C:\xampp\htdocs\Web_Tech\user\userheader.php';
function displayModal($message, $backgroundColor) {
    echo '<style>';
    echo '.modal-alert {';
    echo '    display: block;';
    echo '    position: fixed;';
    echo '    top: 20%;';
    echo '    left: 50%;';
    echo '    transform: translate(-50%, -50%);';
    echo '    padding: 20px;';
    echo "    background-color: #$backgroundColor;";
    echo '    border: 1px solid #66ff66;';
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
    echo "    <p>$message</p>";
    echo '</div>';

    echo '<script>';
    echo 'function closeAlert() {';
    echo '    var alertBox = document.querySelector(".modal-alert");';
    echo '    if (alertBox) { alertBox.remove(); }';
    echo '}';
    echo '</script>';
}

if (isset($_POST['appointsub'])) {
    $id = $_GET['update'];
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $doctorEmail = $_POST['doctor']; // Assuming $_POST['doctor'] contains the doctor's email
    $symptoms = mysqli_real_escape_string($conn, $_POST['symptom']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    // Fetch the doctor's name, start time, and end time based on the given doctor's email
    $doctorQuery = "SELECT d_FullName, start_time, end_time FROM doctor WHERE d_email = '$doctorEmail'";
    $doctorResult = mysqli_query($conn, $doctorQuery);
    $doctorRow = mysqli_fetch_assoc($doctorResult);

    // Retrieve the start time and end time for the selected doctor
    $startTime = $doctorRow['start_time'];
    $endTime = $doctorRow['end_time'];

    // Check if the selected time is within the specified range
    if ($time < $startTime || $time > $endTime) {
        displayModal("The selected time is not available. Please choose another time.", "ff6666");
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
                displayModal("The selected date is not available. Please choose another date.", "ff6666");
            } else {
                // Update the appointment with the doctor's name
                $doctorName = $doctorRow['d_FullName'];
                $sql = "UPDATE appointment SET d_email = '$doctorEmail', d_name = '$doctorName', appDate = '$date', appTime = '$time', appSymptoms = '$symptoms', appComments = '$comment' WHERE requestID = '$id'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    displayModal("Appointment Updated", "32CD32");
                    header('Location: /Web_Tech/user/userappointment.php');
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
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

<?php

$currentUser = $_SESSION['email'];
$sql = "SELECT * FROM patient WHERE p_email = '$currentUser'";
$result = mysqli_query($conn, $sql);

if ($result) {
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_array($result)) {

?>

<div class="appointment-table container border rounded mt-5 mb-5 p-4">
        <div class="page-header">
            <h1 style="font-size: 65px;">Appointment List</h1>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading" style="background-color: #006cff; color: white">List of Appointment</div>
            <div class="panel-body">
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
                            <button type="submit" class="btn btn-danger"  data-bs-dismiss="modal"  onclick="closeModalAndRedirect()">Cancel</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
</div>
                

<script>
function closeModalAndRedirect() {
    var modal = document.querySelector(".modal-alert");
    if (modal) {
        modal.remove();
    }
    window.location.href = "/Web_Tech/user/userappointment.php";
}
</script>

</body>
</html>