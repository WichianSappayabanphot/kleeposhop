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
    <title>KPS | Admin_Account</title>
    <link href="../ad_asset/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <link href="../ad_asset/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

    <!--connect to all of head connections-->
    <?php include ("../adminInclude/admin_head.php"); ?>
    <!--connect to log out pop up dialog-->
    <?php include ("../ad_asset/log_out_popup.php"); ?>

</head>
<body class="sb-nav-fixed">
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
                    <a href="account_manage_profile.php">
                        <li class="breadcrumb-item active" >
                            <i class="fas fa-long-arrow-alt-left"></i>
                            <i class="fas fa-address-card"></i>
                            My Profile
                        </li>
                    </a>
                </ol>


                <?php

                $userDetail_id = $_SESSION["userDetail_id"];

                require ('../../spdb.php');

                $query = "select * from userDetail where userDetail_id='$userDetail_id'";
                $result = mysqli_query($dbcon, $query);
                if ($row = mysqli_fetch_assoc($result))
                {
                    //Combine first name and last name
                    $firstName = $row['firstName'];
                    $lastName = $row['lastName'];
                    $try = array($firstName, $lastName);
                    $fullName =  join(" ",$try);


                    //Combine country code and phone number
                    $countryCode = $row['country_code'];
                    $phone_number = $row['phoneNumber'];
                    $try = array($countryCode, $phone_number);
                    $phoneNumber =  join(" ",$try);

                    $_SESSION["userDetail_id"] = $row['userDetail_id'];

                    ?>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">VIEW PROFILE</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="account_processFiles/account_process_update_profile.php" class="login100-form validate-form p-b-33 p-t-5">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="fullName">Full Name</label>
                                                        <input class="form-control py-4" name="fullName" id="fullName" type="text"
                                                               value="<?php echo $fullName; ?>" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="userDetail_id">User ID</label>
                                                        <input class="form-control py-4" name="userDetail_id" id="userDetail_id" type="number" value="<?php echo $row['userDetail_id'];?>" readonly/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email" class="small mb-1" >Email</label>
                                                        <input class="form-control py-4" name="email" id="email" type="email" aria-describedby="emailHelp" value="<?php echo $row['email'];?>" readonly/>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="gender">Gender</label>
                                                        <select id="gender" name="gender" class="form-control" style="height: 47px;" readonly>
                                                            <option value="<?php echo $row['gender']; ?>" selected><?php echo $row['gender']; ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="birthday">Birthday</label>
                                                        <input class="form-control py-4" name="birthday" id="birthday" type="date" value="<?php echo $row['birthday'];?>" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="phoneNumber">Mobile</label>
                                                        <input class="form-control py-4" name="" id="phoneNumber" type="text" value="<?php echo $phoneNumber;?>" readonly/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="new_date">Updating Date: </label>
                                                        <input class="form-control py-4" name="new_date" id="new_date" readonly>
                                                        <script>
                                                            const d = new Date();
                                                            document.getElementById("new_date").value = `${d.getFullYear()}-${d.getMonth()+1}-${d.getDate()} ${d.getHours()}:${d.getMinutes()}:${d.getSeconds()}`;
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                            <center>
                                                <label>
                                                    <a href="account_editProfile.php?userDetail_id=<?php $_SESSION["userDetail_id"]; ?>"><input class="btn btn-primary btn-block" type="button" value="EDIT PROFILE" /></a>
                                                </label>
                                                <label>
                                                    <a href="account_resetPassword.php?userDetail_id=<?php $_SESSION["userDetail_id"]; ?>"><input class="btn btn-primary btn-block" type="button" value="CHANGE PASSWORD"></a>
                                                </label>
                                            </center>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                mysqli_close($dbcon);
                ?>
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
