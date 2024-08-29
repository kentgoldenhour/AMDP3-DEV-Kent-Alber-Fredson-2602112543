<?php
  include('koneksi.php');
  session_start();
  if(!empty($_SESSION['isCustomerLogin'])){
    if($_SESSION['isCustomerLogin']==false){
      header('location:Login.php');
    }
  } else {
      header('location:Login.php');
  }
  $email = $_COOKIE['logincustomeremail'];
  $profile = "SELECT * FROM  `customer` WHERE customerEmail LIKE '$email'";
  $prof = mysqli_query($con, $profile);
  $count = mysqli_fetch_array($prof);
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UniStore</title>
    <link rel="stylesheet" href="style.css" />
        <script
      src="https://code.jquery.com/jquery-3.6.1.js"
      integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
      crossorigin="anonymous"
    ></script>
    <script src="script1.js"></script>
  </head>
  <body>
    <header>
      <div class="header-left">
        <img src="assets/UniEat.png" alt="UniEat Logo" />
      </div>
      <div class="header-middle">
        <form action="" class="header-middle">
          <input type="text" name="search" id="search" placeholder="Search" />
          <label for="search"
            ><img src="assets/search.png" alt="search logo"
          /></label>
        </form>
      </div>
      <div class="shopcart">
        <a href="Cart.php"><img src="assets/shopcart.png" alt="shopcart" /></a>
      </div>
      <div class="header-right profile">
       
                <img src="<?= $count['customerPhoto']?>" alt="Profile" />    
              
        <div class="profile">
          <div id="profile-name">
            <?= $count['customerUsername']?>
            &#9660
          </div>
          <br>
          <div class="drop-down" style="display:none;">
            <div id="home"><a href="CustomerPage.php">Home</a></div>
            <div id="history"><a href="History.php">History</a></div>
            <div id="Settings"><a href="CustomerSettings.php">Settings</a></div>
            <div id="logout"><a href="prosesLogout.php">Logout</a></div>
          </div>
        </div>
        
      </div>
    </header>
    <!-- ------------------------------------------------------- -->
    <div class="body">
      <div class="menu-bar">
        <div class="btn">All</div>
        <div class="btn">Makanan</div>
        <div class="btn">Minuman</div>
        <div class="btn">Snacks</div>
      </div>
      <div class="tenants">
        <div id="tenant-list">
          <?php
            include('koneksi.php');
            $query = "SELECT tn.tenantLogo, tn.tenantCategory, prd.tenantID, tn.tenantUsername ,ROUND(AVG(ord.rating),1) as rating FROM `order` ord JOIN `product` prd ON prd.productID = ord.productID JOIN `customer` cus ON cus.customerID = ord.customerID JOIN tenant tn ON tn.tenantID = prd.tenantID GROUP BY tn.tenantID";
            $res = mysqli_query($con, $query);
            while($data = mysqli_fetch_array($res)){
              ?>
              <form action="TenantDetail.php" method="POST" enctype="multipart/form-data">
                <button type="submit" class="cursor">  
                  <div class="pemisah">
                    <div class="logo-tenant">
                      <img src="<?= $data['tenantLogo']?>" alt="Logo has not been inserted" style="width: 8rem; height: auto">
                    </div>
                    <div id="tenant-details">
                      <div class="detail" id="name"><?= $data['tenantUsername']?></div>
                      <div class="detail" id="rating">Rating: <?= $data['rating']?></div>
                      <div class="detail" id="category"><?= $data['tenantCategory']?></div>
                      <input type="hidden" name="name" value="<?= $data['tenantUsername']?>">
                      <input type="hidden" name="rating" value="<?= $data['rating']?>">
                      <input type="hidden" name="category" value="<?= $data['tenantCategory']?>">
                      <input type="hidden" name="logo" value="<?= $data['tenantLogo']?>">
                    </div>
                  </div>
                </button>
              </form>
              <?php
            }
          ?>
        </div>
      </div>
    </div>
  </body>
</html>
