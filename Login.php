<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
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
    <!-- ------------------------------------------------------------ -->
    <form action="prosesLogin.php" class="logpage" method="POST">
        <div class="unieatlogo"><img src="assets/UniEat.png" alt="UniEat Logo" /></div>
        <div class="logform">
          <div>
            <input
              type="text"
              name="logemail"
              id="logemail"
              placeholder="Email"
              value=""
            />
            <div id="logemailvali"></div>
          </div>
          <div>
            <input
              type="password"
              name="logpass"
              id="logpass"
              placeholder="Password"
              value=""
            />
            <div id="logpassvali"></div>
          </div>
          <div id="forgotpassword">
            <a href="ForgotPassword.php">Forgot your password?</a>
          </div>
          <div><button id="btnlog">Login</button></div>
          <hr />
          <div>
            Don't have any account? <a href="Register.php">Register</a>
          </div>
        </div>
    </form>
  </body>
</html>
