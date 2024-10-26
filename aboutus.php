<?php
  session_start();
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/144a91ca19.js"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      type="text/css"
      href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
    />
    <script
      type="text/javascript"
      src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>

    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/all.css" />
    <link rel="stylesheet" href="css/flickity.css" />
    <link rel="stylesheet" href="css/home.css" />
    <link rel="stylesheet" href="css/media.css" />

    <title>Cake Ordering System</title>
  </head>
  <body>
    <header class="nav-section">
      

      <div class="nav-icon">
          <?php if (isset($_SESSION['user_name'])): ?>
        <a href="profile.php"><button class="b-tn"><?php echo $_SESSION['user_name']; ?></button></a>
        <!-- admin -->
        <?php elseif (isset($_SESSION['admin_name'])): ?>
        <a href="./admin/admin.php"><button class="b-tn"><?php echo $_SESSION['admin_name']; ?></button></a>
        <?php else: ?>

        <a href="loginup.php">
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
      </div>
    </header>
	<main>
    <div class="description">
      <section>
        <h2>Our Story</h2>
        <p>We are a family-owned and operated shoe store with over 30 years of experience in the industry. Our goal is to provide our customers with high-quality footwear at affordable prices, while offering exceptional customer service. SimplyShoes is one of the most popular online shoe retailers in the Nepal, with a reputation for excellent customer service and a commitment to quality products. The company has continued to innovate and expand its offerings, and is a go-to destination for customers looking for stylish and comfortable shoes at affordable prices.</p>
		  </section>
      <img src="./images/about.png" alt="">
    </div>
		<section class="brand">
			<h2>Our Brands</h2>
			<p>We carry a wide selection of brands, including:</p>
			<!-- *******partners/brands******* -->
    <section class="brands">
      <div class="brands_container">
        <div class="brands_box">
          <img class="adidas" src="./images/nike.png" alt="" />
        </div>
        <div class="brands_box">
          <img class="gucci" src="./images/vansoff.png" alt="" />
        </div>
        <div class="brands_box">
          <img class="levis" src="./images/conv.png" alt="" />
        </div>
        <div class="brands_box">
          <img class="polo" src="polo.png" alt="" />
        </div>
      </div>
    </section>
		</section>
		
		<section class="team">
  <h2>Our Team</h2>
  <p>Meet the dedicated professionals who make our store great:</p>
  <ul class="team-list" type="none">
    <li>
      <img src="./images/man1.png" alt="John Smith" class="team-member-img">
      <h3>John Smith</h3>
      <p>Designer</p>
    </li>
    <li>
      <img src="./images/lady.png" alt="Jane Doe" class="team-member-img">
      <h3>Jane Doe</h3>
      <p>Manager</p>
    </li>
    <li>
      <img src="./images/man.png" alt="Bob Johnson" class="team-member-img">
      <h3>Bob Johnson</h3>
      <p>Sales Associate</p>
    </li>
  </ul>
</section>
	</main>
	<footer class="footer">
		
    <!-- footer -->
    
      <div class="col">
        <h4>Contact</h4>
        <p><strong>Address: </strong> Dubarmarg, Kathmandu</p>
        <p><strong>Phone:</strong> +977 98XXXXXXXX</p>
        <p><strong>Hours:</strong> 10:00 - 19:00, Sun - Fri</p>

        <div class="follow">
          <h4>Follow Us</h4>
          <div class="footer-icon">
            <i class="fa-brands fa-facebook-f"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-instagram"></i>
            <i class="fa-brands fa-youtube"></i>
          </div>
        </div>
      </div>

      <div class="col links">
        <h4>About</h4>
        <a href="#">About Us</a>
        <a href="#">Contact Us</a>
      </div>

      <div class="col links">
        <h4>My Accounts</h4>
        <a href="#">Sign In</a>
        <a href="#">View Cart</a>
        <a href="#">Help</a>
      </div>

      <div class="col payment-partners">
        <h4>Payment Partners</h4>
        <p>Secured Payment Gateways</p>
        <div>
          <img src="images/esewa.png" alt="" />
          <img src="images/khalti.png" alt="" />
        </div>
      </div>
    
	</footer>
</body>
</html>