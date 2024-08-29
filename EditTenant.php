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
  $email = $_POST['admin'];
  $profile = "SELECT * FROM  `admin` WHERE adminEmail LIKE '$email'";
  $prof = mysqli_query($con, $profile);
  $count = mysqli_fetch_array($prof);
  
  $tenant_name = $_POST['name'];
  $tenant = "SELECT * FROM  `tenant` WHERE tenantUsername LIKE '$tenant_name'";
  $res = mysqli_query($con, $tenant);
  $data = mysqli_fetch_array($res);
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
            <?= $count['adminUsername']?>
            &#9660
          </div>
          <br>
          <div class="drop-down">
            <div id="home"><a href="AdminPage.php">Home</a></div>
            <div id="manage-admin"><a href="ManageAdmin.php">Manage Admin</a></div>
            <div id="manage-categories"><a href="ManageCategories.php">Manage Categories</a></div>
            <div id="logout"><a href="prosesLogout.php">Logout</a></div>
          </div>
        </div>
      </div>
    </header>
    <form action="prosesEditTenant.php?newtenantphone=<?=$data['tenantPhoneNumber']?>" class="tenantsettings" enctype="multipart/form-data" method="POST">
        <div class="tenantsettingsform">
        <div>
            <div>Tenant : <?= $_POST['name']?></div>
            <div>Rating : <?= $_POST['rating']?></div>
        </div>
        <div class="tenant">
          <label for="newtenantname">Tenant Name</label>
          <input
            type="text"
            name="newtenantname"
            id="newtenantname"
            value="<?=$data['tenantUsername']?>"
            placeholder="Input Tenant Name"
          />
        </div>
        <div class="tenant">
          <label for="newtenantemail">Email</label>
          <input
            type="text"
            name="newtenantemail"
            id="newtenantemail"
            value="<?=$data['tenantEmail']?>"
            placeholder="Input Tenant Email"
          />
        </div>
        <div class="tenant">
          <label for="newtenantphone">Phone Number</label>
          <input
            disabled = "disabled";
            type="text"
            name="newtenantphone"
            id="newtenantphone"
            value="<?=$data['tenantPhoneNumber']?>"
            placeholder="Input Tenant Phone Number"
          />
        </div>
        <div class="left-bottom-btn">
          <button><a href="prosesDeleteTenant.php?newtenantphone=<?=$data['tenantPhoneNumber']?>">Delete</button>    
        </div>
        <div class="right-bottom-btn">
          <button>Save</button>
          <button><a href="AdminPage.php">Cancel</a></button>
        </div>
      </div>
    </form>
  </body>
</html>
