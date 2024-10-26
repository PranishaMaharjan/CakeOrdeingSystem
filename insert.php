<?php

    include 'database/connection.php';

    // Path to your image file
    $imagePath = 'images/BlackForestCake.jpg';
    
    // Base64 encode the image data
    $imageData = base64_encode(file_get_contents($imagePath));

    // Insert the image data into the database
    $query = "INSERT INTO cake VALUES ('1','black forest','1','650','$imageData','chocolate')";
    $result = $conn->query($query);

    if ($result) {
        echo "inserted successfully.";
    } else {
        echo "Error inserting : " . $conn->error;
    }
?>

