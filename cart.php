
<?php include("includes/dbcon.php"); ?>
<?php include("includes/header.php"); ?>

 <!-- Breadcrumb Start -->
 <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <!-- <li class="breadcrumb-item"><a href="products.php">Products</a></li> -->
                    <li class="breadcrumb-item active">Cart</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                            <?php
                                if(isset($_SESSION['CustomerID'])){
                                    // echo $_SESSION['CustomerID'];
                                    $customerID = $_SESSION['CustomerID'];
                                    $query = "SELECT ci.*, p.ProductName, p.Price, p.imageName FROM cartitem ci JOIN cart c ON ci.CartID = c.CartID JOIN product p ON ci.ProductID = p.ProductID WHERE c.CustomerID = $customerID";

                                    $result = mysqli_query($con, $query);

                                    $cartTotal = 0.0;
                                    $shippingCost = 0.0;

                                    if ($result && mysqli_num_rows($result) > 0) {

                            ?>

                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                           <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                    <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $total = $row['Quantity'] * $row['Price'];
                                            $cartTotal += $total;
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="product_detail.php?ProductID=<?php echo $row['ProductID']; ?>&CustomerID=<?php echo $customerID; ?>"><img src="assets/img/<?php echo $row['imageName']; ?>" alt="Image"></a>
                                                    <p><?php echo $row['ProductName']; ?></p>
                                                </div>
                                            </td>
                                            <td>₹<?php echo $row['Price']; ?></td>
                                           <td><?php echo $row['Quantity']; ?></td>
                                            <td>₹<?php echo $total; ?></td>
                                            <td><button><i class="fa fa-trash"></i></button></td>
                                        </tr>

                                        <?php  } ?>
                                       
                                    </tbody>
                                </table>
                                <?php
                            } else {
                                echo '<p class="text-center">Your cart is empty.</p>';
                            }
                        } else {
                            echo '<p class="text-center">Please login to view your cart.</p>';
                        }
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Cart Summary</h1>
                                            
                                            <p>Sub Total<span>₹<?php echo number_format($cartTotal, 2); ?></span></p>
                                            <p>Shipping Cost<span>₹<?php if($cartTotal<999){
                                                $shippingCost = 499;
                                                echo $shippingCost;
                                            }else {
                                                echo 0.0;
                                            } ?></span></p>
                                            <h2>Grand Total<span>₹<?php echo $cartTotal+$shippingCost; ?></span></h2>
                                        </div>
                                        <div class="cart-btn">
                                           
                                            <a href="checkout.php" class="btn btn-warning mt-2">    
                                            Checkout
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart End -->


<?php include("includes/footer.php"); ?>