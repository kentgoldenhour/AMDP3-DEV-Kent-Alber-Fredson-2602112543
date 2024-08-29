<?php
  include('koneksi.php');
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
      <div class="shopcart">
        <img src="assets/shopcart.png" alt="shopcart" />
      </div>
      <div class="header-right profile">
        <img src="assets/userprofile.png" alt="profile" />
        <div class="profile">
          <div id="profile-name">
            <?= $count['customerUsername']?>
            &#9660
          </div>
          <br>
          <div class="drop-down" style="display:none;">
            <div id="home"><a href="CustomerPage.php">Home</a></div>
            <div id="history"><a href="History.php">History</a></div>
            <div id="settings"><a href="CustomerSettings.php">Settings</a></div>
            <div id="logout"><a href="prosesLogout.php">Logout</a></div>
          </div>
        </div>
      </div>
    </header>
    <!-- ------------------------------------------------------------ -->
    <form action="prosesUpdateCustomer.php" class="custsettings" method="POST">
      <div class="custsettingslogo"><img src="assets/UniEat.png" alt="" /></div>
      <div class="custsettingsform">
        <div class="cust">
          <label for="customername">Name</label>
          <input
            type="text"
            name="customername"
            id="customername"
            value="<?= $count['customerUsername']?>"
            placeholder="Name"
          />
        </div>
        <div class="cust">
          <label for="customerphone">Phone</label>
          <input
            type="text"
            name="customerphone"
            id="customerphone"
            value="<?= $count['customerPhoneNumber']?>"
            placeholder="Phone Number"
            disabled = "disabled"
          />
        </div>
        <input type="hidden" name="customerphonenum" value="<?= $count['customerPhoneNumber']?>">
        <div class="cust">
          <label for="customeremail">Email</label>
          <input
            type="text"
            name="customeremail"
            id="customeremail"
            value="<?= $count['customerEmail']?>"
            placeholder="Email"
          />
        </div>
        <div class="right-bottom-btn">
          <button type="submit">Update</button>
          <a href=""><button>Change Password</button></a>
        </div>
      </div>
    </form>
  </body>
</html>
