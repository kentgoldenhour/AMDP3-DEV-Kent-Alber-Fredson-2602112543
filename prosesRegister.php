<?php
    $email = $_POST['regemail'];
    $username = $_POST['regusername'];
    $phonenumber = $_POST['regnum'];
    $password = $_POST['regpass'];

    if($email){
        include('koneksi.php');
        $query_customer = "SELECT * FROM `customer` WHERE customerEmail LIKE '$email' AND customerPassword LIKE '$password' AND customerUsername LIKE '$username' AND customePhoneNumber LIKE '$phonenumber'";
        $res_customer = mysqli_query($con, $query_customer);
        if(mysqli_num_rows($res_customer) > 0){
            echo "User already exist";
        } else {
            session_start();
            $_SESSION['isLogin'] = true;
            $customer = $con->prepare("INSERT INTO customer (`customerEmail`, `customerUsername`, `customerPhoneNumber`, `customerPassword`, `customerPhoto`) VALUES(?, ?, ?, ?, ?)");
            $customer->bind_param("sssss", $email, $username, $phonenumber, $password, 'assets/userprofile.png');
            $customer->execute();
            header("location:Login.php");
        }
    } 
    else {
        header("location:Register.php");
    }
?>