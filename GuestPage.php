<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UniStore</title>
    <link rel="stylesheet" href="style.css" />
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
      <div class="header-right">
        <form action="Login.php">
          <button type="submit" id="login" style="padding: 0.3rem">
            Login
          </button>
        </form>
        <form action="Register.php">
          <button type="submit" id="register" style="padding: 0.3rem">
            Register
          </button>
        </form>
      </div>
    </header>
    <div class="body">
      <div class="menu-bar">
        <div class="btn">All</div>
        <div class="btn">Makanan</div>
        <div class="btn">Minuman</div>
        <div class="btn">Snacks</div>
      </div>
      <div id="tenant-list">
        <?php
            include('koneksi.php');
            $query = "SELECT tn.tenantLogo, tn.tenantCategory, prd.tenantID, tn.tenantUsername ,ROUND(AVG(ord.rating),1) as rating FROM `order` ord JOIN `product` prd ON prd.productID = ord.productID JOIN `customer` cus ON cus.customerID = ord.customerID JOIN tenant tn ON tn.tenantID = prd.tenantID GROUP BY tn.tenantID";
            $res = mysqli_query($con, $query);
            while($data = mysqli_fetch_array($res)){
              ?>
              <form action="Login.php" method="POST" enctype="multipart/form-data">
                <button type="submit" class="cursor">  
                  <div class="pemisah">
                    <div class="logo-tenant">
                      <img src="<?= $data['tenantLogo']?>" alt="Logo has not been inserted" style="width: 8rem; height: auto">
                    </div>
                    <div id="tenant-details">
                      <div class="detail" id="name"><?= $data['tenantUsername']?></div>
                      <div class="detail" id="rating">Rating: <?= $data['rating']?></div>
                      <div class="detail" id="category"><?= $data['tenantCategory']?></div>
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

  <template>
    <div><img src="" alt="logo" /></div>
    <div id="tenant-details">
      <div class="detail" id="name">Bakmi Enak</div>
      <div class="detail" id="rating">5</div>
      <div class="detail" id="category">Foods</div>
    </div>
  </template>
</html>
