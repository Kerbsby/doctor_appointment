
<?php

require_once 'D:\xampp\htdocs\Web_Tech\config\config.php';

session_start();
error_reporting(0);


if (isset($_POST['loginuser'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM patient WHERE p_email = '$email' AND p_password='$password'";
    $result = mysqli_query($conn, $sql);


    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        header("Location: /Web_Tech/user/userhome.php");
        }
    else {
        echo 'Email or Password is Wrong!';
    }
}





if (isset($_POST['logindoc' ])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM doctor WHERE d_email = '$email' AND d_password='$password'";
    $result = mysqli_query($conn, $sql);


    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        echo 'good';
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
    <script src="https://kit.fontawesome.com/bf1c643ee2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/Web_Tech/css/style.css">
    <link rel="stylesheet" type="text/css" href="/Web_Tech/css/reglog.css">
    <title>MedBook</title>
</head>

<body>
<header class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a href="#" class="navbar-brand mb-0" >
                <i class="fa-solid fa-truck-medical"></i>MedBook
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-lable="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" id="nav_left">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/Web_Tech/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Apointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto" id="nav_right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Signup
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/Web_Tech/user/register.php">User</a></li>
                            <li><a class="dropdown-item" href="/Web_Tech/doctor/doctor_reg.php">Doctor</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Login as User
                        </a>
                        <ul class="dropdown-menu">
                            <form action="" method="POST">
                                <div class="form-group" id="logform">
                                    <input type="email" class="form-control input-lg " placeholder="Email Address" id="email" name="email" value="<?php echo $email; ?>" required>
                                </div>
                                <div class="form-group" id="logform">
                                    <input type="password" class="form-control input-lg" id="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                                </div>
                                <div class="form-group d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-block" name="loginuser" id="loginuser">Login</button>
                                </div>
                            </form>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Login as Doctor
                        </a>
                        <ul class="dropdown-menu">
                            <form action="" method="POST">
                                <div class="form-group" id="logform">
                                    <input type="email" class="form-control input-lg " placeholder="Email Address" id="email" name="email" value="<?php echo $email; ?>" required>
                                </div>
                                <div class="form-group" id="logform">
                                    <input type="password" class="form-control input-lg" id="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                                </div>
                                <div class="form-group d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-block" name="logindoc" id="logindoc">Login</button>
                                </div>
                            </form>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>


</body>
</html>

