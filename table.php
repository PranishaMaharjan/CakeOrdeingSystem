<?php
  include 'database/connection.php';
//   $query = "CREATE TABLE user (
//     userId INT PRIMARY KEY AUTO_INCREMENT,
//     userName varchar(200),
//     userPassword varchar(200),
//     userEmail varchar(200),
//     userNumber varchar(200)
// )";
  $query = "CREATE TABLE user_orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    product varchar(200),
    price varchar(200),
    Quantity varchar(200),
    FOREIGN KEY (user_id) REFERENCES user(userId)
)";
//   $query = "CREATE TABLE order_manager (
//     order_id INT PRIMARY KEY AUTO_INCREMENT,
//     user_id INT,
//     Full_Name varchar(200),
//     Address varchar(200),
//     Product varchar(200),
//     Pound varchar(200),
//     Cake_Message varchar(200),
//     Pay_mode varchar(200),
//     Total INT,
//     FOREIGN KEY (user_id) REFERENCES user(userId)
// )";
if ($conn->query($query) === TRUE) {
    echo "User table created successfully\n";
} else {
    echo "Error creating user table: " . $conn->error . "\n";
}
?>