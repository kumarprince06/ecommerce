<?php 
    include 'dbcon.php';

    if(isset($_POST['register'])){

        $firstName = $_POST['fname'];
        $lastName = $_POST['lname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['pwd'];
        $Cpassword = $_POST['c_pwd'];
    }

    if($password == $Cpassword){
        $insertQuery = "INSERT INTO `customer` (`firstName`, `lastName`, `email`, `mobile`, `password`) VALUES ('$firstName', '$lastName', '$email', '$mobile', '$password')";
        $insertResult = mysqli_query($con, $insertQuery);
        if(!$insertResult){
            die("Query Failed".mysqli_error($con));
        }else{
            header("location:../login_register.php?register_msg=Successfully register. Please login now.");
        }
    }else{
        header("location:../login_register.php?error_msg=Password not matched");
    }


    

?>