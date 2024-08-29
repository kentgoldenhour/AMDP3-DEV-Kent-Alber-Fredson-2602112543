<?php
    include('koneksi.php');
    $phone = $_GET['newtenantphone'];

    if($phone){
        $query = "DELETE FROM `tenant` WHERE `tenantPhoneNumber` = '$phone'";
        $res = mysqli_query($con, $query);

        if($res){
            header("location:AdminPage.php");
        }
    }   
?>