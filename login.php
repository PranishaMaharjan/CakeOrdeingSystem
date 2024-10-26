<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cake Ordering System</title>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital@1&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    
    <script src="java.min.js"></script>
    <!-- <link rel="icon" href="logo.png"> -->
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="css/home.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/flickity.css">
    <link rel="stylesheet" href="css/media.css">
    
  </head>
  <body>

  <section style="background-image:url('images/back.jpg'); background-size:cover; background-position:center;">
        <div class="menu-login">
            <!-- <div class="leftside">
                <img src="images/logo.png" alt="logo.png">
            </div> -->
            <div class="leftside">
                <img src="images/logoMD1.png" alt="logo.png">
            </div>
            <div class="rightside" id="rightside">
                <nav class="Icons">
                    <a href="home.php" class="navicon">Home</a>
                    <a href="#Second-sec-id" class="navicon">About Us</a>
                    <a href="#menu-id" class="navicon">Menu</a>
                    <a href="#Gallery-Id" class="navicon">Gallery</a>
                    <a href="#Feedback" class="navicon">Feedback</a>
                    <a href="contactus.php" class="navicon">Contact</a>
                    <i class="fas fa-times-circle" id="cross" onclick="Hidemenu()"></i>
                </nav>
            </div>
        </div>
        
     
    <div class="wrapper" >
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
                <input type="password" class="input-field" name="password" placeholder="Password" />
                <i class="bx bx-alt"></i>
              </div>
            </div>
            <div class="input-box">
              <input type="text" class="input-field" name="email" placeholder="Email" />
              <i class="bx bx-envelope"></i>
            </div>
            <div class="input-box">
              <input type="text" class="input-field" name="number" placeholder="Number" />
              <i class="bx bx-phone"></i>
            </div>
            <div class="input-box">
              <input type="submit" class="submit" name="registerbtn" value="Register" />
            </div>
          </form>
        </div>
      </div>
    </div>
    
    
    
    <div class="footer_div" style="background-color: white;">
    <section class="footer" id="footerid">
    
    <div>
        <div class="row" style="width:100%;">
            <div class="col-lg-4 col-md-4 col-12 mx-auto">
                <h3>About Us</h3>
                <p>We make delicious, hygienic and good quality of bakery items.</p>
                <!-- <hr class="w-25 mx-auto text-dark">
                <a href="https://www.facebook.com/" target="blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com" target="blank"><i class="fab fa-twitter"></i></a>
                <a href="https://gmail.google.com" target="blank"><i class="fab fa-google-plus-g"></i></a>
                <a href="https://www.pinterest.com/" target="blank"><i class="fab fa-pinterest"></i></a>
                <a href="https://instagram.com/" target="blank"><i class="fab fa-instagram"></i></a> -->
            </div>
            <div class="col-lg-4 col-md-4 col-12 mx-auto">
                <h3>Contact Us</h3>
                <p>Khusibun, Kathmandu<br>
                    Sorkhutte, Kathmandu<br>
                    Chettrapati, Kathmandu</p>
                <hr class="w-25 mx-auto text-dark">
                <p>Hours: Opens 7-AM To 10-PM <br>
                    Sunday to Saturday <br>
                Phone: (021) 35127361</p>      
            </div>
            <div class="col-lg-4 col-md-4 col-12 mx-auto">
                <h3>Location</h3>
                <iframe src="https://www.google.com/maps/dir//Pachhai+Chhen+2,+Kathmandu+44600/@27.7170429,85.2210778,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x39eb192c9395e77d:0x9b34fdf7499df270!2m2!1d85.3034702!2d27.7170676?entry=ttu"  height="200" style="border:0;" allowfullscreen="" loading="lazy" class="container-fluid"></iframe>
            </div>
        </div>
    </div>
    <hr class="w-50 mt-5 mx-auto text-dark">
    <div class="last-footer" >
        <div class="row" style="width:100%;">
            <div class="col-lg-4 col-md-4 col-12 mx-auto Copyright">
                <h4 id="last-logo">MD Taj Bakery</h4>
            </div>
            <div class="col-lg-4 col-md-4 col-12 mx-auto Copyright">
                <h4><span id="Name">MD Taj Bakery</span> © Privacy Policy</h4>
            </div>
            <!-- <div class="col-lg-4 col-md-4 col-12 mx-auto Copyright">
                <h4>Design & Developed by <span id="Name">MUDASSIR UDDIN</span></h3>
            </div> -->
        </div>
    </div>
    </section>

</section>
</div>


<!-- js for toggle form -->

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