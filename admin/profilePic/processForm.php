<?php
  $msg = "";
  $msg_class = "";
$conn = mysqli_connect('10.0.6.239', 'mydatabase_admin', 'Asd,car15', 'simpledb');
  if (isset($_POST['save_profile'])) {
//      $bio = stripslashes($_POST['bio']);
      $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
//      echo $bio;
//      $target_dir = "/var/www/html/uploads/";
      $target_file = $target_dir . basename($profileImageName);
      if($_FILES['profileImage']['size'] > 200000) {
          $msg = "Image size should not be greated than 200Kb";
          $msg_class = "alert-danger";
      }
      if(file_exists($target_file)) {
          $msg = "File already exists";
          $msg_class = "alert-danger";
      }

      if (empty($error)) {
          if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file))
          {
//              $sql = "INSERT INTO users SET profile_image='$profileImageName', bio='$bio'";
//              $sql = "INSERT INTO users (profile_image, bio) VALUES ('$profileImageName', '$bio')";
              if(mysqli_query($conn, $sql)){
                  $msg = "Image uploaded and saved in the Database";
                  $msg_class = "alert-success";
              } else {
                  $msg = "There was an error in the database";
                  $msg_class = "alert-danger";
              }
          } else {
              $msg = "There was an error uploading the file";
              $msg_class = "alert-danger";
          }
      }
  }
?>