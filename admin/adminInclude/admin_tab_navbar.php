<?php
$userDetail_id = $_SESSION["userDetail_id"];
//    echo $userDetail_id;
require ('../spdb.php');
$query = "SELECT firstName, lastName From userDetail WHERE userDetail_id='$userDetail_id'";
$result = mysqli_query($dbcon, $query);
$row = mysqli_fetch_assoc($result);
$fName = $row['firstName'];
$lName = $row['lastName'];
$try = array($fName, $lName);
$fullName =  join(" ",$try);
//    echo "<a href='../admin_management/account_manage_profile.php'>".$fullName."</a>";
?>
<nav class="main-navbar">
    <div class="container">
        <!-- menu -->
        <ul class="main-menu">

            <li><a href="admin_home.php">Home</a></li>
            <li><a href="#">Items
                    <span class="new">hot</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="../index.php">New Arrivals
                            <span class="new">New</span>
                        </a></li>
                    <li><a href="../index.php">Hot Items
                            <span class="new">Hot</span>
                        </a></li>
                </ul>
            </li>
            <li><a href="#">Products</a>
                <ul class="sub-menu">
                    <li><a href="../woman/woman_cloths.php">Bags</a></li>
                    <li><a href="../woman/woman_cloths.php">Shoes</a></li>
                    <li><a href="../woman/woman_cloths.php">Accessories</a></li>
                    <li><a href="#">Living + Gifts</a></li>
                    <li><a href="#">Limited Editions</a></li>
                </ul>
            </li>
            <li><a href="#">Clothing</a>
                <ul class="sub-menu">
                    <li><a href="../man/man_cloths.php">Man Cloths</a></li>
                    <li><a href="../woman/woman_cloths.php">Woman Cloths</a></li>
                </ul>
            </li>
            </li>
            <li><a href="#">Pages</a>
                <ul class="sub-menu">
                    <li><a href="../../admin/upload/all_products.php">All Products</a></li>
                    <li><a href="admin_category.php">Category Page</a></li>
                    <li><a href="admin_cart.php">Cart Page</a></li>
                    <li><a href="checkout.php">Checkout Page</a></li>
                    <li><a href="admin_contact.php">Contact Page</a></li>
                </ul>
            </li>
            <li>
<!--               --><?php //echo "<a href='../../admin/admin_management/account_manage_profile.php'>".$fullName."</a>"; ?>

                <a href=""><?php echo $fullName; ?></a>
                <ul class="sub-menu">
                    <li><a href="../admin_management/ad_account.php">Manage my Account</a></li>
                    <li><a href="upload">Add Product</a></li>
                    <li><a href="javascript:void(0)"
                           onclick="document.getElementById('newsletter').style.display='block'">Log out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<div id="newsletter" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
        <div class="w3-container w3-white w3-center">
            <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
            <h2 class="w3-wide">LOG OUT</h2>
            <p>Are you sure you want to logout from the system?</p>
            <br/>
            <button type="button" class="w3-button w3-padding-large w3-red
            w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">
                <a href="../../login/login.php">Yes</a>
            </button>
            <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom"
                    onclick="document.getElementById('newsletter').style.display='none'">No</button>

        </div>
    </div>
</div>
