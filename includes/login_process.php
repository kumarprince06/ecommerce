<?php

session_start();
include_once("dbcon.php");



if(isset($_POST['login'])){
    $email = strtolower($_POST['email']);
    $password = $_POST['pwd'];


    $loginQuery = "SELECT * FROM `customer` WHERE `email` = '$email' AND `password` = '$password'";

    $loginResult = mysqli_query($con, $loginQuery);
    
    if(!$loginResult){
        die("Query Failed".mysqli_error($con));
    }else{
        $row = mysqli_num_rows($loginResult);
        $row_detail = mysqli_fetch_assoc($loginResult);

        if ($row == 1) {

            $_SESSION['firstName'] = $row_detail['firstName'];
            $_SESSION['CustomerID'] = $row_detail['CustomerID'];
        
            header("location:../index.php");

        }
        else {
            header("location:../login_register.php?login_error=Invalid credentials..!");
        }
    }
}



?>