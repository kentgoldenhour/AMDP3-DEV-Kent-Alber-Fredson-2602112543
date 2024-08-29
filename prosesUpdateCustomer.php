<?php
    include('koneksi.php');
    $name = $_POST['customername'];
    $phone = $_POST['customerphonenum'];
    $email = $_POST['customeremail'];
    
    if($name && $phone && $email){
        $query = "UPDATE `customer` SET `customerUsername` = '$name', `customerEmail` = '$email' WHERE `customerPhoneNumber` = '$phone';";
        $res = mysqli_query($con, $query);
        header("location:CustomerPage.php");
    } else {
        header("location:CustomerSettings.php");
    }
    
?>