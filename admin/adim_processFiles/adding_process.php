<?php
$errors = array();
$itemType = trim($_POST['itemType']);
if (empty($itemType)) {
    $errors[] = 'You forgot to enter Item type.';
}
$price = trim($_POST['price']);
if (empty($price)) {
    $errors[] = 'You forgot to enter your email address.';
}
$gender_item = trim($_POST['gender_item']);
if (empty($gender_item)) {
    $errors[] = 'You forgot to enter your email address.';
}
$image = trim($_POST['image']);
if (empty($image)) {
    $errors[] = 'You forgot to enter your user type.';
}



if (empty($errors)) {
    try {
        $hashed_passcode = password_hash($password1, PASSWORD_DEFAULT);
        require ('../spdb.php');

        $query = "INSERT INTO users (username, password, email, phoneNumber, userType, date) VALUES(?,?,?,?,?,NOW())";

        $q = mysqli_stmt_init($dbcon);
        mysqli_stmt_prepare($q, $query);

        mysqli_stmt_bind_param($q, 'sssss', $username, $hashed_passcode, $email, $phoneNumber, $userType);
        mysqli_stmt_execute($q);

        if (mysqli_stmt_affected_rows($q) == 1 )
        {
            echo "register successful...";
            header ("location: ../login/login.php");
            exit();
        } else {
            $errorstring = "<p class='text-center col-sm-8' style='color:red'>";
            $errorstring .= "System Error<br />You could not be registered due ";
            $errorstring .= "to a system error. We apologize for any inconvenience.</p>";
            echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
            echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $query . '</p>';
            mysqli_close($dbcon);
            echo '<footer class="jumbotron text-center col-sm-12"
	        style="padding-bottom:1px; padding-top:8px;">';
            include("footer.php");
            echo '</footer>';
            exit();
        }
    }
    catch(Exception $e)
    {
        print "The system is busy please try later";
    }
    catch(Error $e)
    {
        print "The system is busy please try again later.";
    }
} else {
    $errorstring = "Error! <br /> The following error(s) occurred:<br>";
    foreach ($errors as $msg) { // Print each error.
        $errorstring .= " - $msg<br>\n";
    }
    $errorstring .= "Please try again.<br>";
    echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
}
?>