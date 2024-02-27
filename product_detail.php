<?php
// session_start();
include("includes/dbcon.php"); ?>
<?php include("includes/header.php"); ?>

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="products.php">Products</a></li>
            <li class="breadcrumb-item active">Product Detail</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product Detail Start -->
<div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="product-detail-top">
                    <div class="row align-items-center">
                        <?php

                        if (isset($_GET['ProductID']) && isset($_GET['CustomerID'])) {
                            $ProductID = $_GET['ProductID'];
                            $CustomerID = $_GET['CustomerID'];



                            $query = "Select * from product where ProductID = $ProductID";
                            $result = mysqli_query($con, $query);
                            if ($result) {
                                $row = mysqli_fetch_assoc($result);


                        ?>
                                <div class="col-md-5">
                                    <div class="product-slider-single">
                                        <img src="assets/img/<?php echo $row['imageName']; ?>" alt="Product Image">
                                        <img src="assets/img/<?php echo $row['imageName']; ?>" alt="Product Image">
                                        <img src="assets/img/<?php echo $row['imageName']; ?>" alt="Product Image">
                                        <img src="assets/img/<?php echo $row['imageName']; ?>" alt="Product Image">
                                        <img src="assets/img/<?php echo $row['imageName']; ?>" alt="Product Image">
                                        <img src="assets/img/<?php echo $row['imageName']; ?>" alt="Product Image">
                                    </div>

                                </div>
                                <div class="col-md-7">
                                    <div class="product-content">

                                        <div class="title">
                                            <h2><?php echo $row['ProductName']; ?></h2>
                                        </div>

                                        <div class="price">
                                            <h4>Price:</h4>
                                            <p>₹<?php echo $row['Price']; ?><span>₹149</span></p>
                                        </div>
                                        <div class="desc">
                                            <h4>Description:</h4>
                                            <p> <?php echo $row['Description']; ?></p>
                                        </div>


                                        <div class="action">
                                            <a class="btn" href="includes/addToCart.php?ProductID=<?php echo $row['ProductID'] ?>&CustomerID=<?php echo $_SESSION['CustomerID'] ?>&page=product_detail"><i class="fa fa-shopping-cart"></i>Add To Cart</a>

                                        </div>
                                <?php
                            }
                        }

                                ?>
                                    </div>
                                </div>
                    </div>
                </div>


                <div class="product">
                    <div class="section-header">
                        <h1>Related Products</h1>
                    </div>

                    <div class="row align-items-center product-slider product-slider-3">
                        <div class="col-lg-3">
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="product_detail.php">Product Name</a>

                                </div>
                                <div class="product-image">
                                    <a href="product_detail.php">
                                        <img src="assets/img/product-10.jpg" alt="Product Image">
                                    </a>

                                </div>
                                <div class="product-price">
                                    <h3><span>$</span>99</h3>
                                    <a class="btn" href="cart.php"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="product_detail.php">Product Name</a>

                                </div>
                                <div class="product-image">
                                    <a href="product_detail.php">
                                        <img src="assets/img/product-10.jpg" alt="Product Image">
                                    </a>

                                </div>
                                <div class="product-price">
                                    <h3><span>$</span>99</h3>
                                    <a class="btn" href="cart.php"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="product_detail.php">Product Name</a>

                                </div>
                                <div class="product-image">
                                    <a href="product_detail.php">
                                        <img src="assets/img/product-10.jpg" alt="Product Image">
                                    </a>

                                </div>
                                <div class="product-price">
                                    <h3><span>$</span>99</h3>
                                    <a class="btn" href="cart.php"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="product_detail.php">Product Name</a>

                                </div>
                                <div class="product-image">
                                    <a href="product_detail.php">
                                        <img src="assets/img/product-10.jpg" alt="Product Image">
                                    </a>

                                </div>
                                <div class="product-price">
                                    <h3><span>$</span>99</h3>
                                    <a class="btn" href="cart.php?ProductID=<?php echo $row['ProductID'] ?>&CustomerID=<?php echo $_SESSION['CustomerID'] ?>&page=product_detail"><i class="fa fa-shopping-cart"></i>Add To Cart</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Side Bar Start -->
            <div class="col-lg-4 sidebar">
                <div class="sidebar-widget category">
                    <h2 class="title">Category</h2>
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-female"></i>Fashion & Beauty</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-child"></i>Kids & Babies Clothes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-tshirt"></i>Men & Women Clothes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-mobile-alt"></i>Gadgets & Accessories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-microchip"></i>Electronics & Accessories</a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
            <!-- Side Bar End -->
        </div>
    </div>
</div>
<!-- Product Detail End -->

<!-- Brand Start -->
<div class="brand">
    <div class="container-fluid">
        <div class="brand-slider">
            <div class="brand-item"><img src="assets/img/brand-1.png" alt=""></div>
            <div class="brand-item"><img src="assets/img/brand-2.png" alt=""></div>
            <div class="brand-item"><img src="assets/img/brand-3.png" alt=""></div>
            <div class="brand-item"><img src="assets/img/brand-4.png" alt=""></div>
            <div class="brand-item"><img src="assets/img/brand-5.png" alt=""></div>
            <div class="brand-item"><img src="assets/img/brand-6.png" alt=""></div>
        </div>
    </div>
</div>
<!-- Brand End -->

<?php include("includes/footer.php"); ?>