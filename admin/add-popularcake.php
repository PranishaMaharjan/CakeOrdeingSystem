<?php
  include '../database/connection.php';
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
      <?php
      if(isset($message)){
        foreach($message as $message){
           echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = none;"></i> </div>';
        };
     };
     ?>
      <!-- Form start -->
      <div class="main-box">
        <div class="form-box">
          <div class="login-container" id="login">
            <h3 class="h-item">Add Popular Cake</h3>
            <form action="" enctype="multipart/form-data" method="POST">
              <div class="input-box">
                <input type="text" class="input-field" name="cake_name" placeholder="Flavour" />
              </div>
              <div class="input-box">
                <input type="text" class="input-field" name="price" placeholder="Price" />
              </div>
              <div class="input-box">
                <input type="text" class="input-field" name="quantity" placeholder="Quantity" />
              </div>
              <div class="input-box">
              <input type="file" name="cake_image" class="input-field" />
            </div>
              <div class="input-box">
                <input
                  type="text"
                  class="input-field"
                  name="description"
                  placeholder="Description"
                />
              </div>
              <div class="input-box">
                <input type="submit" class="submit" name="adminsubmit" value=" Add" />
              </div>
            </form>

            <?php


if (isset($_POST['adminsubmit'])) {
$cake_name = $_POST['cake_name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$desc = $_POST['description'];
// Check if the "image" key is set in the $_FILES array
    if (isset($_FILES['cake_image']) && !empty($_FILES['cake_image']['name'])) {
        $image = $_FILES['cake_image']['name'];
        $target = "../images/" . basename($image);
       if ($_FILES['cake_image']['error'] > 0) {
        echo 'File Upload Error: ' . $_FILES['cake_image']['error'];
    } else{
        $sql = "INSERT INTO popularcake (cakeFlavour, cakeQuantity, cakePrice, cakeImage, cakeDescription)
            VALUES ('$cake_name', '$quantity', '$price' ,'$image', '$desc')";
        mysqli_query($conn, $sql);

        if (move_uploaded_file($_FILES['cake_image']['tmp_name'], $target)) {
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
$del="DELETE FROM popularcake WHERE cakeFlavour = '$delid' ";
$delete_query = mysqli_query($conn, $del) or die('query failed');
if($delete_query){
header('location:admin.php');
$message[] = 'product has been deleted';
}else{
header('location:admin.php');
$message[] = 'product could not be deleted';
};
};
?>

          </div>
        </div>
        <div class="cake-table">
          <table>
            <thead>
              <tr>
                <th scope="col" width="200px">Image</th>
                <th scope="col" width="150px">Name</th>
                <th scope="col" width="50px">Qty</th>
                <th scope="col" width="80px">Price</th>
                <th scope="col" width="100px">Action</th>
              </tr>
            </thead>
            <tbody>

            <?php

$select_products = mysqli_query($conn, "SELECT * FROM popularcake");
if(mysqli_num_rows($select_products) > 0){
 while($row = mysqli_fetch_assoc($select_products)){
?>

<tr>
<td><?php echo'<img src="../images/'.$row['cakeImage'].'" height="100px" alt=""></td>';?>
<td><?php echo $row['cakeFlavour']; ?></td>
<td><?php echo $row['cakeQuantity']; ?></td>
<td>Rs.<?php echo $row['cakePrice']; ?>/-</td>
<td>
 <a href="add-popularcake.php?delete=<?php echo $row['cakeFlavour']; ?>" class="delete-btn" onclick="return confirm('Are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
 
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
