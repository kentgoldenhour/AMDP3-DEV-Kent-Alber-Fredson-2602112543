<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
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
    <!-- ------------------------------------------------------------------ -->
    <form action="prosesRegister.php" class="registerpage" method="POST">
      <div class="unieatlogo"><img src="assets/UniEat.png" alt="UniEat Logo" /></div>
      <div class="registerform" style="margin: 0 15%;">
        <div>
          <input
            type="text"
            name="regemail"
            id="regemail"
            placeholder="Email"
            value=""
          />
          <div id="regemailvali"></div>
        </div>
        <div>
          <input
            type="text"
            name="regusername"
            id="regusername"
            placeholder="Username"
            value=""
          />
          <div id="reguservali"></div>
        </div>
        <div>
          <input
            type="text"
            name="regnum"
            id="regnum"
            placeholder="Phone Number"
            value=""
          />
          <div id="regnumvali"></div>
        </div>
        <div>
          <input
            type="password"
            name="regpass"
            id="regpass"
            placeholder="Password"
            value=""
          />
          <div id="regpassvali"></div>
        </div>
        <div>
          <input
            type="password"
            name="regconpass"
            id="regconpass"
            placeholder="Confirm Password"
            value=""
          />
          <div id="regconpassvali"></div>
        </div>
        <div><button id="btnregis">Register</button></div>
        <hr />
        <div>Already have an account? <a href="Login.php">Login</a></div>
      </div>
    </form>
  </body>
</html>
