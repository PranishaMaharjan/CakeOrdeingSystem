<?php
// session_start();

$serverName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "cos";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed : " . mysqli_connect_error());
}
?>