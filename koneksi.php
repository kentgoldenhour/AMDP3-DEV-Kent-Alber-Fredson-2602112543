<?php

    $con = mysqli_connect('localhost', 'root', '', 'amdp3-dev-kentalberfredson-project3', 3306);
    if(!$con){
        echo "Gagal Terkoneksi";
        die();
    }
    
?>