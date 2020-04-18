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
    <title>KPS | Customer Lists</title>
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
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <a href="account_manage_profile.php">
                    <h4 class="mt-4" style="color: black;">
                        Account Management
                    </h4>
                </a> <br>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Customer Lists</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>Register Lists</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th><center>Customer ID</center></th>
                                    <th><center>Customer Name</center></th>
                                    <th><center>Register Date</center></th>
                                    <th><center>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th><center>Customer ID</center></th>
                                    <th><center>Customer Name</center></th>
                                    <th><center>Register Date</center></th>
                                    <th><center>Action</center></th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php

                                    require ('../../spdb.php');

                                    $query = "select * from users WHERE userType='Customer'";
                                    $result = mysqli_query($dbcon, $query);
                                    while ($row = mysqli_fetch_assoc($result))
                                    {
                                ?>
                                <tr>
                                    <td><center><?php echo $row['user_id']; ?></center></td>
                                    <td><center><?php echo $row['username']; ?></center></td>
                                    <td><center><?php echo $row['date']; ?></center></td>
                                   <td><center><a href=""><button>View Detail</button></a></center></td>
                                </tr>
                                 <?php
                                    }
                                    mysqli_close($dbcon);
                                ?>
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
