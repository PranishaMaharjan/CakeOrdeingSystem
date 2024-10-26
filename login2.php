<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="login.css" />
    <title>Login</title>
  </head>
  <body>
    <div class="wrapper">
      <!----------------------------- Form box ----------------------------------->
      <div class="form-box">
        <!------------------- login form -------------------------->
        <div class="login-container" id="login">
          <div class="top">
            <span
              >Don't have an account?
              <a href="#" onclick="register()">Sign Up</a></span>
            <header>Login</header>
          </div>
          <form action="signin.php" method="post">
            <div class="input-box">
              <input type="text" class="input-field" name="name" placeholder="Username" />
              <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
              <input
                type="password"
                name="password"
                class="input-field"
                placeholder="Password"
              />
              <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-box">
              <input type="submit" class="submit" name="loginbtn" value="Sign In" />
            </div>
          </form>
        </div>
        <!------------------- registration form -------------------------->
        <div class="register-container" id="register">
          <div class="top">
            <span
              >Have an account? <a href="#" onclick="login()">Login</a></span
            >
            <header>Sign Up</header>
          </div>
          <form action="register.php" method="post">
            <div class="two-forms">
              <div class="input-box">
                <input type="text" class="input-field" name="name" placeholder="Username" />
                <i class="bx bx-user"></i>
              </div>
              <div class="input-box">
                <input type="text" class="input-field" name="password" placeholder="Password" />
                <i class="bx bx-alt"></i>
              </div>
            </div>
            <div class="input-box">
              <input type="text" class="input-field" name="email" placeholder="Email" />
              <i class="bx bx-envelope"></i>
            </div>
            <div class="input-box">
              <input type="password" class="input-field" name="number" placeholder="Number" />
              <i class="bx bx-phone"></i>
            </div>
            <div class="input-box">
              <input type="submit" class="submit" name="registerbtn" value="Register" />
            </div>
          </form>
        </div>
      </div>
    </div>

    <script>
      function myMenuFunction() {
        var i = document.getElementById("navMenu");

        if (i.className === "nav-menu") {
          i.className += " responsive";
        } else {
          i.className = "nav-menu";
        }
      }
    </script>

    <script>
      var a = document.getElementById("loginBtn");
      var b = document.getElementById("registerBtn");
      var x = document.getElementById("login");
      var y = document.getElementById("register");

      function login() {
        x.style.left = "4px";
        y.style.right = "-520px";
        a.className += " white-btn";
        b.className = "btn";
        x.style.opacity = 1;
        y.style.opacity = 0;
      }

      function register() {
        x.style.left = "-510px";
        y.style.right = "5px";
        a.className = "btn";
        b.className += " white-btn";
        x.style.opacity = 0;
        y.style.opacity = 1;
      }
    </script>
  </body>
</html>
