<?php
    $email = $_POST['logemail'];
    $password = $_POST['logpass'];

    if($email && $password){
        include('koneksi.php');
        $query_admin = "SELECT * FROM `admin` WHERE adminEmail LIKE '$email' AND adminPassword LIKE '$password'";
        $res_admin = mysqli_query($con, $query_admin);
        $query_tenant = "SELECT * FROM `tenant` WHERE tenantEmail LIKE '$email' AND tenantPassword LIKE '$password'";
        $res_tenant = mysqli_query($con, $query_tenant);
        $query_customer = "SELECT * FROM `customer` WHERE customerEmail LIKE '$email' AND customerPassword LIKE '$password'";
        $res_customer = mysqli_query($con, $query_customer);
        
        if(mysqli_num_rows($res_admin) == 1){
            session_start();
            $_SESSION['isAdminLogin'] = true;
            setcookie("loginadminemail", $email);
            header("location:AdminPage.php"); // direct to admin page
        } else if(mysqli_num_rows($res_tenant) == 1){
            session_start();
            $_SESSION['isTenantLogin'] = true;
            setcookie("logintenantemail", $email);
            header("location:TenantPage.php"); // direct to tenant page
        } else if(mysqli_num_rows($res_customer) == 1){
            session_start();
            $_SESSION['isCustomerLogin'] = true;
            setcookie("logincustomeremail", $email);
            header("location:CustomerPage.php"); // direct to customer page
        } else {
            $error = "Email Not Found";
            setcookie("errors", $error);
            header("location:Login.php");
        }
    } else {
       header("location:Login.php");
    }
?>