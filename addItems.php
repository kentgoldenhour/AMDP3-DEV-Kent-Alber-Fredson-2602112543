<?php
  include('koneksi.php');
  $email = $_COOKIE['logintenantemail'];
  $profile = "SELECT * FROM  `tenant` WHERE tenantEmail LIKE '$email'";
  $prof = mysqli_query($con, $profile);
  $count = mysqli_fetch_array($prof);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Settings</title>
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
    <!-- ------------------------------------------------------------ -->
    <form action="prosesAddItems.php" class="tenantsettings" enctype="multipart/form-data" method="POST">
      <div class="tenantsettingslogo"><img src="assets/UniEat.png" alt="" /></div>
      <div class="tenantsettingsform">
        <div class="tenant">
          <div><label for="itemlogo">Pictures</label></div>
          <div class="updatelogo">
            <input type="file" name="itemlogo" id="itemlogo" value="" />
          </div>
        </div>
        <div class="tenant">
          <label for="itemname">Name</label>
          <input
            type="text"
            name="itemname"
            id="itemname"
            value=""
            placeholder="Input item name"
          />
        </div>
        <div class="tenant">
          <label for="itemprice">Price</label>
          <input
            type="text"
            name="itemprice"
            id="itemprice"
            value=""
            placeholder="Input item price"
          />
        </div>
        <div class="tenant">
          <label for="itemdescription">Description</label>
          <input
            type="text"
            name="itemdescription"
            id="itemdescription"
            value=""
            placeholder="Input item description"
            size=100;
          />
        </div>
        <div class="tenant">
          <label for="itemqty">Qty</label>
          <input
            type="number"
            name="itemqty"
            id="itemqty"
            value=""
            placeholder="Input item qty"
          />
        </div>
        <input type="hidden" name="tenantID" value="<?=$count['tenantID']?>">
        <input type="hidden" name="tenantCategory" value="<?=$count['tenantCategory']?>">
        <div>
            <button type="submit" style="background-color:yellow; color:white; padding:.5rem; font-size:1.2rem; cursor:pointer">Add Items</button>
        </div>
      </div>
    </form>
  </body>
</html>
