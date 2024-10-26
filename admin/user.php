<?php
  include '../database/connection.php';
  session_start();
  
?>
<!DOCTYPE html>
<html>
  <head>
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

          <a href="admin.php" class="sidenav_link">
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
          <a href="order.php" class="sidenav_link">
            <i class="bx bx-user"></i>
            <h3>Orders</h3>
          </a>

          <a href="adminlogout.php" class="sidenav_link">
            <i class="bx bx-exit"></i>
            <h3>Logout</h3>
          </a>
        </div>
      </div>

      <?php
      // delete 
  if(isset($_GET['delete'])){
    $delid = $_GET['delete'];
    $del="DELETE FROM user WHERE userName = '$delid' ";
    $delete_query = mysqli_query($conn, $del) or die('query failed');
    if($delete_query){
       header('location:user.php');
       $message[] = 'User has been removed';
    }else{
       header('location:user.php');
       $message[] = 'User could not be removed';
    };
 };
      ?>
      <main class="table">
        <table>
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone Number</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
         
         $select_products = mysqli_query($conn, "SELECT userId, userName, userEmail, userNumber FROM user");
         if(mysqli_num_rows($select_products) > 0){
            while($row = mysqli_fetch_assoc($select_products)){
      ?>

      <tr>
         <td><?php echo $row['userId'];?></td>
         <td><?php echo $row['userName']; ?></td>
         <td><?php echo $row['userEmail']; ?></td>
         <td><?php echo $row['userNumber']; ?></td>
         <td>
            <a href="user.php?delete=<?php echo $row['userName']; ?>" class="delete-btn" onclick="return confirm('Are your sure you want to delete this user?');"> <i class="bx bx-trash"></i> Delete </a>
            
         </td>
      </tr>
       <?php
         };    
         }else{
            echo "<div class='empty'>No Users!</div>";
         };
      ?>
          </tbody>
        </table>
      </main>
    </div>
  </body>
</html>
