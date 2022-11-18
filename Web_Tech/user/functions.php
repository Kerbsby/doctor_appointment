<?php
require_once 'D:\xampp\htdocs\Web_Tech\config\config.php';

function getUserData($id)
{
    $array = $array();
    $sql = mysql_query("SELECT * FROM patient WHERE patientID='$id'");
    while($row = mysqli_fetch_assoc($sql))
    {
        $array('patientID') = $row['patientID'];
        $array('p_FullName') = $row['p_FullName'];
        $array('p_DOB') = $row['p_DOB'];
        $array('p_gender') = $row['p_gender'];
        $array('p_address') = $row['p_address'];
        $array('p_number') = $row['p_number'];
        $array('p_email') = $row['p_email'];
    }
    return $array;
}

function getID($username){
    $sql = mysql_query("SELECT * FROM patient WHERE p_username='".$username."'");
    while($row = mysqli_fetch_assoc($sql)){
        return $row['patientID'];
    }
}



?>
