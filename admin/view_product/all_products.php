<?php include ('../session.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>KPS | Product View Lists</title>
    <link href="../ad_asset/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

    <?php include("../adminInclude/ad_head.php"); ?>
    <?php include('../ad_asset/log_out_popup.php'); ?>

</head>
<body class="sb-nav-fixed">
<?php include('../admin_management/ad_nav_topbar.php');?>

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


    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <label><a href="../admin_management/ad_account.php"><h3 class="mt-4"> Inventory Management</h3></a></label>

                <ol class="breadcrumb mb-4">
                    <lable><li class="breadcrumb-item active"><a href="">Export</li></a></lable>
                    <lable><li class="breadcrumb-item active" style="position: relative; top: 0px; left: 30px;"><a href="../admin_management/ad_upload.php">Import</a></li></lable>
                    <lable><li class="breadcrumb-item active" style="position: relative; top: 0px; left: 1400px;"><a href="../admin_management/ad_upload.php">Add Product</a></li></lable>
                </ol>

                <?php
                if (isset($_SESSION['message']))
                {
                    echo "<p>".$_SESSION['message']."</p>";
                }
                unset($_SESSION['message']);
                ?>
<!--                <i class="fas fa-table mr-1"></i>-->
                <div class="card mb-4">
                    <div class="card-header">All Products</div>
                    <div class="card-body">
                        <div class="table-responsive">


<!--                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">-->
                            <table class="table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th style="width: 50px;"><center><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" ></center></th>
                                    <th  style="width: 150px;"><center>Image</center></th>
                                    <th>Description</th>
                                    <th style="width: 100px;">Type</th>
                                    <th style="width: 200px;">Inventory</th>
                                    <th style="width: 150px;"><center>Vendor</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                require ('../../spdb.php');
                                $query = mysqli_query($dbcon, "select * from spdb.item_type");
                                while ($row = mysqli_fetch_assoc($query))
                                {
                                $_SESSION["item_id"] = $row['item_id'];
                                ?>
                                <tr>
                                    <td>
                                      <center>
                                          <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" style="position: relative; top: 20px;">
                                      </center>
                                    </td>
                                    <td>
                                        <center>
                                        <label>
                                            <img src="/uploads/<?php echo $row['name']; ?>" class="rounded float-left" alt="Responsive image"
                                                 style="width: 50px; height: 70px;" >
                                        </label>
                                            </center>
                                    </td>
                                    <td >
                                        <p style="position: relative; top: 20px;"><?php echo $row['item_description'];?></p>
                                    </td>
                                    <td><?php echo $row['itemType']; ?></td>
                                    <td>
                                        Price is: <?php echo $row['price'];?><br>
                                        <?php echo $row['stock'];?> in stock
                                    </td>
                                    <td><?php echo $row['']; ?></td>
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

<?php include("../admin_management/ad_script.xsl");?>
</body>
</html>
