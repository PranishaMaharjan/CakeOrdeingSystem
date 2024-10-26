<?php
session_start();

// Connect to the database
include 'database/connection.php';

// Check if the form has been submitted
if (isset($_POST['loginbtn'])) {
    // Get the form data

    $userName = $_POST['name'];
    $userPassword = $_POST['password'];
    $result1 = mysqli_query($conn, "SELECT * FROM admin WHERE username='$userName' AND password='$userPassword'");

    $admin = mysqli_fetch_assoc($result1);
    $row= mysqli_num_rows($result1);
    if ($row > 0) {
        $_SESSION['admin_name']= $admin['username'];
        header('location:./admin/admin.php');
    }
    else {
        // Build the select statement
        $sql = "SELECT * FROM user WHERE userName = '$userName'";

     // Execute the statement
     $result = mysqli_query($conn, $sql);
     
     // Check for errors
     if (!$result) {
         die("Query failed: " . mysqli_error($conn));
     }

     // Fetch the user data
     $user = mysqli_fetch_assoc($result);

     // Check if the user exists
     if ($user&& md5($userPassword) === $user['userPassword']) {
        $phone = $user['userNumber'];
         // Log the user in
         $_SESSION['user_id'] = $user['userId'];
         $_SESSION['user_name'] = $user['userName'];
        $_SESSION['phone'] = $phone;
        $_SESSION['user_email'] = $user['userEmail'];
         header("Location:home.php");
         exit;
     } else {
         // Show an error message
         echo "<script>
                    alert('Incorrect username or password.');
                      window.location.href='login.php';
                    </script>";
     }
 }
 // Close the connection
mysqli_close($conn);
}