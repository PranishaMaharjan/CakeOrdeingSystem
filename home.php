<?php
session_start();

// Connect to the database
include 'database/connection.php';
if (isset($_GET['status']) && $_GET['status'] === "Completed") {
 
  $order_id = $_SESSION['order_id'];
  echo($order_id);
  $stmt = $conn->prepare("UPDATE order_manager SET pay_mode = 'paid-khalti' WHERE order_id = ?");
  $stmt->bind_param('i', $order_id);
  $stmt->execute();

  // Close the database connection
  $conn->close();
 
  // Redirect to the desired page
  unset($_SESSION['cart']);
  echo '<script>alert("Order placed successfully.")</script>';
  echo '<script>
  setTimeout(function() {
    window.location.href = "http://localhost/cakeOrderingSystem/home.php";
  }, 0);
</script>';
 

  exit; // Ensure script execution stops after redirection
}
?>

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
    <link rel="icon" href="images/logo.png">
    
    <script src="java.min.js"></script>
    <!-- <link rel="icon" href="logo.png"> -->
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/brands.css">
    <link rel="stylesheet" href="css/flickity.css">
    <link rel="stylesheet" href="css/media.css">
    
  </head>
  <body>

    <section class="Navbar-Menu" id="Navbar-Menu-Id" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)),
    url(images/back.jpg); ">
        <div class="menu">
            <div class="leftside">
                <img src="images/logoMD1.png" alt="logo.png">
            </div>
            <div class="rightside" id="rightside">
                <nav class="Icons">
                    <a href="home.php" class="navicon">Home</a>
                    <a href="#Second-sec-id" class="navicon">About Us</a>
                    <div class="drop">
                    <button class="dropbtn main-nav-link">
                       <a href="#" class="navicon">MENU</a>
                    </button>
                    <div class="dropdown-contentt">
                        <a href="cakeitem.php" class="naviconmenu">Cake Item</a><br>
                        <a href="bakeryitem.php" class="naviconmenu">Bakery Item</a>
                    </div>
                    </div>
                    <a href="#Feedback" class="navicon">Feedback</a>
                    <a href="contactus.php" class="navicon">Contact</a>

                    <!-- <i class="fas fa-times-circle" id="cross" onclick="Hidemenu()"></i> -->

                    
<!-- ------------Login----------- -->
                <div class="drop">
                    <button class="dropbtn main-nav-link"><?php if (isset($_SESSION['user_name'])): ?>
                        <a href="#"><?php echo $_SESSION['user_name']; ?></a> 
                        <div class="dropdown-content">
                            <a href="logout.php">logout</a>
                        </div>
                    </button>

                    <button class="dropbtn main-nav-link">
                    <!-- admin -->
                    <?php elseif (isset($_SESSION['admin_name'])): ?>
                        <a href="./admin/admin.php"><?php echo $_SESSION['admin_name']; ?></a>
                        <div class="dropdown-content">
                            <a href="logout.php">logout</a>
                        </div>
                    </button>

                    
                    <?php else: ?>
                        <a href="login.php">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="w-6 h-6 icons"
                    >
                        <path
                        fill-rule="evenodd"
                        d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                        clip-rule="evenodd"
                        />
                    </svg>
                    </a>
                    <?php endif;?>
                    
                    
                </div>
                

<!-- --------------CART------------- -->
                <?php if (isset($_SESSION['user_name']) || isset($_SESSION['admin_name'])): ?>
                     <a href="cart.php">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="w-6 h-6 icons"
                    >
                        <path
                        fill-rule="evenodd"
                        d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z"
                        clip-rule="evenodd"
                        />
                    </svg>
                    </a>
            <?php endif;?>
                </nav>
            </div>
            <div class="menubar" >
                <div class="line" onclick="Togglebar()"></div>
                <div class="line" onclick="Togglebar()"></div>
                <div class="line" onclick="Togglebar()"></div>
            </div>
        </div>
        
        <div class="heading" >
            <h2>Welcome To MD Taj Bakery</h2>
        </div>
        <div class="heading2" >
            <a  href="contactus.php"><i class="fal fa-phone-rotary"></i>Contact Us</a>
        </div>
        <div class="Scroll-Arrow" id="topbutton">
            <a href="#"><i class="fal fa-arrow-up"></i></a>
         </div>
    </section>



    <!-- ABOUT US SECTION -->
    <section class="second-Sec" id="Second-sec-id">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 mx-auto second-sec">
                    <img src="https://images.pexels.com/photos/8651023/pexels-photo-8651023.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"class="container-fluid">
                </div>
                <div class="col-lg-6 col-md-6 mx-auto second-sec">
                    <h2><span id="Welcome">Welcome to</span> MD Taj Bakery</h2>
                    <p>Welcome to MD Taj Bakery, where we bake happiness into every treat! At MD Taj Bakery, we believe that everyone deserves a little sweetness in their life. That's why we offer our products at affordable prices, so you can indulge in our delicious treats without breaking the bank.</p>
                    <a href="#">About Us</a>
                </div>
            </div>
        </div>
    </section>



    <!--MENU SECTION  -->
    <section class="MenuSection" id="menu-id">
        <h1 style="font-family: Segoe Script; font-size: 35px; color: #c37a3e"><hr style="height: 3px;"> Most Popular Items <hr style="height: 3px;"></h1>
        <!-- <h1 style="font-family: cursive; font-size: 40px;  ">Most Popular Items</h1> -->
        
        <!--
            <div class="middleside" id="middleside">
            <nav class="menuIcons">
                <a href="#menu-id" class="navicon">Cake Menu</a>
                <a href="#menu-id" class="navicon">Other Bakery Items</a>
            </nav>
        </div>
    -->
    <div class="tab-class text-center wow fadeInup" data-wow-delay="0.1s">  

            <div class="container-fluid">


            <!-- NORMAL DESIGNED CAKES -->
            <div class="row show" id="cake">
                <!-- <div class="ps-3">
                    <h1 style="font-family: cursive; font-size: 25px; padding-top:20px; ">Normal Designed Cakes</h1>
                </div> -->
                
                
                <?php
                include 'database/connection.php';

                // Get the room data from the database
                $sql = "SELECT * FROM popularcake";
                $result = mysqli_query($conn, $sql);
              
                // Loop through the room data and create the cards
                while ($cakes = mysqli_fetch_assoc($result)) {
                  $cake_id = $cakes['cakeId'];
                  $cake_name = $cakes['cakeFlavour'];
                  $cake_price = $cakes['cakePrice'];
                  $cake_image = $cakes['cakeImage'];
                
                echo '
                <div class="card" style="margin-left: 78px; margin-top: 30px;" >
                <div class="title">'.$cake_name.'</div>
                <div class="desc"></div>
                <div class="img"><img class="img-m" src="images/'.$cake_image.'" alt=""></div>
                <div class="box">
                <div class="price" >Rs.'.$cake_price.'</div>
                  <button class="btnn"  ><a href="popularcake.php?productid='.$cakes['cakeId'].'">Detail </a><span class="bg"></span></button>

                  <form action="managecart.php"   method="post">
                    <input type="hidden" name="product" value="'.$cake_name.'">
                    <input type="hidden" name="price" value="'.$cake_price.'">
                    <input type="hidden" name="quantity" value="1" min="1">
                </form>
                 
              </div>
            </div>
                ';}
                ?>
            </div>      
            </div>  
    </div>
    </section>

    <section class="Gallery" id="Gallery-Id">
        <h1>Gallery</h1>
        <p></p>

        <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
           
            <div class="carousel-cell">
                <img src="images/Gallery1.jpg">
            </div>
           
            <div class="carousel-cell">
                <img src="images/Gallery2.jpg">
            </div>
           
            <div class="carousel-cell">
                <img src="images/Gallery3.jpg">
            </div>
           
            <div class="carousel-cell">
                <img src="images/Gallery4.jpg">
            </div>

            <div class="carousel-cell">
                <img src="images/Gallery5.jpg">
            </div>
        </div>
</section>

<section class="Feedback" id="Feedback">
    <h1>Feedback</h1>
    <p></p>
    <div class="feedback-background">
            <div class="center-heading">
            <p>Have feedback about our products or service<br> Please contact MD Taj Bakery directly</p>
            <a href="C:\Users\acs\Desktop\new\feedback.html">Send Feedback Now</a>   
            </div> 
    </div>
</section>


<section class="footer" id="footerid">
    <div class="container">
        <div class="row">
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.0069391556453!2d85.30090427447281!3d27.7170720250643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb192c9395e77d%3A0x9b34fdf7499df270!2sM%20D%20Taj%20bakery!5e0!3m2!1sen!2snp!4v1708716845114!5m2!1sen!2snp" width="400" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <hr class="w-50 mt-5 mx-auto text-dark">
    <div class="container last-footer" >
        <div class="row">
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

    
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
        integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/"
        crossorigin="anonymous"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
               // Show the initial form
               // document.getElementById("box").classList.add("show");
           });

           function bakery(event) {
               // event.preventDefault();
               // Toggle between Form 1 and Form 2
                document.getElementById("bakery").classList.toggle("show");
                document.getElementById("bakery").classList.toggle("hide");
                document.getElementById("cake").classList.toggle("show");
                document.getElementById("cake").classList.toggle("hide");
           }

           function cake(event) {
               // event.preventDefault();
               // Toggle between Form 2 and Form 1
               document.getElementById("cake").classList.toggle("show");
               document.getElementById("cake").classList.toggle("hide");
               document.getElementById("bakery").classList.toggle("show");
               document.getElementById("bakery").classList.toggle("hide");
           }
       </script>
 </body>
</html>


  </body>
</html>
