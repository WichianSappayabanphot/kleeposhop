
<?php
$userDetail_id = $_SESSION["userDetail_id"];
//    echo $userDetail_id;
require ('../../spdb.php');
$query = "SELECT firstName, lastName From userDetail WHERE userDetail_id='$userDetail_id'";
$result = mysqli_query($dbcon, $query);
$row = mysqli_fetch_assoc($result);
$fName = $row['firstName'];
$lName = $row['lastName'];
$try = array($fName, $lName);
$fullName =  join(" ",$try);
//    echo "<a href='../admin_management/account_manage_profile.php'>".$fullName."</a>";
?>