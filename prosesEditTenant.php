<?php
    include('koneksi.php');
    $name = $_POST['newtenantname'];
    $email = $_POST['newtenantemail'];
    $phone = $_GET['newtenantphone'];

    if($name && $email){
        $query = "UPDATE `tenant` SET `tenantUsername` = '$name', `tenantEmail` = '$email' WHERE `tenantPhoneNumber` = '$phone'";
        $res = mysqli_query($con, $query);

        if($res){
            header("location:AdminPage.php");
        }
    }   
?>