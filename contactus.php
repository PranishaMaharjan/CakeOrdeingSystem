
<?php
    session_start();
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
    <!-- <link rel="icon" href="images/logo.png"> -->
    
    <script src="java.min.js"></script>
    <!-- <link rel="icon" href="logo.png"> -->
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/home.css">
    <!-- <link rel="stylesheet" href="css/account.css"> -->
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/flickity.css"> -->
    <!-- <link rel="stylesheet" href="css/media.css"> -->
    <link rel="stylesheet" href="css/contactus.css">
    
  </head>
  <body>

    <section class="Navbar-Menu" id="Navbar-Menu-Id" style="background-color:#E1D9D1">
        <div class="menu">
            <!-- <div class="leftside">
                <img src="images/logo.png" alt="logo.png">
            </div> -->
            <div class="rightside" id="rightside">
                <nav class="Icons">
                    <a href="home2.php" class="navicon">Home</a>
                    <a href="#Second-sec-id" class="navicon">About Us</a>
                    <a href="#menu-id" class="navicon">Menu</a>
                    <a href="#Feedback" class="navicon">Feedback</a>
                    <a href="#footerid" class="navicon">Contact</a>
                    <!-- ------------Login----------- -->
                <div class="drop">
                    <button class="dropbtn main-nav-link"><?php if (isset($_SESSION['user_name'])): ?>
                        <a href="#"><?php echo $_SESSION['user_name']; ?></a>
                        <!-- admin -->
                        <?php elseif (isset($_SESSION['admin_name'])): ?>
                        <a href="./admin/admin.php"><?php echo $_SESSION['admin_name']; ?></a>
                    </button>
                    <div class="dropdown-content">
                        <a href="logout.php">logout</a>
                    </div>
                </div>
                <?php else: ?>
                <?php endif;?>

<!-- --------------CART------------- -->
                     <!-- <a href="cart.php">
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
                    </a> -->
                    </nav>
            </div>
        </div>
        
        <!-- accounts -->
        <section id="accounts" style="background-color:#E1D9D1">
            <div class="account_page">
                <div class="container">
                <div class="contact_box">
                    <div class="contact_container">
    <main>
		<section>
			<h2>Contact Us</h2>
			<p>Fill out the form below to send us a message:</p>
			<form action="#" method="POST">
				<label for="name">Name:</label>
				<input type="text" id="name" name="name" required>

				<label for="email">Email:</label>
				<input type="email" id="email" name="email" required>

				<label for="message">Message:</label>
        <textarea id="message" name="message" rows="6" required></textarea>

				<button type="submit">Submit</button>
			</form>
		</section>
        


		<section>
			<address>
    <p>Visit us at:</p>
    <p>123 Main Street</p>
    <p>Dubarmarg, KTM</p>
    <p>Phone: 555-555-5555</p>
    <p>Email: info@shoewebsite.com</p>
  </address>
  
  <div class="map-wrapper">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3010.3585822378816!2d-74.00602069042887!3d40.7127759852366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c255f49c5e82a5%3A0x5a5a5a5a5a5a5a5a!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1596217790701!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div>
		</section>
    

	</main> -->
    <!-- footer -->
    <!-- <section class="footer" id="footerid">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12 mx-auto">
                <h3>About Us</h3>
                <p>We make delicious, hygienic and good quality of bakery items.</p>
                <hr class="w-25 mx-auto text-dark">
                <a href="https://www.facebook.com/" target="blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com" target="blank"><i class="fab fa-twitter"></i></a>
                <a href="https://gmail.google.com" target="blank"><i class="fab fa-google-plus-g"></i></a>
                <a href="https://www.pinterest.com/" target="blank"><i class="fab fa-pinterest"></i></a>
                <a href="https://instagram.com/" target="blank"><i class="fab fa-instagram"></i></a>
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
    <div class="container last-footer" >
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12 mx-auto Copyright">
                <h4 id="last-logo">MD Taj Bakery</h4>
            </div>
            <div class="col-lg-4 col-md-4 col-12 mx-auto Copyright">
                <h4><span id="Name">MD Taj Bakery</span> © Privacy Policy</h4>
            </div>
        </div>
    </div>
</section>
</section>
    <script
      type="text/javascript"
      src="//code.jquery.com/jquery-1.11.0.min.js"
    ></script>
    <script
      type="text/javascript"
      src="//code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    
</body>
</html>