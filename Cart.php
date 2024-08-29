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
  $nama = $_COOKIE['logincustomeruser'];
  $profile = "SELECT * FROM  `customer` WHERE customerUsername LIKE '$nama'";
  $prof = mysqli_query($con, $profile);
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
        <img src="assets/shopcart.png" alt="shopcart" />
      </div>
      <div class="header-right profile">
        <?php
          while($count = mysqli_fetch_array($prof)){
              ?>
                <img src="<?= $count['customerPhoto']?>" alt="Profile" />    
              <?php
            }
        ?>
        <div class="profile">
          <div id="profile-name">
            <?= $_COOKIE['logincustomeruser']?>
            &#9660
          </div>
          <br>
          <div class="drop-down" style="display:none;">
            <div id="home"><a href="AdminPage.php">Home</a></div>
            <div id="history"><a href="History.php">History</a></div>
            <div id="Settings"><a href="CustomerSettings.php">Settings</a></div>
            <div id="logout"><a href="prosesLogout.php">Logout</a></div>
          </div>
        </div>
        
      </div>
    </header>
    <!-- ------------------------------------------------------- -->
    <div class="body">
      <button class="cancel"><a href="CustomerPage.php">Close</a></button>
    </div>
  </body>
</html>
