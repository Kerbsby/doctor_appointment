<?php
include 'C:\xampp\htdocs\Web_Tech\config\config.php';
session_start();

$searchTerm = "";
$searchResultsArray = [];

if (isset($_GET['searchTerm']) && isset($_GET['results'])) {
    $searchTerm = urldecode($_GET['searchTerm']);
    $searchResultsArray = json_decode(urldecode($_GET['results']), true);
}
?>

<?php include 'C:\xampp\htdocs\Web_Tech\user\userheader.php'; ?>

<?php


$searchTerm = "";
$searchResultsArray = [];


if (isset($_POST['submit_search']) || (isset($_GET['fromUserHome']) && $_GET['fromUserHome'] === 'true')) {
    $searchTerm = mysqli_real_escape_string($conn, isset($_POST['search']) ? $_POST['search'] : $_GET['searchTerm']);

 
    $sql = "SELECT * FROM doctor WHERE d_FullName LIKE '%$searchTerm%' OR d_specialize LIKE '%$searchTerm%'";
    $result = mysqli_query($conn, $sql);

 
    if (!$result) {
        die('Error in SQL query: ' . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $searchResultsArray[] = $row;
        }
    }
} else {

    $sql = "SELECT * FROM doctor";
    $result = mysqli_query($conn, $sql);


    if (!$result) {
        die('Error in SQL query: ' . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $searchResultsArray[] = $row;
        }
    }
}


mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bf1c643ee2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/reglog.css">
    <link rel="stylesheet" href="../css/userdoc.css">
    <title>MedBook</title>
</head>
<body>
<div class="container">
    <div class="doctor-search">
        <form method="post" action="">
            <div class="col-md-6 col-lg-6 col-11 mt-5 mx-auto my-auto search-bar">
                <div class="input-group form-container">
                    <input type="text" name="search" class="form-control input-search" placeholder="Search Doctor or Specialization" autofocus="autofocus" autocomplete="off">
                    <span class="input-btn">
                        <button type="submit" name="submit_search" class="btn search-btn">
                            <i class="fa-solid fa-magnifying-glass" width="40"></i>
                        </button>
                    </span>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container">
    <div class="page-header">
        <h1 class="doctor-title">Doctors List</h1>
    </div>

    <section id="doctormain">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Doctor Name</th>
                        <th scope="col">Specialization</th>
                        <th scope="col">Time</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($searchResultsArray as $doctor): ?>
                        <tr>
                            <td><?= $doctor['d_FullName']; ?></td>
                            <td><?= $doctor['d_specialize']; ?></td>
                            <td><?php echo date("h:i A", strtotime($doctor['start_time'])) . " - " . date("h:i A", strtotime($doctor['end_time'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>