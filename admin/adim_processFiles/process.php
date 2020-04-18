<?php
// connect to the database
//$conn = mysqli_connect('10.0.6.239', 'mydatabase_admin', 'Asd,car15', 'file-management');
require ('../spdb.php');

$sql = "SELECT * FROM item_type";

$result = mysqli_query($dbcon, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = '/var/www/html/uploads/' . $filename;
//    echo $destination;
    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

//    if (!in_array($extension, ['zip', 'pdf', 'docx']))
    if (!in_array($extension, ['jpg', 'png', 'jpeg', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF']))
    {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 3e+6) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {

        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination))
        {

            $sql = "INSERT INTO files (name, size, downloads) VALUES ('$filename', $size, 0)";
//            echo $sql;
//            echo " up to here ";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to view_product file.";
        }
    }
}

// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '/var/www/html/uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('/var/www/html/uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}
