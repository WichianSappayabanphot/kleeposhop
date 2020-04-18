<?php
//$posted = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    try
    {
//        $posted = true;
//        $userDetail_id = $_SESSION["userDetail_id"];
//        echo $userDetail_id;
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        if (empty($password)) {
            header('location: ../account_resetPassword.php');
        }

//        Checking Password
        $new_password = trim($_POST['new_password']);
        if (empty($new_password)) {
            header('location: ../account_resetPassword.php');
        }
        $verify_password = trim($_POST['verify_password']);
        if (!empty($password))
        {
            if (!empty($new_password))
            {
                if (!empty($verify_password))
                {
                    if (($new_password != $verify_password ) || ($new_password == $password))
                    {
                        session_start();
                        if(isset($_REQUEST['submit']))
                        {

                            $_SESSION['message'] = "Your new password is the same as current password or cannot verify new password";
                            echo"<script>window.location.href='../account_resetPassword.php'</script>";
                        }
                        exit();
                    }
                }else
                {
                    session_start();
                    if(isset($_REQUEST['submit']))
                    {
                        $_SESSION['message'] = "You have to Enter your password, new password and confirm your password";
                        echo"<script>window.location.href='../account_resetPassword.php'</script>";
                    }
                }
            }else
            {
                session_start();
                if(isset($_REQUEST['submit']))
                {
                    $_SESSION['message'] = "You have to Enter your password, new password and confirm your password";
                    echo"<script>window.location.href='../account_resetPassword.php'</script>";
                }
            }
        }else
        {
            session_start();
            if(isset($_REQUEST['submit']))
            {
                $_SESSION['message'] = "You have to Enter your password, new password and confirm your password";
                echo"<script>window.location.href='../account_resetPassword.php'</script>";
            }
        }


        require('../../../spdb.php');

        $query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($dbcon, $query);
        $row = mysqli_fetch_assoc($result);
        $userID = $row['user_id'];
        $oldPS = $row['password'];
        if ($new_password == $verify_password)
        {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            if (password_verify($password, $oldPS))
            {
                $query = "UPDATE spdb.users SET password='$hashed_password' WHERE user_id='$userID' ";
                $result = mysqli_query($dbcon, $query);

                if ($result)
                {
                   session_start();
                   if(isset($_REQUEST['submit']))
                   {
                       $_SESSION["userDetail_id"] = $userID;
                        $_SESSION['message'] = "Updated PASSWORD Successfully!";
                        echo"<script>window.location.href='../account_resetPassword.php'</script>";
                   }
                    exit();
                } else {
                    echo "error" . $query;
                }
            }
        } else
        {
            session_start();
            if(isset($_REQUEST['submit']))
            {
                $_SESSION['message'] = "Updated PASSWORD Un-Successful due to new password and verify password is not the same.";
                echo"<script>window.location.href='../account_resetPassword.php'</script>";
            }
        }
    } catch (Exception $e)
        {
            print "The system is busy please try later";
        }
        catch (Error $e)
            {
                print "The system is busy please try again later.";
            }
}mysqli_close($dbcon);