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
        echo '<script>';
        echo 'function createAlert(message) {';
        echo '    var alertBox = document.createElement("div");';
        echo '    alertBox.className = "alert";';
        echo '    alertBox.innerHTML = `<span class="close-button" onclick="closeAlert()">&times;</span><p>${message}</p>`;';
        echo '    document.body.appendChild(alertBox);';
        echo '}';
        echo 'function closeAlert() {';
        echo '    var alertBox = document.querySelector(".alert");';
        echo '    if (alertBox) { alertBox.remove(); }';
        echo '}';
        echo 'createAlert("Email or Password is Wrong!");';
        echo '</script>';
    }
}


?>






<link rel="stylesheet" type="text/css" href="/Web_Tech/css/header.css">
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
            <div class="navbar-brand">
            <a href="#" class="mb-0" >
                <i class="fa-solid fa-truck-medical"></i>MedBook
            </a>
            </div>
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
                <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/Web_Tech/user/register.php">Signup</a>
                    </li>

                    <li class="nav-item dropdown navbar-collapse">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Login
                        </a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-12 login_inner">
                                        <form action="" class="form" method="POST">
                                        <div class="form-group" id="logform">
                                            <input type="email" class="form-control input-lg" placeholder="Email Address" id="email" name="email" required>
                                        </div>
                                        <div class="form-group" id="logform">
                                                    <label class="sr-only">Password</label> <input type="password" class="form-control input-lg" id="password" placeholder="Password" name="password" required>
                                                </div>
                                                <div class="form-group userchoice" id="logform">
                                                    <label class="radio-label">
                                                        <input type="radio" name="user_type" value="patient" required> Patient
                                                    </label>
                                                    <label class="radio-label">
                                                        <input type="radio" name="user_type" value="doctor" required> Doctor
                                                    </label>
                                                </div>
                                                <div id="navbar-text" style="color: blue;">
                                                <a href="/Web_Tech/user/register.php">Don't have an account? Click here</a>
                                                </div>
                                             <div class="form-group d-md-flex justify-content-md-end">
                                                <button type="submit" class="btn btn-block" name="login" id="login">Login</button>
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

