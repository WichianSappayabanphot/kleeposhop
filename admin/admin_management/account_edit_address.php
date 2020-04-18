<?php
session_start();
if (!isset($_SESSION["userDetail_id"]))
{
    header("Location: ../../../login/login.php");
}
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
            <!--            --><?php //include('account_nav_sidebar.php');?>
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
    <?php
//    if ($_SERVER['REQUEST_METHOD'] == 'POST')
//    {
//        require ('process_edit.php');
//    }
    $userDetail_id = $_SESSION["userDetail_id"];
//    echo $userDetail_id;
    require('../../spdb.php');
    $query = "SELECT * FROM userDetail WHERE userDetail_id='$userDetail_id'";
    $q = mysqli_query($dbcon, $query);
    $row = mysqli_fetch_assoc($q);

    //Combine first name and last name
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $try = array($firstName, $lastName);
    $fullName =  join(" ",$try);
    //END
    $_POST['fullName'] = $fullName;
    $_POST['phoneNumber'] = $row['phoneNumber'];
    $_POST['userAddress'] = $row['user_address'];
    $_POST['userProvince'] = $row['user_province'];
    $_POST['userDistrict'] = $row['user_district'];
    $_POST['userPostcode'] = $row['user_postcode'];
    $_POST['userDetail_id'] = $row['userDetail_id'];
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <a href="account_manage_profile.php">
                    <h4 class="mt-4" style="color: black;">
                        Account Management
                    </h4>
                </a> <br>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active" ><a href="account_addressBook.php" style="color: black;"><i class="fas fa-long-arrow-alt-left"></i> <i class="far fa-address-book"></i> Edit My Address</a></li>
                </ol>
                <body class="bg-primary">
                <div id="layoutAuthentication">
                    <div id="layoutAuthentication_content">
                        <main>

                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7">
                                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                                            <div class="card-header"><h3 class="text-center font-weight-light my-4">EDIT ADDRESS</h3></div>
                                            <div class="card-body">
                                                <form action="account_processFiles/account_process_editAddress.php" method="POST" class="login100-form validate-form p-b-33 p-t-5" >
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label class="small mb-1" for="userDetail_id">User ID </label>
                                                                <input class="form-control py-4" name="userDetail_id" id="userDetail_id" type="text" placeholder="Enter first name"
                                                                       value="<?php if (isset($_POST['userDetail_id'])) echo $_POST['userDetail_id']; ?>" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label class="small mb-1" for="userAddress">Address</label>
                                                                <input class="form-control py-4" name="userAddress" id="userAddress" type="text"
                                                                       value="<?php if (isset($_POST['userAddress'])) echo $_POST['userAddress'];?>" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label class="small mb-1" for="fullName">Full name </label>
                                                                <input class="form-control py-4" name="fullName" id="fullName" type="text" placeholder="Enter first name"
                                                                       value="<?php if (isset($_POST['fullName'])) echo $_POST['fullName']; ?>" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group"><label class="small mb-1" for="userProvince">Province</label>
                                                                <input class="form-control py-4" id="userProvince"  name="userProvince" type="text" placeholder="Enter New password"
                                                                       value="<?php if (isset($_POST['userProvince'])) echo $_POST['userProvince'];?>"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label class="small mb-1" for="phoneNumber">Phone Number</label>
                                                                <input class="form-control py-4" name="phoneNumber" id="password" type="number" placeholder="Enter old Password"
                                                                       value="<?php if (isset($_POST['phoneNumber'])) echo $_POST['phoneNumber'];?>"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label class="small mb-1" for="userDistrict">District</label>
                                                                <input class="form-control py-4" id="userDistrict" name="userDistrict" type="text" placeholder="Confirm password"
                                                                       value="<?php if (isset($_POST['userDistrict'])) echo $_POST['userDistrict'];?>"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label class="small mb-1" for="userPostcode">Postcode</label>
                                                                <input class="form-control py-4" id="userPostcode" name="userPostcode" type="number" placeholder="Confirm password"
                                                                       value="<?php if (isset($_POST['userPostcode'])) echo $_POST['userPostcode'];?>"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <center>
                                                        <label>
                                                            <a href="account_addressBook.php"> <input class="form-group mt-4 mb-0 btn btn-primary btn-block" type="button" value="CANCEL"></a>
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
