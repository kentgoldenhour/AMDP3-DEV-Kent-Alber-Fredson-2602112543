<?php
  include('koneksi.php');
  session_start();
  if(!empty($_SESSION['isAdminLogin'])){
    if($_SESSION['isAdminLogin']==false){
      header('location:Login.php');
    }
  } else {
      header('location:Login.php');
  }
  $email = $_COOKIE['loginadminemail'];
  $profile = "SELECT * FROM  `admin` WHERE adminEmail LIKE '$email'";
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
      <div class="header-right profile">
        <img src="<?= $count['adminPhoto']?>" alt="Profile" />    
        <div class="profile">
          <div id="profile-name">
            <?= $_COOKIE['loginadminuser']?>
            &#9660
          </div>
          <br>
          <div class="drop-down" style="display:none;">
            <div id="home"><a href="AdminPage.php">Home</a></div>
            <div id="manage-admin"><a href="ManageAdmin.php">Manage Admin</a></div>
            <div id="manage-categories"><a href="ManageCategories.php">Manage Categories</a></div>
            <div id="logout"><a href="prosesLogout.php">Logout</a></div>
          </div>
        </div>
      </div>
    </header>
    <div class="body">
      <div class="new-tenant">
        <div>Shops:</div>
        <div><a href="addNewTenant.php">New Tenant</a></div>
      </div>
      <div id="tenant-list">
         <?php
            include('koneksi.php');
            $query = "SELECT * FROM  `tenant`";
            $res = mysqli_query($con, $query);
            while($data = mysqli_fetch_array($res)){
              ?>
              <form action="EditTenant.php" method="POST" enctype="multipart/form-data">
                <button type="submit" class="cursor">    
                 <div class="pemisah">    
                    <div class="logo-tenant">
                      <img src="<?= $data['tenantLogo']?>" alt="Logo has not been inserted" style="width: 8rem; height: auto">
                    </div>
                    <div id="tenant-details">
                      <div class="detail" id="name"><?= $data['tenantUsername']?></div>
                      <div class="detail" id="rating">Rating: <?= $data['tenantRating']?></div>
                      <input type="hidden" name="name" value="<?= $data['tenantUsername']?>">
                      <input type="hidden" name="rating" value="<?= $data['tenantRating']?>">
                      <input type="hidden" name="admin" value="<?= $count['adminEmail']?>">
                    </div>
                  </div>
                </button>
              </form>
              <?php
            }
          ?>
      </div>
    </div>
  </body>
</html>
