<?php
        $userDetail_id = trim($_POST["userDetail_id"]);
        //  FullName to firstname and last name
        $joinFLN = $_POST['fullName'];
        list($fName, $lName) = explode(' ',$joinFLN);
        $firstName =  trim($fName);
        $lastName = trim($lName);
        // end

        $phoneNumber = trim($_POST['phoneNumber']);
        $userAddress = trim($_POST['userAddress']);
        $userProvince = trim($_POST['userProvince']);
        $userDistrict = trim($_POST['userDistrict']);
        $userPostcode = trim($_POST['userPostcode']);

        require('../../../spdb.php');

        $query = "UPDATE spdb.userDetail SET userDetail_id='$userDetail_id',  phoneNumber='$phoneNumber',  firstName='$firstName', lastName='$lastName', user_address='$userAddress', user_district='$userDistrict', user_province='$userProvince', user_postcode='$userPostcode' WHERE userDetail_id='$userDetail_id'";
        $result = mysqli_query($dbcon, $query);
        if($result)
        {
            session_start();
            if(isset($_REQUEST['submit']))
            {
                $_SESSION['message'] = "Updated ADDRESS is Successful.";
                echo"<script>window.location.href='../account_addressBook.php'</script>";
            }
            exit();
        }
        mysqli_close($dbcon);

