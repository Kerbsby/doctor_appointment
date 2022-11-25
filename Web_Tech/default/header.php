<?php

require_once 'C:\xampp\htdocs\Web_Tech\config\config.php';


session_start();
error_reporting(0);


if (isset($_POST['loginuser'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM patient WHERE p_email = '$email' AND p_password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] =$email;
        header("Location: /Web_Tech/user/userhome.php");
    }

    else {
        echo 'Email or Password is Wrong!';
    }
}

?>







<link rel="stylesheet" type="text/css" href="/Web_Tech/css/style.css">
<link rel="stylesheet" type="text/css" href="/Web_Tech/css/reglog.css">


<body>

<div class="top-nav" id="home">
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
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto" id="nav_right">
                    <li class="nav-item dropdown collapse navbar-collapse" id="navbarSupportedContent">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Signup
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item"href="/Web_Tech/user/register.php">User</a></li>
                            <li><a class="dropdown-item" href="/Web_Tech/doctor/doctor_reg.php">Doctor</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown collapse navbar-collapse" id="navbarSupportedContent">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Login
                        </a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="" class="form" method="POST">
                                                <div class="form-group">
                                                    <label class="sr-only">Email</label><input type="email" class="form-control input-lg " placeholder="Email Address" id="email" name="email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only">Password</label> <input type="password" class="form-control input-lg" id="password" placeholder="Password" name="password" required>
                                                </div>
                                                <a class="navbar-text" style="font-size: 14px;" href="/Web_Tech/doctor/doctorlogin.php">Are you a doctor? Click here</a>
                                            <div class="form-group d-md-flex justify-content-md-end">
                                                <button type="submit" class="btn btn-block" name="loginuser" id="loginuser">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
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

