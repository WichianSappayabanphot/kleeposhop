<?php
include ('session_start.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>KPS | Password Reset</title>
    <link href="../ad_asset/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
<!--    <link href="../ad_asset/css/styles.css" rel="stylesheet" />-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>-->

    <!--connect to all of head connections-->
    <?php include ("../adminInclude/admin_head.php"); ?>
    <!--connect to log out pop up dialog-->
    <?php include ("../ad_asset/log_out_popup.php"); ?>

</head>
<body class="sb-nav-fixed">
<?php
$userDetail_id = $_SESSION["userDetail_id"];
require('../../spdb.php');
$query = "SELECT username, userType FROM users WHERE user_id='$userDetail_id'";
$q = mysqli_query($dbcon, $query);
$row = mysqli_fetch_assoc($q);
$_POST['username'] = $row['username'];
$_POST['userType'] = $row['userType'];
?>
<!--Start Navigation-->
<!--connect to account navigation top bar-->
<?php include('account_includeFiles/account_nav_topbar.php');?>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <!--connect to account navigation side bar-->
            <?php include('account_includeFiles/account_nav_sidebar.php');?>

            <!--show user login Type-->
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:
                    <?php echo $_SESSION["user_type"];?>
                </div>
            </div>
            <!-- End show user Type-->
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <a href="account_manage_profile.php">
                    <h4 class="mt-4" style="color: black;">
                        Account Management
                    </h4>
                </a> <br>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><a href="account_profile.php" style="color: black;"><i class="fas fa-long-arrow-alt-left"></i>  Profile</a> </li>
                </ol>
<!--                <body class="bg-primary">-->
                <div id="layoutAuthentication">
                    <div id="layoutAuthentication_content">
                        <main>
                            <?php
                            if (isset($_SESSION['message']))
                            {
                                echo "<p>".$_SESSION['message']."</p>";
                            }
                            unset($_SESSION['message']);
                            ?>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7">
                                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Reset Password</h3></div>
                                            <div class="card-body">
<!--                                                ?userDetail_id=--><?php // ?>
                                                <!--  <form action="ad_resetPS.php" method="POST" class="login100-form validate-form p-b-33 p-t-5" name="regform" id="regform" onsubmit="return checked();">-->
                                                <form action="account_processFiles/account_process_resetPassword.php" method="POST" class="login100-form validate-form p-b-33 p-t-5" name="regform" id="regform">
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label class="small mb-1" for="username">UserName </label>
                                                                <input class="form-control py-4" name="username" id="username" type="text" placeholder="Enter first name"
                                                                       value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label class="small mb-1" for="userType">User Type</label>
                                                                <input class="form-control py-4" name="userType" id="userType" type="text"
                                                                       value="<?php if (isset($_POST['userType'])) echo $_POST['userType'];?>" readonly/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label class="small mb-1" for="password">Previous Password</label>
                                                                <input class="form-control py-4" name="password" id="password" type="password" placeholder="Enter old Password"
                                                                       value="<?php if (isset($_POST['password'])) echo $_POST['password'];?>"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label class="small mb-1" for="new_password">New Password</label>
                                                                <input class="form-control py-4" id="new_password"  name="new_password" type="password" placeholder="Enter New password"
                                                                       value="<?php if (isset($_POST['new_password'])) echo $_POST['new_password'];?>"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label class="small mb-1" for="verify_password">Confirm Password</label>
                                                                <input class="form-control py-4" id="verify_password" name="verify_password" type="password" placeholder="Confirm password"
                                                                       value="<?php if (isset($_POST['verify_password'])) echo $_POST['verify_password'];?>"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <center>
                                                        <label>
                                                            <a href="account_profile.php"> <input class="form-group mt-4 mb-0 btn btn-primary btn-block" type="button" value="CANCEL"></a>
                                                        </label>
                                                        <label>
                                                            <button id="submit" class="form-group mt-4 mb-0 btn btn-primary btn-block" type="submit" name="submit" >
                                                                SAVE
                                                            </button>
                                                        </label>
                                                    </center>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
<!--                <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>-->
<!--                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>-->
<!--                <script src="../ad_asset/js/scripts.js"></script>-->
                </body>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <!--connect to footer file-->
                <?php include('account_includeFiles/account_footer.php');?>
            </div>
        </footer>
    </div>
</div>
<!--Connect to the Script-->
<?php include ('../adminInclude/account_nav_bar_script.xsl');?>
</body>
</html>
