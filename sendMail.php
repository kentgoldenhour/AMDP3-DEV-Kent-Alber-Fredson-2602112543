<?php
    $to = $_COOKIE["sendemail"];
    $subject = "Your New Password";
    $body = $_COOKIE['randompassword'];
    $header = "New Password";
    $res = mail($to, $subject, $body, $header);

    if($res){
        echo 'Mail sent successfully';
        header("location:AdminPage.php");
    } else {
        echo "Sending failed...<br>Do it again!";
    }
?>