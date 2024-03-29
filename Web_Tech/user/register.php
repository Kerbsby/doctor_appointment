
<?php
include 'C:\xampp\htdocs\Web_Tech\default\header.php';

require_once 'C:\xampp\htdocs\Web_Tech\config\config.php';

error_reporting(0);

if(isset($_POST['signup'])) {
    $pFullName = $_POST['pFullName'];
    $pEmail = $_POST['pEmail'];
    $pNumber = $_POST['pNumber'];
    $pAddress = $_POST['pAddress'];
    $password = md5($_POST['password']);
    $confirm_password = md5($_POST['confirm_password']);
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $DOB = $year . "-" . $month . "-" . $day;
    $pGender = $_POST['pGender'];

    if($password == $confirm_password){
        $sql = "SELECT * FROM patient WHERE p_email = '$pEmail'";
        $result = mysqli_query($conn, $sql);
        if(!$result->num_rows > 0) {
            $sql = "INSERT INTO patient(p_FullName, p_email, p_number, p_address, p_password, p_DOB, p_gender) VALUES ('$pFullName', '$pEmail', '$pNumber', '$pAddress', '$password', '$DOB', '$pGender')";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo '<script>';
                echo 'function createAlert(message) {';
                echo '    var alertBox = document.createElement("div");';
                echo '    alertBox.className = "alert";';
                echo '    alertBox.innerHTML = `<span class="close-button" onclick="closeAlert()">&times;</span><p>${message}</p>`;';
                echo '    alertBox.style.backgroundColor = "#66ff66";';  
                echo '    document.body.appendChild(alertBox);';
                echo '}';
                echo 'function closeAlert() {';
                echo '    var alertBox = document.querySelector(".alert");';
                echo '    if (alertBox) { alertBox.remove(); }';
                echo '}';
                echo 'createAlert("Registered Successfully");';
                echo '</script>';
            } else{
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
                echo 'createAlert("Woops! Something went wrong.");';
                echo '</script>';
            }
        } else{
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
            echo 'createAlert("Woops! Email already exists.");';
            echo '</script>';
        }

    } else{
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
        echo 'createAlert("Password Not Matched.");';
        echo '</script>';
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
    <div class="register-bg">
        <div class="reg-form container " id="reg-form">
            <form action="register.php" class="form-signup" method="post">
                <div class="reg-title">
                    <h2 class="modal-title">Sign Up</h2>
                    <h5>Join and give us money</h5>
                </div>
                <hr class="mb-3">
                <div class="row">
                    <div class="col-sm-6 col-sm-6">
                        <label>FullName</label><input type="text" name="pFullName" value="" id="fullname" class="form-control input-lg" placeholder="Full Name" required />
                    </div>
                    <div class="col-sm-6 col-sm-6">
                    <label>Phone Number</label><input type="text" name="pNumber" value="" id="number" class="form-control input-lg" placeholder="Your Phone Number"  required/>
                    </div>
                </div>
                <label>Email</label>
                <input type="email" name="pEmail" value="" id="email" class="form-control input-lg " placeholder="Your Email"  required/>
                <label>Address</label>
                <input type="text" name="pAddress" value="" id="address" class="form-control input-lg" placeholder="Address" required />

                <label>Password</label>
                <input type="password" name="password" value="" id="password" class="form-control input-lg" placeholder="Password"  required/>
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" id="password" value="" class="form-control input-lg" placeholder="Confirm Password"  required/>
                <label>Birth Date</label>
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
                <div class=gender>
                    <label>Gender : </label>
                    <label class="radio-inline">
                        <input type="radio" id="gender" name="pGender" value="male" required/>Male
                    </label>
                    <label class="radio-inline" >
                        <input type="radio" id="gender" name="pGender" value="female" required/>Female
                    </label>
                </div>
                <div class="accountreg-link">
                    <a href="/Web_Tech/doctor/doctor_reg.php">Signup as Doctor?</a>
                </div>
                <div class="d-md-flex justify-content-md-end">
                    <button class="btn me-md-2 signup-btn" type="submit" name="signup" id="signup">Create my account</button>
                </div>
            </form>
        </div>
    </div>
</section>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>


</body>
</html>