<?php
    include('koneksi.php');
    $nama = $_POST['itemname'];
    $price = $_POST['itemprice'];
    $desc = $_POST['itemdescription'];
    $foto = $_FILES['itemlogo'];
    $t_id = $_POST['tenantID'];
    $qty = $_POST['itemqty'];
    $category = $_POST['tenantCategory'];
    
    if($nama && $price && $desc && $t_id && $qty && $category){
        if(is_uploaded_file($foto['tmp_name'])){
            $fileName = date('dmYHis').$foto['name'];
            if(move_uploaded_file($foto['tmp_name'], 'logos/'.$fileName)) {
                    $product = $con->prepare("INSERT INTO product (`productName`, `productCategory`, `productQty`, `productDescription`, `productPrice`, `tenantID`) VALUES( ?, ?, ?, ?, ?, ?)");
                    $product->bind_param("ssisii", $nama, $category, $qty, $desc, $price, $t_id);
                    $product->execute();

                    $query = "UPDATE `product` SET `productPhoto` = 'logos/$fileName' WHERE `productName` = '$nama' AND `productDescription` = '$desc' AND `tenantID`='$t_id';";
                    $res = mysqli_query($con, $query);
                    
                    if($res){
                        header("location:addItems.php");
                        echo "<script>Successfully added</script>";
                    }
            }   
        }
    }
?>