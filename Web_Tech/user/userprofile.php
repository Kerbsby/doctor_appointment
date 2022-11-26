<?php
include 'C:\xampp\htdocs\Web_Tech\config\config.php';
session_start();
include 'C:\xampp\htdocs\Web_Tech\user\userheader.php';
?>


<?php
include 'C:\xampp\htdocs\Web_Tech\config\config.php';

if(isset($_POST['submit'])) {
    $id = $_GET['update'];
    $fullname = $_POST['pFullName'];
    $number = $_POST['pNumber'];
    $email = $_POST['pEmail'];
    $address = $_POST['pAddress'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $DOB = $year . "-" . $month . "-" . $day;
    $gender = $_POST['pGender'];



    $sql = "UPDATE patient SET patientID =  '$id', p_FullName = '$fullname', p_email = '$email', p_number = '$number', p_address = '$address', p_DOB = '$DOB', p_gender = '$gender' WHERE patientID = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location: /Web_Tech/user/userprofile.php');
    }

}

?>

<?php
include 'C:\xampp\htdocs\Web_Tech\config\config.php';

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
    <link rel="stylesheet" type="text/css" href="/Web_Tech/css/style.css">
    <link rel="stylesheet" type="text/css" href="/Web_Tech/css/reglog.css">
    <link rel="stylesheet" href="/Web_Tech/css/docprofile.css">
    <title>MedBook</title>
</head>

<body>
<div class="panel panel-primary shadow p-3 mb-5 bg-body rounded">
    <div class="panel-heading" style="background-color: #092032">
        <h3 class="panel-title">Patient Details</h3>
    </div>


    <div class="panel-body">
        <!-- panel content start -->
        <div class="container">
            <section style="padding-bottom: 50px; padding-top: 50px;">
                <div class="row">
                    <!-- start -->
                    <!-- USER PROFILE ROW STARTS-->
                    <div class="row">
                        <div class="col-md-3 col-sm-3">

                            <div class="user-wrapper" >
                                <div class="description">
                                    <h3><?php echo $row['p_FullName'] ?></h3>
                                    <h6> <strong> Patient </strong></h6>

                                    <hr />
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn medilife-btn" id="medilife" data-bs-toggle="modal" data-bs-target="#userprofile"><a style="color: white; text-decoration: none;" href="?update=<?php echo $row['patientID']; ?>"> Update Profile </a><span>+</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-9 col-sm-9  user-wrapper">
                            <div class="description">
                                <h3> <?php echo $row['p_FullName']; ?> </h3>
                                <hr />

                                <div class="panel panel-default">
                                    <div class="panel-body">


                                        <table class="table table-user-information" align="center">
                                            <tbody>


                                            <tr>
                                                <td>Doctor ID</td>
                                                <td><?php echo $row['patientID']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Doctor FullName</td>
                                                <td><?php echo $row['p_FullName']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td><?php echo $row['p_address']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Contact Number</td>
                                                <td><?php echo $row['p_number']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?php echo $row['p_email']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Birthdate</td>
                                                <td><?php echo $row['p_DOB']; ?>
                                                </td>
                                            <tr>
                                                <td>Gender</td>
                                                <td><?php echo $row['p_gender']; ?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
</div>
</div>

<?php
}
}
}
?>



<div class="modal fade" id="userprofile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Update Profile</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <form action="" method="post" >
                    <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td>Patient FullName</td>
                            <td><input type="text" name="pFullName" value="" id="dfullname" class="form-control input-lg" placeholder="Full Name" required /></td>
                        </tr>
                        <tr>
                            <td>Phone number</td>
                            <td><input type="text" name="pNumber" value="" id="number" class="form-control input-lg" placeholder="Your Phone Number"  required/></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="email" name="pEmail" value="" id="email" class="form-control input-lg " placeholder="Your Email"  required/></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><input type="text" name="pAddress" value="" id="address" class="form-control input-lg" placeholder="Address" required /></td>
                        </tr>
                        <tr>
                            <td>DOB</td>
                            <td>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4">
                                        <select name="month" id="DOB" class = "form-control input-lg" required>
                                            <option value="">Month</option>
                                            <option value="01">Jan</option>
                                            <option value="02">Feb</option>
                                            <option value="03">Mar</option>
                                            <option value="04">Apr</option>
                                            <option value="05">May</option>
                                            <option value="06">Jun</option>
                                            <option value="07">Jul</option>
                                            <option value="08">Aug</option>
                                            <option value="09">Sep</option>
                                            <option value="10">Oct</option>
                                            <option value="11">Nov</option>
                                            <option value="12">Dec</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-4 col-md-4">
                                        <select name="day" id="DOB" class = "form-control input-lg" required>
                                            <option value="">Day</option>
                                            <option value="01">1</option>
                                            <option value="02">2</option>
                                            <option value="03">3</option>
                                            <option value="04">4</option>
                                            <option value="05">5</option>
                                            <option value="06">6</option>
                                            <option value="07">7</option>
                                            <option value="08">8</option>
                                            <option value="09">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-4 col-md-4">
                                        <select name="year" id="DOB" class = "form-control input-lg" required>
                                            <option value="">Year</option>

                                            <option value="1981">1981</option>
                                            <option value="1982">1982</option>
                                            <option value="1983">1983</option>
                                            <option value="1984">1984</option>
                                            <option value="1985">1985</option>
                                            <option value="1986">1986</option>
                                            <option value="1987">1987</option>
                                            <option value="1988">1988</option>
                                            <option value="1989">1989</option>
                                            <option value="1990">1990</option>
                                            <option value="1991">1991</option>
                                            <option value="1992">1992</option>
                                            <option value="1993">1993</option>
                                            <option value="1994">1994</option>
                                            <option value="1995">1995</option>
                                            <option value="1996">1996</option>
                                            <option value="1997">1997</option>
                                            <option value="1998">1998</option>
                                            <option value="1999">1999</option>
                                            <option value="2000">2000</option>
                                            <option value="2001">2001</option>
                                            <option value="2002">2002</option>
                                            <option value="2003">2003</option>
                                            <option value="2004">2004</option>
                                            <option value="2005">2005</option>
                                            <option value="2006">2006</option>
                                            <option value="2007">2007</option>
                                            <option value="2008">2008</option>
                                            <option value="2009">2009</option>
                                            <option value="2010">2010</option>
                                            <option value="2011">2011</option>
                                            <option value="2012">2012</option>
                                            <option value="2013">2013</option>
                                            <option value="2014">2014</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Gender</td>
                            <td>
                                <label class="radio-inline">
                                    <input type="radio" id="gender" name="pGender" value="male" required/>Male
                                </label>
                                <label class="radio-inline" >
                                    <input type="radio" id="gender" name="pGender" value="female" required/>Female
                                </label>
                            </td>
                        </tr>

                        </tbody>

                    </table>

                    <div class="modal-footer">
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Update</button>
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>



                </form>
                <!-- form end -->
            </div>

        </div>
    </div>
</div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>
</html>
