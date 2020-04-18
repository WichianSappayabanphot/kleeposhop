<?php include ('session.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>KPS | cart</title>
    <?php include ("adminInclude/ad_head.php"); ?>
</head>
<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header section -->
<header class="header-section">
    <?php include ("adminInclude/ad_header.php"); ?>
    <?php include ("adminInclude/ad_tab_navbar.php"); ?>
</header>
<!-- Header section end -->


<!-- Page info -->
<div class="page-top-info">
    <div class="container">
        <h4>Your cart</h4>
        <div class="site-pagination">
            <a href="../index.php">Home</a> /
            <a href="../view/cart.php">Your cart</a>
        </div>
    </div>
</div>
<!-- Page info end -->


<!-- cart section end -->
<section class="cart-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-table">
                    <h3>Your Cart</h3>
                    <div class="cart-table-warp">
                        <table>
                            <thead>
                            <tr>
                                <th class="product-th">Product</th>
                                <th class="quy-th">Quantity</th>
                                <th class="size-th">SizeSize</th>
                                <th class="total-th">Price</th>
                            </tr>
                            </thead>
                            <tbody>

<!--                            --><?php
//                            require ('../spdb.php');
//
//
//                            $query = mysqli_query($dbcon, "select * from spdb.item_type");
//                            while ($row = mysqli_fetch_assoc($query))
//                            {
//                            $_SESSION["item_id"] = $row['item_id'];
//                            ?>
                            <tr>
                                <td class="product-col">
                                    <img src="../assets/img/cart/1.jpg" alt="">
                                    <div class="pc-title">
                                        <h4>Animal Print Dress</h4>
                                        <p>$45.90</p>
                                    </div>
                                </td>
                                <td class="quy-col">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="1">
                                        </div>
                                    </div>
                                </td>
                                <td class="size-col"><h4>Size M</h4></td>
                                <td class="total-col"><h4>$45.90</h4></td>
                            </tr>
<!--                                --><?php
//                            }
//                            mysqli_close($dbcon);
//                            ?>
<!--                            <tr>-->
<!--                                <td class="product-col">-->
<!--                                    <img src="../assets/img/cart/2.jpg" alt="">-->
<!--                                    <div class="pc-title">-->
<!--                                        <h4>Ruffle Pink Top</h4>-->
<!--                                        <p>$45.90</p>-->
<!--                                    </div>-->
<!--                                </td>-->
<!--                                <td class="quy-col">-->
<!--                                    <div class="quantity">-->
<!--                                        <div class="pro-qty">-->
<!--                                            <input type="text" value="1">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </td>-->
<!--                                <td class="size-col"><h4>Size M</h4></td>-->
<!--                                <td class="total-col"><h4>$45.90</h4></td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <td class="product-col">-->
<!--                                    <img src="../assets/img/cart/3.jpg" alt="">-->
<!--                                    <div class="pc-title">-->
<!--                                        <h4>Skinny Jeans</h4>-->
<!--                                        <p>$45.90</p>-->
<!--                                    </div>-->
<!--                                </td>-->
<!--                                <td class="quy-col">-->
<!--                                    <div class="quantity">-->
<!--                                        <div class="pro-qty">-->
<!--                                            <input type="text" value="1">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </td>-->
<!--                                <td class="size-col"><h4>Size M</h4></td>-->
<!--                                <td class="total-col"><h4>$45.90</h4></td>-->
<!--                            </tr>-->
                            </tbody>
                        </table>
                    </div>
                    <div class="total-cost">
                        <h6>Total <span>$99.90</span></h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 card-right">
                <form class="promo-code-form">
                    <input type="text" placeholder="Enter promo code">
                    <button>Submit</button>
                </form>
                <a href="" class="site-btn">Proceed to checkout</a>
                <a href="" class="site-btn sb-dark">Continue shopping</a>
            </div>
        </div>
    </div>
</section>
<!-- cart section end -->

<!-- Related product section -->
<section class="related-product-section">
    <div class="container">
        <div class="section-title text-uppercase">
            <h2>Continue Shopping</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <div class="tag-new">New</div>
                        <img src="../assets/img/product/2.jpg" alt="">
                        <div class="pi-links">
                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                        <h6>$35,00</h6>
                        <p>Black and White Stripes Dress</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="../assets/img/product/5.jpg" alt="">
                        <div class="pi-links">
                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                        <h6>$35,00</h6>
                        <p>Flamboyant Pink Top </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="../assets/img/product/9.jpg" alt="">
                        <div class="pi-links">
                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                        <h6>$35,00</h6>
                        <p>Flamboyant Pink Top </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="../assets/img/product/1.jpg" alt="">
                        <div class="pi-links">
                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                        <h6>$35,00</h6>
                        <p>Flamboyant Pink Top </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Related product section end -->


<!-- Footer section -->
<?php include ("adminInclude/ad_footer.php"); ?>
<!-- Footer section end -->



<!--====== Javascripts & Jquery ======-->
<?php include ("adminInclude/ad_kps.xsl"); ?>

</body>
</html>
