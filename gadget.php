<?php include 'includes/dbcon.php'; ?>
<?php include "includes/header.php"; ?>

 <!-- Breadcrumb Start -->
 <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="products.php">Products</a></li>
                    <li class="breadcrumb-item active">Gadget & Accessories</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

<!-- Product List Start -->
<div class="product-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <?php
                    $resultsPerPage = 9;
                    $query = "SELECT * FROM product WHERE CategoryID = (SELECT CategoryID FROM category WHERE CategoryName = 'Gadgets & Accessories')";
                    $result = mysqli_query($con, $query);
                    $numberOfResult = mysqli_num_rows($result);
                    $numberOfPages = ceil($numberOfResult / $resultsPerPage);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    // Determine the SQL LIMIT starting number for the results on the displaying page  
                    $pageFirstResult = ($page - 1) * $resultsPerPage;

                    // Retrieve the selected results from the database   
                    $query = "SELECT * FROM product WHERE CategoryID = (SELECT CategoryID FROM category WHERE CategoryName = 'Gadgets & Accessories') LIMIT $pageFirstResult, $resultsPerPage";
                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<div class="col-md-4">';
                            echo '<div class="product-item">';
                            echo '<div class="product-title">';
                            echo '<a href="product_detail.php">' . $row['ProductName'] . '</a>';
                            echo '</div>';
                            echo '<div class="product-image">';
                            echo '<a href="product_detail.php">';
                            echo '<img src="assets/img/' . $row['imageName'] . '" alt="Product Image">';
                            echo '</a>';
                            echo '</div>';
                            echo '<div class="product-price">';
                            echo '<h3><span>₹ </span>' . $row['Price'] . '</h3>';
                            echo '<a class="btn" href="cart.php"><i class="fa fa-shopping-cart"></i>Buy Now</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }else{
                        echo '<div class="col-md-12"><h3>No products availabe. Please visit after sometimes..!!</h3></div>';
                    }
                    ?>
                </div>

                <center>
                    <div class="container">
                        <div class="pagination">
                            <?php
                            if ($page > 1) {
                                echo "<a href='gadget.php?page=" . ($page - 1) . "'> Prev </a>";
                            }

                            for ($i = 1; $i <= $numberOfPages; $i++) {
                                echo "<a class='" . ($i == $page ? 'active' : '') . "' href='gadget.php?page=" . $i . "'>" . $i . "</a>";
                            }

                            if ($page < $numberOfPages) {
                                echo "<a href='gadget.php?page=" . ($page + 1) . "'> Next </a>";
                            }
                            ?>
                        </div>
                        <?php if ($numberOfPages > 1) : ?>
                            <div class="inline">
                                <input id="page" type="number" min="1" max="<?php echo $numberOfPages; ?>" placeholder="<?php echo $page . "/" . $numberOfPages; ?>" required>
                                <button onClick="go2Page(<?php echo $page; ?>, <?php echo $numberOfPages; ?>);">Go</button>
                            </div>
                        <?php endif; ?>
                    </div>
                </center>

            </div>
            <!-- Side Bar Start -->
            <div class="col-lg-4 sidebar">
                <div class="sidebar-widget category">
                    <h2 class="title">Category</h2>
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="fashionBeauty.php"><i class="fa fa-female"></i>Fashion & Beauty</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="kids.php"><i class="fa fa-child"></i>Kids & Babies Clothes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="menWomen.php"><i class="fa fa-tshirt"></i>Men & Women Clothes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="gadget.php"><i class="fa fa-mobile-alt"></i>Gadgets & Accessories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="electronics.php"><i class="fa fa-microchip"></i>Electronics & Accessories</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Side Bar Start -->



<?php include("includes/footer.php"); ?>


<script>
    function go2Page(page, numberOfPages) {
        var pageInput = document.getElementById("page");
        var enteredPage = pageInput.value;
        console.log(page, numberOfPages);
        console.log(enteredPage);

        if (enteredPage >= 1 && enteredPage <= numberOfPages) {
            window.location.href = 'gadget.php?page=' + enteredPage;
        } else {
            window.location.href='gadget.php?page='+numberOfPages;
        }
    }
    // function go2Page(page, numberOfPages) {
    //     var pageInput = document.getElementById("page");

    //     <?php echo "var numberOfPages = $numberOfPages;"; ?>

    //     console.log(numberOfPages);

    //     if (page >= 1 && page <= numberOfPages) {
    //         window.location.href = 'kids.php?page=' + page;
    //     } else {
    //         window.Location.href='kids.php?page='+numberOfPages;
    //     }
    // }
</script>