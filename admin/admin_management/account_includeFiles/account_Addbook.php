<?php
include ('session_start.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>KPS | Address Book</title>
    <link href="../../ad_asset/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

    <?php include ('../../admin/adminInclude/ad_head.php'); ?>
    <?php include ('../admin_asset/log_out_popup.php'); ?>

</head>
<body class="sb-nav-fixed">
<?php include ('ad_nav_topbar.php');?>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <?php include('ad_nav_sidebar.php');?>

            <!--            admin login name -->
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:
                    <?php echo $_SESSION["user_type"];?>
                </div>
            </div>
            <!--            end show name -->

        </nav>
    </div>
    <?php

    $userDetail_id = $_SESSION["userDetail_id"];
    require('../../spdb.php');
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
            <?php
            if (isset($_SESSION['message']))
            {
                echo "<p>".$_SESSION['message']."</p>";
            }
            unset($_SESSION['message']);
            ?>
            <div class="container-fluid">
                <a href="ad_account.php"><h3 class="mt-4">Admin Account Management</h3></a>
                <div class="card mb-4">
                    <div class="card-header">User Book Address</div>
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
                                <td><a href="ad_editAdd/edit_address.php?userDetail_id=<?php $_SESSION["userDetail_id"]; ?>"><input class="btn btn-primary btn-block" type="button" value="Edit"></a> </td>
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
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2019</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<?php include ("admin_script.xsl");?>
</body>
</html>

