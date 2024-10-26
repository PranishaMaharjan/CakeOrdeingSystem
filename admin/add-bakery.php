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
    <link rel="stylesheet" type="text/css" href="css/form.css" />
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

          <a href="adminlogout.php" class="sidenav_link">
            <i class="bx bx-exit"></i>
            <h3>Logout</h3>
          </a>
        </div>
      </div>
      <!-- Form start -->
      
      <div class="main-box">
        <div class="form-box">
          <div class="login-container" id="login">
            <h3 class="h-item">Add Bakery Item</h3>

            <form method="POST" action="" enctype="multipart/form-data" >
            <div class="input-box">
              <input type="text" name="bakery_name" class="input-field" placeholder="Bakery Item" />
            </div>
            <div class="input-box">
              <input type="text" name="bakery_price" class="input-field" placeholder="Price" />
            </div>
            <div class="input-box">
              <input type="file" name="bakery_image" class="input-field" />
            </div>
            
            <div class="input-box">
              <input type="submit" name="adminsubmit" class="submit" value="Add" />
            </div>
            </form>
          </div>
        </div>
        <?php
  

  if (isset($_POST['adminsubmit'])) {
    $bakery_name = $_POST['bakery_name'];
    $price = $_POST['bakery_price'];
    // $quantity = $_POST['quantity'];
   // Check if the "image" key is set in the $_FILES array
   if (isset($_FILES['bakery_image']) && !empty($_FILES['bakery_image']['name'])) {
    $image = $_FILES['bakery_image']['name'];
    $target = "../images/" . basename($image);
   if ($_FILES['bakery_image']['error'] > 0) {
    echo 'File Upload Error: ' . $_FILES['bakery_image']['error'];
} else{
    $sql = "INSERT INTO bakeryitem (bakeryitemName, bakeryitemPrice, bakeryitemImage)
        VALUES ('$bakery_name', '$price', '$image')";
    mysqli_query($conn, $sql);

    if (move_uploaded_file($_FILES['bakery_image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload";
    }
  }
} else {
    // Handle the case where "image" is not set or empty
    echo "Image not selected.";
}
  }

  // delete 
  if(isset($_GET['delete'])){
   $delid = $_GET['delete'];
   $del="DELETE FROM bakeryitem WHERE bakeryitemName = '$delid' ";
   $delete_query = mysqli_query($conn, $del) or die('query failed');
   if($delete_query){
      header('location:bakery.php');
      $message[] = 'product has been deleted';
   }else{
      header('location:bakery.php');
      $message[] = 'product could not be deleted';
   };
};
  ?>
        <div class="cake-table">
          <table>
            <thead>
              <tr>
                
                <th scope="col" width="200px">Image</th>
                <th scope="col" width="200px">Name</th>
                <th scope="col" width="80px">Price</th>
                <th scope="col" width="100px">Action</th>
          
              </tr>
            </thead>
            <tbody>
         <?php
         
            $select_products = mysqli_query($conn, "SELECT * FROM bakeryitem");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><?php echo'<img src="../images/'.$row['bakeryitemImage'].'" height="100px" alt=""></td>';?>
            <td><?php echo $row['bakeryitemName']; ?></td>
            <td>Rs. <?php echo $row['bakeryitemPrice']; ?>/-</td>
            <td>
               <a href="add-bakery.php?delete=<?php echo $row['bakeryitemName']; ?>" class="delete-btn" onclick="return confirm('Are your sure you want to delete this?');"> <i class="bx bx-trash"></i> Delete </a>
               
            </td>
         </tr>
          <?php
            };    
            }else{
               echo "<div class='empty'>no product added</div>";
            };
         ?>
         </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
