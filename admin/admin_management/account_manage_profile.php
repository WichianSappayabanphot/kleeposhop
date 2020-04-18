<?php
session_start();
if (!isset($_SESSION["userDetail_id"]) || !isset($_SESSION["user_type"]))
{
    header("Location: ../../login/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>KPS | Admin_Account</title>
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

    <!--End Navigation-->
    <!--Start main content-->
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <a href="account_manage_profile.php">
                    <h4 class="mt-4" style="color: black;">
                        Account Management
                    </h4>
                </a> <br>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Product Lists</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="account_view_products.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">All stock</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Register Customer Lists</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="account_customer_lists.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">New Orders</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>


                <?php

                    require ('../../spdb.php');
                    $userDetail_id = $_SESSION["userDetail_id"];
                    $query = mysqli_query($dbcon, "select * from userDetail where userDetail_id='$userDetail_id'");
                    if ($row = mysqli_fetch_assoc($query))
                    {
                        $_SESSION["userDetail_id"] = $row['userDetail_id'];
                        ?>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">


                                        <h5 class="card-title" style="font-family: 'Calibri';">
                                            Personal Profile |  <a href="account_editProfile.php?userDetail_id=<?php $_SESSION["userDetail_id"]; ?>" style="font-size: 13px; color: #2c6ed5;">EDIT</a>

                                        </h5>


                                    </div>
                                    <div class="card-body">
                                        <input type="text" style="border-style: none; font-family: 'Calibri Light'; width: 220px; height: auto; font-size: 14px;" value="<?php echo $row['firstName'] ?> <?php echo $row['lastName'] ?>"
                                               readonly>
                                        <input type="text" style="border-style: none; font-family: 'Calibri Light'; width: 220px; height: auto; font-size: 14px;" value="<?php echo $row['email'] ?>" readonly>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="card-title" style="font-family: 'Calibri';">
                                            Address Book | <a href="account_addressBook.php?userDetail_id=<?php $_SESSION["userDetail_id"];?>" style="font-size: 13px; color: #2c6ed5;">EDIT</a>
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <label class="col-xl-6 col-md-6">
                                                <input type="text"
                                                       style="border-style: none; font-family: 'Calibri'; color: #5a6268; width: 220px; height: auto; font-size: 14px;"
                                                       value="DEFAULT SHIPPING ADDRESS" readonly>
                                                <b>
                                                    <input type="text"
                                                           style="border-style: none; font-family: 'Calibri Light'; width: 220px; height: auto; font-size: 14px; "
                                                           value="<?php echo $row['firstName'] ?> <?php echo $row['lastName'] ?>"
                                                           readonly>
                                                </b>
                                                <input type="text" style="border-style: none; font-family: 'Calibri'; color: #5a6268; width: 220px; height: auto;
                                            font-size: 12px;" value="<?php echo $row['user_address'] ?>" readonly>
                                                <input type="text" style="border-style: none; font-family: 'Calibri'; color: #5a6268; width: 220px; height: auto;
                                            font-size: 12px;"
                                                       value="<?php echo $row['user_province'] ?> Province - <?php echo $row['user_district'] ?> - <?php echo $row['user_postcode'] ?>"
                                                       readonly>
                                                <input type="text" style="border-style: none; font-family: 'Calibri'; color: #5a6268; width: 220px; height: auto;
                                            font-size: 12px;" value="<?php echo $row['phoneNumber'] ?>" readonly>
                                            </label>

                                            <label class="col-xl-3 col-md-6">
                                                <input type="text" style="border-style: none; font-family: 'Calibri'; color: #5a6268; width: 220px; height: auto;
                                    font-size: 14px;" value="DEFAULT BILLING ADDRESS" readonly>
                                                <b>
                                                    <input type="text"
                                                           style="border-style: none; font-family: 'Calibri Light'; width: 220px; height: auto; font-size: 14px; "
                                                           value="<?php echo $row['firstName'] ?> <?php echo $row['lastName'] ?>"
                                                           readonly>
                                                </b>
                                                <input type="text" style="border-style: none; font-family: 'Calibri'; color: #5a6268; width: 220px; height: auto;
                                    font-size: 12px;" value="<?php echo $row['user_address'] ?>" readonly>
                                                <input type="text" style="border-style: none; font-family: 'Calibri'; color: #5a6268; width: 220px; height: auto;
                                    font-size: 12px;"
                                                       value="<?php echo $row['user_province'] ?> Province - <?php echo $row['user_district'] ?> - <?php echo $row['user_postcode'] ?>"
                                                       readonly>
                                                <input type="text" style="border-style: none; font-family: 'Calibri'; color: #5a6268; width: 220px; height: auto;
                                    font-size: 12px;" value="<?php echo $row['phoneNumber'] ?>" readonly>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                mysqli_close($dbcon);
                ?>

                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>Order Lists</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Order Number</th>
                                    <th>Product Price</th>
                                    <th>Stock</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Order Date</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Order Number</th>
                                    <th>Product Price</th>
                                    <th>Stock</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Order Date</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <tr>
                                    <td>Suchada Kamonwadi</td>
                                    <td>1</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>10</td>
                                    <td>$1000</td>
                                    <td>10/01/20200</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
