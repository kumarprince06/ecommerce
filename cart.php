<?php include("includes/header.php"); ?>

 <!-- Breadcrumb Start -->
 <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="products.php">Products</a></li>
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
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                           
                                            <th>Total</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="assets/img/product-1.jpg" alt="Image"></a>
                                                    <p>Product Name</p>
                                                </div>
                                            </td>
                                            <td>₹99</td>
                                           
                                            <td>₹99</td>
                                            <td><button><i class="fa fa-trash"></i></button></td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="assets/img/product-1.jpg" alt="Image"></a>
                                                    <p>Product Name</p>
                                                </div>
                                            </td>
                                            <td>₹99</td>
                                           
                                            <td>₹99</td>
                                            <td><button><i class="fa fa-trash"></i></button></td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="assets/img/product-1.jpg" alt="Image"></a>
                                                    <p>Product Name</p>
                                                </div>
                                            </td>
                                            <td>₹99</td>
                                           
                                            <td>₹99</td>
                                            <td><button><i class="fa fa-trash"></i></button></td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="assets/img/product-1.jpg" alt="Image"></a>
                                                    <p>Product Name</p>
                                                </div>
                                            </td>
                                            <td>₹99</td>
                                           
                                            <td>₹99</td>
                                            <td><button><i class="fa fa-trash"></i></button></td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
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
                                            <p>Sub Total<span>₹99</span></p>
                                            <p>Shipping Cost<span>₹1</span></p>
                                            <h2>Grand Total<span>₹100</span></h2>
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
