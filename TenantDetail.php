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

  $nama = $_POST['name'];
  $rating = $_POST['rating'];
  $category = $_POST['category'];
  $logo = $_POST['logo'];

  $product = "SELECT * FROM `product` JOIN `tenant` ON product.tenantID = tenant.tenantID WHERE tenant.tenantUsername LIKE '$nama'";
  $res = mysqli_query($con, $product);
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
      <div class="tenants">
        <div id="tenant-list">
          <div class="tenanttenant" style="display: flex; flex-direction: row; column-gap: 2rem;">
            <div class="logo-tenant">
              <img src="<?= $logo?>" alt="Logo has not been inserted" style="width: 8rem; height: auto">
            </div>
            <div id="tenant-details">
              <div class="detail" id="name"><?= $nama?></div>
              <div class="detail" id="rating">Rating: <?= $rating?></div>
              <div class="detail" id="category"><?= $category?></div>
              <br><br>
            </div>
          </div>
        </div>
        <br>
        <div style="display:flex; flex-direction:column; row-gap: 1rem;">
         <?php
          while($data = mysqli_fetch_array($res)){
            ?>
              <form action="#" method="POST" enctype="multipart/form-data">
                <button type="submit" class="cursor">  
                  <div class="pemisah" style="display: flex; flex-direction: row; column-gap: 2rem;">
                    <div class="logo-tenant">
                      <img src="<?= $data['productPhoto']?>" alt="Logo has not been inserted" style="width: 8rem; height: auto">
                    </div>
                    <div id="tenant-details">
                      <div class="detail" id="name" style="font-size:1.2rem;"><?= $data['productName']?></div>
                      <div class="detail" id="description">Rating: <?= $data['productDescription']?></div>
                      <div class="detail" id="price">Price: <?= $data['productPrice']?></div>
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
