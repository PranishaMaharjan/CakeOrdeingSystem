<?php
  session_start();
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
    $del="DELETE FROM order_manager WHERE order_id = '$delid' ";
    $delete_query = mysqli_query($conn, $del) or die('query failed');
    if($delete_query){
       header('location:order.php');
       $message[] = 'User has been removed';
    }else{
       header('location:order.php');
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
              <th scope="col">Address</th>
              <th scope="col">Product</th>
              <th scope="col">Pound</th>
              <th scope="col">Quantity</th>
              <th scope="col">Cake Message</th>
              <th scope="col">Pay_mode</th>
              <th scope="col">Total Price</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
        <?php
        //  $query="SELECT * FROM `order_manager`";
        //  $user_result=mysqli_query($conn,$query);
        //  while($user_fetch=mysqli_fetch_assoc($user_result))
           $select_products = mysqli_query($conn, "SELECT * FROM `order_manager`");
         if(mysqli_num_rows($select_products) > 0){
            while($row = mysqli_fetch_assoc($select_products))
         {
          ?>
          <tr>
         <td><?php echo $row['order_id'];?></td>
         <td><?php echo $row['Full_Name']; ?></td>
         <td><?php echo $row['Address']; ?></td>
         <td><?php echo $row['Product']; ?></td>
         <td><?php echo $row['Pound']; ?></td>
         <td><?php echo $row['Quantity']; ?></td>
         <td><?php echo $row['Cake_Message']; ?></td>
         <td><?php echo $row['Pay_mode']; ?></td>
         <td><?php echo $row['Total']; ?></td>
         <td>
            <a href="order.php?delete=<?php echo $row['order_id']; ?>" class="delete-btn" onclick="return confirm('Are your sure you want to delete this user?');"> <i class="bx bx-trash"></i> Delete </a>
            
         </td>
      </tr>
            <!-- <tr>
                <th>Item Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr> ";
            $order_query="SELECT * FROM `user_orders`";
            $order_result=mysqli_query($conn,$order_query);
            while($order_fetch=mysqli_fetch_assoc($order_result))
            {
                echo "
                    <tr>
                        <td>$order_fetch[product]</td>  
                        <td>$order_fetch[price]</td>
                        <td>$order_fetch[Quantity]</td>
                    </tr>
                "; -->
           <?php } ;
           }?>
            </table>            
            </td>
        </tr>
         
        
    </table>
        
        
</body>
</html>