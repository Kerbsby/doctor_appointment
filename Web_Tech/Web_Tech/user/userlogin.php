<?php

require_once 'C:\xampp\htdocs\Web_Tech\config\config.php';


session_start();
error_reporting(0);


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $userType = $_POST['user_type'];

    if ($userType == 'patient') {
        $sql = "SELECT * FROM patient WHERE p_email = '$email' AND p_password='$password'";
        $redirectUrl = "/Web_Tech/user/userhome.php";
    } elseif ($userType == 'doctor') {
        $sql = "SELECT * FROM doctor WHERE d_email = '$email' AND d_password='$password'";
        $redirectUrl = "/Web_Tech/doctor/doctorhome.php";
    }

    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($userType == 'patient') {
            $_SESSION['email'] = $email;
        } elseif ($userType == 'doctor') {
            $_SESSION['d_email'] = $email;
        }
        header("Location: $redirectUrl");
    } else {
        echo 'Email or Password is Wrong!';
    }
}


?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://kit.fontawesome.com/bf1c643ee2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/Web_Tech/css/style.css">
    <link rel="stylesheet" type="text/css" href="/Web_Tech/css/reglog.css">
    <title>MedBook</title>
</head>
<body>


<section class="sign-in">
    <div class="bg-image">
        <div class="container d-flex justify-content-center align-items-center" id="container">
            <form action="" class="form-signup border shadow p-3 rounded" method="POST">
                <h2 class="modal-title">Login</h2>
                <hr class="mb-3">
                
                <div class="form-group" id="logform">
                    <label>Email</label>
                    <input type="email" class="form-control input-lg" placeholder="Email Address" id="email" name="email" required>
                </div>
                
                <div class="form-group" id="logform">
                    <label>Password</label>
                    <input type="password" class="form-control input-lg" id="password" placeholder="Password" name="password" required>
                </div>

                <div class="form-group" id="logform">
                    <label>User Type</label>
                    <select class="form-control" name="user_type" required>
                        <option value="patient">Patient</option>
                        <option value="doctor">Doctor</option>
                    </select>
                </div>

                <div class="form-group d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-block" name="login" id="login">Login</button>
                </div>
            </form>
        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>
</html>






















