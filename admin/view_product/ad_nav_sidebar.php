
<div class="sb-sidenav-menu">
    <div class="nav">
        <div class="sb-sidenav-menu-heading">Welcome</div>
<!--        <a class="nav-link" href="#">-->
<!--            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>-->
<!--            Dashboard-->
<!--        </a>-->

        <div class="sb-sidenav-menu-heading" style="color: white;"><a href="../admin_management/ad_account.php">ADMIN ACCOUNT</a></div>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts" style="color: white;">
            <div class="sb-nav-link-icon" style="color: white;"><i class="fas fa-book-open"></i></div>
            Manage Account
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="../admin_management/ad_profile.php">Profile</a>
                <a class="nav-link" href="../admin_management/ad_Addbook.php">Address</a>
            </nav>
        </div>

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
                        <!--                                    <a class="nav-link" href="password.html">Forgot Password</a>-->
                    </nav>
                </div>


                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                    Product Lists
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="#">New Products</a>
                        <a class="nav-link" href="all_products.php">All Products</a>
                        <!--                                    <a class="nav-link" href="500.html"></a>-->
                    </nav>
                </div>
            </nav>
        </div>
    </div>
</div>