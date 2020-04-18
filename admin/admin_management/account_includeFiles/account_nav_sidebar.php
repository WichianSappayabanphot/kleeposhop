<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
<style>
     .form-div {
        margin-top: 100px;
        border: 1px solid #e0e0e0;
        padding-top: 15px;
        height: 180px;
    }

    #profileDisplay {
        display: block;
        height: 120px;
        width: 60%;
        margin: 0px auto;
        border-radius: 50%;
    }

    .img-placeholder {
        width: 60%;
        color: white;
        height: 100%;
        background: black;
        opacity: .7;
        height: 120px;
        border-radius: 50%;
        z-index: 2;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        display: none;
    }
    .img-placeholder h6 {
        margin-top: 40%;
        color: white;
    }
    .img-div:hover .img-placeholder {
        display: block;
        cursor: pointer;
    }
</style>


<div class="sb-sidenav-menu">
    <div class="nav">
        <?php
        require('../../spdb.php');
        $userDetail_id = $_SESSION["userDetail_id"];
        $query = mysqli_query($dbcon, "select * from userDetail where userDetail_id='$userDetail_id'");
        if ($row = mysqli_fetch_assoc($query))
        {
            $userDetail_id = $_SESSION["userDetail_id"];
            ?>
        <a class="nav-link">
            <form action="account_processFiles/account_process_update_profilePicture.php?userDetail_id=<?php echo $userDetail_id; ?>" method="post" enctype="multipart/form-data">
                <h2 class="text-center mb-3 mt-3"></h2>
                <div class="form-group text-center" style="position: relative;" >
                    <span class="img-div">
                      <div class="text-center img-placeholder"  onClick="triggerClick()">
                        <h6>Upload Image</h6>
                      </div>
                       <img src="/uploads/<?php echo $row['name'];?>" onClick="triggerClick()" id="profileDisplay" >
                    </span>
                    <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
                    <br>
                    <label style="text-transform: uppercase; font-size: small;">
                        <center>
                            <?php echo $row['firstName'] ." ". $row['lastName'];?>
                        </center>
                    </label>
                    <div class="form-group">
                        <button type="submit" name="save" id="save" class="btn btn-primary btn-block">Update</button>
                    </div>
                </div>
            </form>
        </a>
        <?php
        }
        mysqli_close($dbcon);
        ?>
        <?php
        require('../../spdb.php');
        $query1 = mysqli_query($dbcon, "select * from users where user_id='$userDetail_id'");
        if ($row1 = mysqli_fetch_assoc($query1))
        {
        ?>
<!--        <hr>-->

        <div class="sb-sidenav-menu-heading" >
            <a href="account_manage_profile.php">
                <center>
                    <u style="color: #adb5bd;">
                        <?php echo $row1['userType'];?> account
                    </u>
                </center>
            </a>
        </div>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts" style="color: white;">
            <div class="sb-nav-link-icon" style="color: white;"><i class="fas fa-book-open"></i></div>
            Manage Account
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="account_profile.php">Profile</a>
                <a class="nav-link" href="account_addressBook.php">Address</a>
            </nav>
        </div>
            <?php
        }
        mysqli_close($dbcon);
        ?>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages" style="color: white;">
            <div class="sb-nav-link-icon" style="color: white;"><i class="fas fa-columns"></i></div>
            List
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                    Order Lists
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="#">Order Type</a>
                        <a class="nav-link" href="#">New Order</a>
                    </nav>
                </div>


                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                    Product Lists
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="#">New Products</a>
                        <a class="nav-link" href="account_view_products.php">All Products</a>
                        <!--                                    <a class="nav-link" href="500.html"></a>-->
                    </nav>
                </div>
            </nav>
        </div>
    </div>
</div>



<script>
    function triggerClick(e)
    {
        document.querySelector('#profileImage').click();

    }

    function displayImage(e)
    {
        if (e.files[0])
        {
            var reader = new FileReader();
            reader.onload = function(e)
            {
                document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>