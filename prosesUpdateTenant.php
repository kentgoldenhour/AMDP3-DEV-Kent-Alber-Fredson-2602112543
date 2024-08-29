<?php
    include('koneksi.php');
    $foto = $_FILES['tenantlogo'];
    $name = $_POST['tenantusername'];

    if(is_uploaded_file($foto['tmp_name']) && $name){
        $fileName = date('dmYHis').$foto['name'];
        if(move_uploaded_file($foto['tmp_name'], 'logos/'.$fileName)) {
            $query = "UPDATE `tenant` SET `tenantLogo` = 'logos/$fileName' WHERE `tenantUsername` = '$name';";
            $res = mysqli_query($con, $query);

            if($res){
                header("location:TenantPage.php");
            }
        }   
    }
?>