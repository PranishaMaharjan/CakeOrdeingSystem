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
    <link rel="icon" href="images/logo.png">
    
    <script src="java.min.js"></script>
    <!-- <link rel="icon" href="logo.png"> -->
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/brands.css">
    <link rel="stylesheet" href="css/flickity.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="css/detail.css">
    <!-- <link rel="stylesheet" href="css/contactus.css"> -->
    
</head>
<body>
<!-- style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)),
    url(images/back.jpg);  -->
<section class="Navbar-Menu" id="Navbar-Menu-Id" style="background-color:#E1D9D1" >
<!--  -->
        <div class="menu">
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
                    <div class="drop">
                    <button class="dropbtn main-nav-link">
                       <a href="#" class="navicon">MENU</a>
                    </button>
                    <div class="dropdown-contentt">
                        <a href="cakeitem.php">Cake Item</a><br>
                        <a href="bakeryitem.php">Bakery Item</a>
                    </div>
                    </div>
                    <a href="#Feedback" class="navicon">Feedback</a>
                    <a href="contactus.php" class="navicon">Contact</a>
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
        </div>