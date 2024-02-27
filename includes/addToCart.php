<?php
session_start();
include("dbcon.php");

if (isset($_GET['ProductID']) && isset($_GET['CustomerID'])) {
    $ProductID = $_GET['ProductID'];
    $CustomerID = $_GET['CustomerID'];
    $Page = $_GET['page'];

    // Initialize price and product image
    $Price = 0;
    $ProductImage = '';

    // Retrieve product information from the product table
    $stmt = $con->prepare("SELECT * FROM product WHERE ProductID = ?");
    $stmt->bind_param("i", $ProductID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        $Price = $product['Price'];
        $ProductImage = $product['imageName'];
    }

    // Assuming you have the quantity and price for the product
    $Quantity = 1; // Replace with the desired quantity

    // Check if the cart exists for the customer, create one if not
    $stmt = $con->prepare("SELECT CartID FROM cart WHERE CustomerID = ?");
    $stmt->bind_param("i", $CustomerID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Cart doesn't exist, create one
        $stmt = $con->prepare("INSERT INTO cart (CustomerID) VALUES (?)");
        $stmt->bind_param("i", $CustomerID);
        $stmt->execute();
    }

    // Get the cartid for the customer
    $stmt = $con->prepare("SELECT CartID FROM cart WHERE CustomerID = ?");
    $stmt->bind_param("i", $CustomerID);
    $stmt->execute();
    $result = $stmt->get_result();
    $cart = $result->fetch_assoc();

    // Check if the product is already in the cartitem
    $stmt = $con->prepare("SELECT * FROM cartitem WHERE CartID = ? AND ProductID = ?");
    $stmt->bind_param("ii", $cart['CartID'], $ProductID);
    $stmt->execute();
    $result = $stmt->get_result();
    $existingProduct = $result->fetch_assoc();

    if ($existingProduct) {
        // Product already exists, update the quantity
        $stmt = $con->prepare("UPDATE cartitem SET Quantity = Quantity + ? WHERE CartID = ? AND ProductID = ?");
        $stmt->bind_param("iii", $Quantity, $cart['CartID'], $ProductID);
        $stmt->execute();
    } else {
        // Product does not exist, insert a new record
        $stmt = $con->prepare("INSERT INTO cartitem (CartID, ProductID, Quantity, Price, ProductImageName) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiis", $cart['CartID'], $ProductID, $Quantity, $Price, $ProductImage);
        $stmt->execute();
    }

    $_SESSION['addToCartSuccess'] = true;
    header("Location: ../$Page.php"); // Redirect to the home page or wherever you want
    exit();
} else {
    // Handle the case where ProductID or CustomerID is not set
    header("Location: ../index.php?error=Invalid request");
    exit();
}
?>
