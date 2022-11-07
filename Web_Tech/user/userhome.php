


<?php
include 'D:\xampp\htdocs\Web_Tech\config\config.php';
session_start();
include 'D:\xampp\htdocs\Web_Tech\user\userheader.php';


$currentUser = $_SESSION['email'];
$sql = "SELECT * FROM patient WHERE p_email = '$currentUser'";
$result = mysqli_query($conn, $sql);

if(isset($_POST['appointsub'])) {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $symptoms = $_POST['symptom'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO appointment (p_email, appDate, appTime, appSymptoms, appComments) VALUES ('$currentUser', '$date', '$time', '$symptoms', '$comment')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Message sent to the admin. The admin will message you once product is available. Thankyou!";
    } else {
        echo "Message not sent";
    }
}

?>
<?php
include 'D:\xampp\htdocs\Web_Tech\config\config.php';

$currentUser = $_SESSION['email'];
$sql = "SELECT * FROM patient WHERE p_email = '$currentUser'";
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
    <link rel="stylesheet" href="Web_Tech/css/style.css">
    <link rel="stylesheet" href="Web_Tech/css/reglog.css">
    <title>MedBook</title>
</head>
<body>
<!--appointment_form-->


<!--header-->
<!--image-->
<div class="slider-wrapper">


    <div class="slide1 bg-cover d-flex align-items-center" style="height: 80vh;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h6 class="text-uppercase text-white">Your illness, Our happiness!</h6>
                    <h1 class="display-2 my-4 text-white text-uppercase">Certified Doctor's <br>Appointment System</h1>
                </div>
            </div>
        </div>
    </div>
</div>


<!--appointment set-->
<div class="medbook-book-an-appoinment-area">
    <div class="container">
        <div class="row">
            <div class="col-auto mx-auto">
                <div class="appointment-form-content border-0 shadow rounded">
                    <div class="row no-gutters align-items-center">
                        <div class="col-12 col-md-9">
                            <div class="medbook-appointment-form">
                                    <div class="row align-items-end">
                                        <div class="col-12 col-md-9">
                                            <h2 class="modal-title" style="color: white;">MAKE AN APPOINTMENT NOW</h2><br>
                                            <h6 class="modal-title" style="color: white;">Click on the button to start an appointment</h6><br>
                                            <div class="col-12 col-md-5">
                                                <div class="form-group mb-0">
                                                    <button type="submit" class="btn medilife-btn" id="medilife" data-bs-toggle="modal" data-bs-target="#myModal">Appointment <span>+</span></button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-10 col-lg-3">
                            <div class="medbook-contact-info">
                                <!-- Single Contact Info -->
                                <div class="single-contact-info mb-30">
                                    <i class="fa-regular fa-clock"></i>
                                    <p>Mon - Sat 08:00 - 21:00 <br>Sunday CLOSED</p>
                                </div>
                                <!-- Single Contact Info -->
                                <div class="single-contact-info mb-30">
                                    <i class="fa-solid fa-envelope"></i>
                                    <p>0080 673 729 766 <br>contact@business.com</p>
                                </div>
                                <!-- Single Contact Info -->
                                <div class="single-contact-info">
                                    <i class="fa-solid fa-location-pin"></i>
                                    <p>Lamas Str, no 14-18 <br>41770 Miami</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- modal content -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contact Us</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- modal body start -->
            <div class="modal-body">
                <!-- form start -->
                <div class="container" id="wrap">
                    <div class="row">
                        <div class="col">
                            <form class="form" role="form" method="POST" accept-charset="UTF-8">



                                <div class="panel panel-default">
                                    <div class="panel-heading">Patient Information</div>
                                    <div class="panel-body">
                                        Patient Name: <?php echo $row['p_FullName'] ?><br>
                                        Email: <?php echo $row['p_email'] ?><br>
                                        Contact Number: <?php echo $row['p_number'] ?><br>
                                        Address: <?php echo $row['p_address'] ?>
                                    </div>
                                </div>
                                <?php

                                                }
                                            }
                                        }
                                        ?>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-sm-6">
                                        <label for="">Date of Birth</label>
                                        <input type="date" name="date" id="data" class="form-control" />
                                    </div>
                                    <div class="form-group col-sm-6 col-sm-6">
                                        <label for="">Time</label>
                                        <input type="time" name="time" id="time" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Symptom:</label>
                                    <input type="text" class="form-control" id="symptom" name="symptom" required>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label">Comment:</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="4" required></textarea><br>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="appointsub" id="appointsub" class="btn btn-primary">Submit</button>
                            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!--bottom content-->
<section id="content-1-9" class="content-1-9 content-block">
    <div class="container">
        <div class="underlined-title mb-3 text-center">
            <h1>The Future of Healing</h1>
            <hr>
            <h2>Why choose us?</h2>
        </div>
        <div class="row text-center mb-3" id="contents">
            <div class="col-md-4 col-sm-12 col-xs-12 pad25 mb-5">
                <div class="feats col-xs-2 border shadow">
                    <span class="fa-solid fa-user-doctor"></span>
                </div>
                <div class="col-xs-10">
                    <h4>Qualified Doctors</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12 pad25">
                <div class="feats col-xs-2 border shadow">
                    <span class="fa-solid fa-heart-pulse"></span>
                </div>
                <div class="col-xs-10">
                    <h4>Emergency Care</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12 pad25">
                <div class="feats col-xs-2 border shadow ">
                    <span class="fa-solid fa-hand-holding-medical"></span>
                </div>
                <div class="col-xs-10">
                    <h4>Great Service</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12 pad25">
                <div class="feats col-xs-2 border shadow">
                    <span class="fa-solid fa-shield-heart"></span>
                </div>
                <div class="col-xs-10">
                    <h4>Quality and Safety</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12 pad25">
                <div class="feats col-xs-2 border shadow">
                    <span class="fa-regular fa-clipboard"></span>
                </div>
                <div class="col-xs-10">
                    <h4>Personalized Treatments</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12 pad25">
                <div class="feats col-xs-2 border shadow">
                    <span class="fa-solid fa-microscope"></span>
                </div>
                <div class="col-xs-10">
                    <h4>Advance Equipments</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>

<!--footer-->
<footer>
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <a class="navbar-brand" href="">MedBook</a>
                    <p>Lorem ipsum dolor sit amet. In dolor rerum eum soluta reiciendis et omnis velit. Et molestias neque qui sapiente ratione aut tempore soluta.</p>
                    <div class="socal-links">
                        <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                        <a href=""><i class="fa-brands fa-twitter"></i></i></a>
                        <a href=""><i class="fa-brands fa-github"></i></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 mx-auto mt-3">
                    <div class="footer_widget">
                        <h5 class="text-uppercase mb-4 font-weight-bold">Quick Links</h5>
                        <p><a href="#" class="text-white">Home</a></p>
                        <p><a href="#" class="text-white">About Us</a> </p>
                        <p><a href="#" class="text-white">Appointment</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <div class="footer_address">
                        <h5 class="text-uppercase mb-4 font-weight-bold">Contact Us</h5>
                        <p><i class="fa-solid fa-location-dot mr-3"></i>Zamboanga City</p>
                        <p><i class="fa-solid fa-phone mr-3"></i>+63 9273930696</p>
                        <p><i class="fa-solid fa-envelope mr-3"></i>abc_def@gmail.com</p>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <p class="mb-0">Lorem ipsum dolor sit amet. In dolor rerum eum soluta reiciendis </p>
        </div>
    </div>


</footer>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


</body>
</html>




