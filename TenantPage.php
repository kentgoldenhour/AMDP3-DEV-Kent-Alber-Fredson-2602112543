<?php
  session_start();
  include('koneksi.php');
  if(!empty($_SESSION['isTenantLogin'])){
    if($_SESSION['isTenantLogin']==false){
      header('location:Login.php');
    }
  } else {
      header('location:Login.php');
  }
  $email = $_COOKIE['logintenantemail'];
  $profile = "SELECT * FROM  `tenant` WHERE tenantEmail LIKE '$email'";
  $prof = mysqli_query($con, $profile);
  $count = mysqli_fetch_array($prof);
  $t_id = $count['tenantID'];
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
      <div class="header-right profile">
        <img src="<?= $count['tenantLogo']?>" alt="Profile" />    
        <div class="profile">
          <div id="profile-name">
            <?= $count['tenantUsername']?>
            &#9660
          </div>
          <br>
          <div class="drop-down" style="display:none;">
            <div id="home"><a href="TenantPage.php">Home</a></div>
            <div id="completed-orders"><a href="CompletedOrders.php">Completed Orders</a></div>
            <div id="manage-item"><a href="ManageItems.php?nama=<?= $count['tenantUsername']?>&rating=<?= $count['tenantRating']?>&category=<?= $count['tenantCategory']?>&logo=<?= $count['tenantLogo']?>">Manage Items</a></div>
            <div id="Settings"><a href="TenantSettings.php">Settings</a></div>
            <div id="logout"><a href="prosesLogout.php">Logout</a></div>
          </div>
        </div>
        
      </div>
    </header>
    <div class="body">
      <div class="menu-bar">
        <div class="btn">All</div>
        <div class="btn">Makanan</div>
        <div class="btn">Minuman</div>
        <div class="btn">Snacks</div>
      </div>
      <div class="customers">
      <div id="customer-list">
        <?php
            $query = "SELECT cus.customerUsername, ord.orderQty, prd.productName, prd.productPrice, prd.tenantID ,SUM(ord.orderQty*prd.productPrice) as totalPrice FROM `order` ord JOIN `product` prd ON prd.productID = ord.productID JOIN `customer` cus ON cus.customerID = ord.customerID WHERE prd.tenantID LIKE '$t_id' GROUP BY cus.customerUsername, prd.productName";
            $res = mysqli_query($con, $query);
            while($data = mysqli_fetch_array($res)){
              ?>
              <div class="pemisah">
                <div class="logo-customer"><img src="assets/userprofile.png" alt="" style="width: 5rem; height: 5rem"></div>
                <div id="customer-details">
                  <div class="detail" id="name">Customer: <?= $data['customerUsername']?></div>
                  <div class="detail" id="productname"><?= $data['productName']?> (<?=$data['productPrice']?>/pcs)</div>
                  <div class="detail" id="quantity">Quantity: <?= $data['orderQty']?></div>
                  <div class="detail" id="price">Total Price: Rp <?= $data['totalPrice']?></div>
                </div>
              </div>
              <?php
            }
          ?>
      </div>
    </div>
  </body>
</html>
