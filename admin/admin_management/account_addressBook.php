<?php include ('session_start.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>KPS | Address Book</title>
    <link href="../ad_asset/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
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
    <?php

    $userDetail_id = $_SESSION["userDetail_id"];
    require ('../../spdb.php');
    $query = "select * from userDetail where userDetail_id='$userDetail_id'";
    $result = mysqli_query($dbcon, $query);
    if ($row = mysqli_fetch_assoc($result))
    {
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $try = array($firstName, $lastName);
    $fullName =  join(" ",$try);
    $_SESSION["userDetail_id"] = $row['userDetail_id'];
    ?>

    <div id="layoutSidenav_content">
        <main>

            <div class="container-fluid">
                <a href="account_manage_profile.php">
                    <h4 class="mt-4" style="color: black;">
                        Account Management
                    </h4>
                </a> <br>
                <div class="card mb-4">
                    <div class="card-header">
                        <a href="account_manage_profile.php">
                            <li class="breadcrumb-item active" >
                                <i class="fas fa-long-arrow-alt-left"></i>
                                <i class="far fa-address-book"></i>
                                User Book Address
                            </li>
                        </a>
                    </div>
                    <?php
                    if (isset($_SESSION['message']))
                    {
                        echo "<p>".$_SESSION['message']."</p>";
                    }
                    unset($_SESSION['message']);
                    ?>
                    <div class="card-body">
                        <table class="table " id="" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th><center>Full Name</center></th>
                                <th><center>Address </center></th>
                                <th><center>Postcode</center></th>
                                <th><center>Phone Number</center></th>
                                <th></th>
                                <th><center>Action</center></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><center><?php echo $fullName; ?></center></td>
                                <td><center><?php echo $row['user_address']; ?></center></td>
                                <td><center><?php echo $row['user_postcode']; ?></center></td>
                                <td><center><?php echo $row['phoneNumber']; ?></center></td>
                                <td>
                                    <p><center>Default Shipping Address</center></p>
                                    <p><center>Default Billing Address</center></p>
                                </td>
                                <td><a href="account_edit_address.php?userDetail_id=<?php $_SESSION["userDetail_id"]; ?>"><input class="btn btn-primary btn-block" type="button" value="Edit"></a> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <?php
        }
        mysqli_close($dbcon);
        ?>
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

