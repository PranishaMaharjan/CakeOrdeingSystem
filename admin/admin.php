 <?php
 session_start();
  include '../database/connection.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../a.css" />
    <title>Admin Panel</title>

    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" type="text/css" href="css/a.css" />
    <!-- <link rel="stylesheet" type="text/css" href="admin.css" /> -->
  </head>
  <body>
    <div id="page_wrapper">
      <div id="sidenav" class="sidenav">
        <div class="sidenav_header">
          <div class="logo_section">
            <h3>Dashboard</h3>
          </div>

          <a href="#" class="sidenav_link">
            <i class="bx bx-home"></i>
            <h3>Home</h3>
          </a>

          <a href="add-cake.php" class="sidenav_link">
            <i class="bx bx-cake"></i>
            <h3>Add Cake Item</h3>
          </a>

          <a href="add-bakery.php" class="sidenav_link">
            <i class="bx bx-cookie"></i>
            <h3>Add Bakery Item</h3>
          </a>

          <a href="add-popularcake.php" class="sidenav_link">
            <i class="bx bx-cookie"></i>
            <h3>Add Popular Cakes</h3>
          </a>
          
          <a href="user.php" class="sidenav_link">
            <i class="bx bx-user"></i>
            <h3>Users</h3>
          </a>

          <a href="adminlogout.php" class="sidenav_link">
            <i class="bx bx-exit"></i>
            <h3>Logout</h3>
          </a>
        </div>
      </div>
<?php
$count = "Select * from cake ";
$c = mysqli_query($conn, $count);
$row= mysqli_num_rows($c);
$count1 = "Select * from bakeryitem ";
$c1 = mysqli_query($conn, $count1);
$row1= mysqli_num_rows($c1);
$count2 = "Select * from user ";
$c2 = mysqli_query($conn, $count2);
$row2= mysqli_num_rows($c2);

?>
      <main>
        <header>
          <section class="main">
            <div class="main-top">
              <h1>Main</h1>
              <i class="fas fa-user-cog"></i>
            </div>
            <div class="main-skills">
              <div class="card">
                <i class="bx bx-cake"></i>
                <h3>Total Cake Item</h3>
                <p><?php echo $row ?></p>
              </div>
              <div class="card">
                <i class="bx bx-cookie"></i>
                <h3>Total Bakery Item</h3>
                <p><?php echo $row1 ?></p>
              </div>
              <!-- <div class="card">
                <i class="bx bx-money"></i>
                <h3>Total Revenue</h3>
                <p>Join Over 2 million Students.</p>
              </div> -->
              <div class="card">
                <i class="bx bx-user"></i>
                <h3>Total users</h3>
                <p><?php echo $row2 ?></p>
              </div>
            </div>
          </section>
        </header>
      </main>
    </div>
  </body>
</html>

