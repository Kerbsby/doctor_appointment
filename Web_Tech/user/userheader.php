


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
                        <a class="nav-link" aria-current="page" href="/Web_Tech/user/userhome.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Web_Tech/user/userappointment.php">Apointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto" id="nav_right">
                    <?php
                    $currentUser = $_SESSION['email'];
                    $sql = "SELECT * FROM patient WHERE p_email = '$currentUser'";

                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <li class="nav-item dropdown collapse navbar-collapse" id="navbarSupportedContent">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                       <?php echo $row['p_FullName'];?>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"href="/Web_Tech/user/userprofile.php">Profile</a></li>
                                        <li><a class="dropdown-item" href="/Web_Tech/user/userlogout.php">Logout</a></li>
                                    </ul>
                                </li>


                                <?php
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>


</body>
</html>


