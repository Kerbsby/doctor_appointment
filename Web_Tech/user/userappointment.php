<?php
include 'D:\xampp\htdocs\Web_Tech\config\config.php';
session_start();
include 'D:\xampp\htdocs\Web_Tech\user\userheader.php';




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

<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <button class="btn-primary btn btn-sm" type="button" id="new_appointment"><i class="fa fa-plus"></i> New Appointment</button>
                <br>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Patient Email</th>
                        <th>Patient Date</th>
                        <th>Patient Time</th>
                        <th>Patient Symptoms</th>
                        <th>Comment</th>
                    </tr>
                    </thead>
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
                            <td><?= $row['appDate'];?></td>
                            <td><?= $row['appTime'];?></td>
                            <td><?= $row['appSymptoms'];?></td>
                            <td><?= $row['appComments'];?></td>

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
                </table>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>


</body>
</html>






