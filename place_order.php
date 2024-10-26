<?php
session_start();
include('database/connection.php');

if (isset($_POST['khalti'])) {
    $name = $_SESSION['user_name'];
    $address = $_POST['address'];
    $pay_mode = "not paid";
    $user_id = $_SESSION['user_id'];
    $grandTotal = 0;

    foreach ($_SESSION['cart'] as $key => $values) {
        $grandTotal += $values['price'] * $values['Quantity'];
    }

    $cakeMessages = array_column($_SESSION['cart'], 'message');
    $cakeMessage = implode(", ", $cakeMessages);
    $weights = array_column($_SESSION['cart'], 'weight');
    $quantity = array_sum(array_column($_SESSION['cart'], 'Quantity')); // Summing the quantities
    $weight = implode(", ", $weights);
    $products = array_column($_SESSION['cart'], 'product');
    $product = implode(", ", $products);

    $stmt = $conn->prepare("INSERT INTO `order_manager` (`user_id`, `Full_Name`, `Address`, `Product`, `Pound`, `Quantity`, `Cake_Message`, `Pay_mode`, `Total`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('issssissd', $user_id, $name, $address, $product, $weight, $quantity, $cakeMessage, $pay_mode, $grandTotal);

    if ($stmt->execute()) {
        $order_id = $stmt->insert_id;

        foreach ($_SESSION['cart'] as $key => $values) {
            $product = $values['product'];
            $price = $values['price'];
            $quantity = $values['Quantity'];

            $stmt1 = $conn->prepare("INSERT INTO `user_orders` (`Order_id`, `user_id`, `product`, `price`, `Quantity`) VALUES (?, ?, ?, ?, ?)");
            $stmt1->bind_param("iisdi", $order_id, $user_id, $product, $price, $quantity);
            $stmt1->execute();
        }

        $_SESSION['order_id'] = $order_id;
        header("Location:khalti.php");
        exit;
    } else {
        header('location:home2.php');
        exit;
    }

    $stmt->close();
} else {
    $fullname = $_SESSION['user_name'];
    $address = $_POST['address'];
    $payMode = "Cash on delivery";
    $user_id = $_SESSION['user_id'];
    $grandTotal = 0;

    foreach ($_SESSION['cart'] as $key => $values) {
        $grandTotal += $values['price'] * $values['Quantity'];
    }

    $cakeMessages = array_column($_SESSION['cart'], 'message');
    $cakeMessage = implode(", ", $cakeMessages);
    $weights = array_column($_SESSION['cart'], 'weight');
    $weight = implode(", ", $weights);
    $quantity = array_sum(array_column($_SESSION['cart'], 'Quantity')); // Summing the quantities
    $products = array_column($_SESSION['cart'], 'product');
    $product = implode(", ", $products);

    $query1 = "INSERT INTO `order_manager` (`user_id`, `Full_Name`, `Address`, `Product`, `Pound`, `Quantity`, `Cake_Message`, `Pay_mode`, `Total`) VALUES ('$user_id', '$fullname', '$address', '$product', '$weight', '$quantity', '$cakeMessage', '$payMode', '$grandTotal')";

    if (mysqli_query($conn, $query1)) {
        $_SESSION['order_id'] = mysqli_insert_id($conn);

        $query2 = "INSERT INTO `user_orders` (`Order_id`, `user_id`, `product`, `price`, `Quantity`) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query2);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "iisdi", $_SESSION['order_id'], $user_id, $product, $price, $Quantity);

            foreach ($_SESSION['cart'] as $key => $values) {
                $product = $values['product'];
                $price = $values['price'];
                $Quantity = $values['Quantity'];
                mysqli_stmt_execute($stmt);
            }

            unset($_SESSION['cart']);
            echo "<script>
                alert('Order placed');
                window.location.href='home.php';
            </script>";
        } else {
            echo "<script>
                alert('SQL query prepare error');
                window.location.href='home.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('SQL error');
            window.location.href='home.php';
        </script>";
    }
}
?>

