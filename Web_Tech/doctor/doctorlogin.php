<?php

require_once 'D:\xampp\htdocs\Web_Tech\config\config.php';


session_start();
error_reporting(0);


if (isset($_POST['logindoc'])) {
    $d_email = $_POST['d_email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM doctor WHERE d_email = '$d_email' AND d_password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['d_email'] =$d_email;
        header("Location: /Web_Tech/doctor/doctorhome.php");
    }
    else {
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
                <div class="col-sm-6 col-sm-6">
                    <div class="form-group" id="logform">
                        <label>Email</label><input type="email" class="form-control input-lg " placeholder="Email Address" id="d_email" name="d_email" required>
                    </div>
                </div>
                <div class="col-sm-6 col-sm-6">
                    <div class="form-group" id="logform">
                        <label>Password</label> <input type="password" class="form-control input-lg" id="password" placeholder="Password" name="password" required>
                    </div>
                </div>

                <div class="form-group d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-block" name="logindoc" id="logindoc">Login</button>
                </div>

            </form>
        </div>

</section>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>
</html>

