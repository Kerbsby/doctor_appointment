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
        $_SESSION['email'] = $email;
        header("Location: /Web_Tech/user/userhome.php");
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
                <h2 class="modal-title">Sign Up</h2>
                <h5>Join and give us money</h5>
                <hr class="mb-3">
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
        </div>

</section>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>


</body>
</html>












































<!--<li class="nav-item dropdown">
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