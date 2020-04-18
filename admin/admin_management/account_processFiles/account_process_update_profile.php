
<?php
//    Start separate string

//  FullName to firstname and last name

    $joinFLN = $_POST['fullName'];
    list($fName, $lName) = explode(' ',$joinFLN);
    $firstName =  trim($fName);
    $lastName = trim($lName);

// from first name and last name to FullName
// $try = array($firstName, $lastName);
// $fullName =  join(" ",$try);
// echo $fullName;

//    End separate string

    $countryCode = $_POST['countryCode'];
    $userDetail_id = $_POST['userDetail_id'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $date = $_POST['new_date'];

//echo $countryCode;
//    echo $phoneNumber;
//    echo $userDetail_id;
//    echo $firstName;
//    echo $lastName;
//    echo $email;
//    echo $gender;
//    echo $birthday;
//    echo $date;?><!--<br>--><?php

require('../../../spdb.php');

$query = "UPDATE userDetail SET userDetail_id='$userDetail_id', email='$email', country_code= '+$countryCode' , phoneNumber='$phoneNumber', gender='$gender', firstName='$firstName', lastName='$lastName', birthday='$birthday', updateDate='$date' WHERE userDetail_id='$userDetail_id'";
$result = mysqli_query($dbcon, $query);
if($result)
{
    session_start();
    $_SESSION["userDetail_id"] = $userDetail_id;
    header('location: ../account_profile.php');
}
mysqli_close($dbcon);