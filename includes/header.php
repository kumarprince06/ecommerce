<?php
session_start();
include 'includes/dbcon.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E-Commerce Project</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="eCommerce project" name="keywords">
    <meta content="eCommerce project" name="description">

    <!-- Favicon -->
    <link href="assets/img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="assets/lib/slick/slick.css" rel="stylesheet">
    <link href="assets/lib/slick/slick-theme.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="bestselling.css"> -->

    <!-- Template Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/productPagination.css" rel="stylesheet">
</head>

<body>

    <!-- Top bar Start -->
    <div class="top-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:kumarprince.s0611@gmail.com">contact@kumarprince.s0611@gmail.com</a>
                </div>
                <div class="col-sm-6">
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:012-345-6789">890-246-6321</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Top bar End -->

    <!-- Nav Bar Start -->
    <div class="nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="products.php" class="nav-item nav-link">Products</a>

                        <a href="cart.php" class="nav-item nav-link">Cart</a>

                    </div>
                    <div class="navbar-nav ml-auto">
                        <div class="nav-item dropdown">
                            <?php if (isset($_SESSION['firstName'])) : ?>
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['firstName']; ?></a>
                            <?php else : ?>
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                            <?php endif; ?>
                            <div class="dropdown-menu">
                                <?php if (!isset($_SESSION['CustomerID'])) : ?>
                                    <a href="login_register.php" class="dropdown-item">Login & Register</a>
                                <?php else : ?>
                                    <a href="includes/logout_process.php" class="dropdown-item">Logout</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->


    <!-- Bottom Bar Start -->
    <div class="bottom-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="index.php">
                            <img src="assets/img/logo.png" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="search">
                        <input type="text" placeholder="Search">
                        <button><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="user">
                        <?php
                        if (isset($_SESSION['CustomerID'])) {
                            $cusid = $_SESSION['CustomerID'];
                            $query = "SELECT COUNT(cartitem.CartItemID) AS cartCount FROM cartitem JOIN cart ON cartitem.CartID = cart.CartID WHERE cart.CustomerID = $cusid";

                            $result = mysqli_query($con, $query);

                            if ($result) {
                                // $cartCount = $result['cartCount'];
                                $row = mysqli_fetch_assoc($result);
                                $cartCount = $row['cartCount'];

                                echo '<a href="cart.php" class="btn cart">';
                                echo '<i class="fa fa-shopping-cart"></i>';
                                echo '<span>(' . $cartCount . ')</span>';
                                echo '</a>';
                            } else {
                                echo '<a href="cart.php" class="btn cart">';
                                echo '<i class="fa fa-shopping-cart"></i>';
                                echo '<span>(0)</span></a>';
                            }
                        } else {
                            echo '<a href="cart.php" class="btn cart">';
                            echo '<i class="fa fa-shopping-cart"></i>';
                            echo '<span>(0)</span></a>';
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Bar End -->