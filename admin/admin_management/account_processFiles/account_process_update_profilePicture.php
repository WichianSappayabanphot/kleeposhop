
<?php
//session_start();
//$userDetail_id = $_SESSION["userDetail_id"];
$userDetail_id = $_REQUEST['userDetail_id'];
$fir = $_POST['firstName'];

echo $userDetail_id;
//echo $fir;
require('../../../spdb.php');

$sql = "SELECT * FROM spdb.userDetail WHERE userDetail_id='$userDetail_id'";
$result = mysqli_query($dbcon, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files
if (isset($_POST['save']))
{ // if save button on the form is clicked

    // name of the uploaded file or image
    $filename = $_FILES['profileImage']['name'];
    echo $filename;
    // destination of the file on the server
    $destination = '/var/www/html/uploads/' . $filename;
//    echo $destination;
    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    // the physical file on a temporary uploads directory on the server
    $files = $_FILES['profileImage']['tmp_name'];
    $size = $_FILES['profileImage']['size'];

//    if (!in_array($extension, ['zip', 'pdf', 'docx']))
    if (!in_array($extension, ['jpg', 'png', 'jpeg', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF']))
    {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['profileImage']['size'] > 3e+6) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else
    {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($files, $destination))
        {
//            echo "move success";
            $sql = "UPDATE userDetail SET name ='$filename', size='$size' WHERE userDetail_id='$userDetail_id'";
            echo " up to here ";
            if (mysqli_query($dbcon, $sql)) {
                session_start();
                if(isset($_REQUEST['save']))
                {
                    $_SESSION['message'] = "File uploaded successfully";
                    echo "<script>window.location.href='../account_manage_profile.php'</script>";
                }
            }
        } else {
            echo "Failed to move product file.";
        }
    }
}
?>