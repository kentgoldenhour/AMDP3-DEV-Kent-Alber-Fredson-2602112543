<?php
    $username = $_POST['newtenantname'];
    $email = $_POST['newtenantemail'];
    $phone = $_POST['newtenantphone'];
    $logo = $_FILES['newtenantlogo'];
    $category = $_POST['newtenantcategory'];

    if($email){
        include('koneksi.php');
        $query = "SELECT * FROM `tenant` WHERE tenantEmail LIKE '$email' AND tenantUsername LIKE '$username' AND tenantPhoneNumber LIKE '$phone'";
        $res = mysqli_query($con, $query);
        if(mysqli_num_rows($res) > 0){
            echo "User already exist";
        } else {
            if(is_uploaded_file($logo['tmp_name'])){
                $fileName = date('dmYHis').$logo['name'];
                if(move_uploaded_file($logo['tmp_name'], 'logos/'.$fileName)) {
                    session_start();
                    $_SESSION['isLogin'] = true;
                    $password = substr(str_shuffle('QWERTYUIOPASDFGHJKLZXCVBNM'), 0, 1).substr(str_shuffle('qwertyuiopsdfghjklzxcvbnm'), 0, 4).substr(str_shuffle('0123456789'), 0, 3);
                    $tenant = $con->prepare("INSERT INTO tenant (`tenantEmail`, `tenantUsername`, `tenantPhoneNumber`, `tenantPassword`, `tenantCategory`) VALUES( ?, ?, ?, ?, ?)");
                    $tenant->bind_param("sssss", $email, $username, $phone, $password, $category);
                    $tenant->execute();

                    $query = "UPDATE `tenant` SET `tenantLogo` = 'logos/$fileName' WHERE `tenantUsername` = '$username' AND `tenantEmail` = '$email' AND `tenantPassword`='$password';";
                    $res = mysqli_query($con, $query);

                    setcookie("sendemail", $email);
                    setcookie("randompassword", $password);
                    header("location:sendMail.php");
                }      
            }
        }
    } 
    else {
        // header("location:addNewTenant.php");
        echo "Error";
    }
?>