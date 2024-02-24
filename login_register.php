<?php include("includes/dbcon.php"); ?>

<?php include("includes/header.php"); ?>

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="products.php">Products</a></li>
            <li class="breadcrumb-item active">Login & Register</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Login Start -->
<div class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">

                <form class="register-form" action="includes/register_process.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <label>First Name</label>
                            <input name="fname" class="form-control" type="text" placeholder="First Name">
                        </div>
                        <div class="col-md-6">
                            <label>Last Name"</label>
                            <input name="lname" class="form-control" type="text" placeholder="Last Name">
                        </div>
                        <div class="col-md-6">
                            <label>E-mail</label>
                            <input name="email" class="form-control" type="text" placeholder="E-mail">
                        </div>
                        <div class="col-md-6">
                            <label>Mobile No</label>
                            <input class="form-control" name="mobile" type="text" placeholder="Mobile No">
                        </div>
                        <div class="col-md-6">
                            <label>Password</label>
                            <input class="form-control" name="pwd" type="password" placeholder="Password">
                        </div>
                        <div class="col-md-6">
                            <label>Retype Password</label>
                            <input class="form-control" name="c_pwd" type="password" placeholder="Password">
                        </div>
                        <div class="col-md-12">
                            <button class="btn" type="submit" name="register">Register</button>
                        </div>
                    </div>
                    <br>
                    <p>
                    <?php
                        if (isset($_GET['register_msg'])) {
                            echo $_GET['register_msg'];
                        }

                        if (isset($_GET['error_msg'])) {
                            echo $_GET['error_msg'];
                        }


                        ?>
                    </p>
                </form>

            </div>
            <div class="col-lg-6">
                <form action="includes/login_process.php" method="post" class="login-form">
                    <div class="row">
                        <div class="col-md-6">
                            <label>E-mail</label>
                            <input name="email" class="form-control" type="text" placeholder="E-mail">
                        </div>
                        <div class="col-md-6">
                            <label>Password</label>
                            <input name="pwd" class="form-control" type="password" placeholder="Password">
                        </div>
                        
                        <div class="col-md-12">
                            <button class="btn" name="login" type="submit">Login</button>
                        </div>
                    </div>
                    <br>
                    <p>
                    <?php
                        if (isset($_GET['login_error'])) {
                            echo $_GET['login_error'];
                        }
                        ?>
                    </p>
                </form >
            </div>
        </div>
    </div>
</div>
<!-- Login End -->

<?php include("includes/footer.php"); ?>