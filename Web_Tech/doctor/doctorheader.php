<?php

$currentUser = $_SESSION['d_email'];
$sql = "SELECT * FROM doctor WHERE d_email = '$currentUser'";

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
    <link rel="stylesheet" type="text/css" href="/Web_Tech/css/style.css">
    <link rel="stylesheet" type="text/css" href="/Web_Tech/css/dochome.css">
    <title>MedBook</title>
</head>

<body>

<div class="top-nav" id="home" style="background-color: black">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-auto">
                <p>
                    <i class="fa-regular fa-envelope"></i>
                    <span>medbook@gmail.com</span>
                </p>
                <p>
                    <i class="fa-solid fa-phone"></i>
                    <span>991-2494</span>
                </p>
            </div>
            <div class="col-auto social-icons">
                <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></i></a>
                <a href=""><i class="fa-brands fa-github"></i></i></a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" id="wrapper-header">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" id="docheader" href="doctorhome.php">Welcome Dr. <?php echo $row['d_FullName'];?></a>
        </div>

    </nav>

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

