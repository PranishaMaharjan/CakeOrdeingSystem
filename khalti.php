   
<?php
    session_start();
// echo "Session contents in khalti.php with order_id:<br>";
    include('database/connection.php');

    // Retrieve user details from the session
    $user_id = $_SESSION['user_id'];

    // Fetch user details from the database
    $res = mysqli_query($conn, "SELECT * FROM user WHERE userId='$user_id'") or die('Query failed');
    if(mysqli_num_rows($res) > 0){
        while($rows = mysqli_fetch_assoc($res)){
            $fullname = $rows['userName'];
            $email = $rows['userEmail'];
            // $phone = $rows['phone'];
            // Adjust other user details if necessary
        }
    }

    // Check if order_id session variable is set
    if(isset($_SESSION['order_id'])) {
        
        $order_id = $_SESSION['order_id'];

        $stmt = $conn->prepare("SELECT SUM(price * Quantity) AS total_amount FROM user_orders WHERE Order_id = ?");
        $stmt->bind_param('i', $order_id);
        $stmt->execute();
        $order_details = $stmt->get_result();
      
        // Check if the query returned any result
        if($order_details->num_rows > 0) {
            // Fetch the total amount from the result
            $row = $order_details->fetch_assoc();
            $grand_total = $row['total_amount'];
            echo "Total amount fetched successfully: $grand_total";
            // Convert amount to paisa (multiply by 100)
            $grand_total*=100 ;
        } else {
            // Set default grand total to 0 if no result found
            echo("NO result found");
            $grand_total = 0;
        }

        // Prepare data for Khalti payment API
        echo($grand_total);
        $data = array(
            // "return_url" => "http://localhost/Bhangro%20Latest/cart.php",
            "return_url" => "http://localhost/cakeOrderingSystem/home.php",
            "website_url" => "http://localhost/cakeOrderingSystem/home.php",
            "amount" => 1000,
            // "amount" => 1000,
            "purchase_order_id" => "Order01",
            "purchase_order_name" => "Test Order",
            "customer_info" => array(
                "name" => $fullname,
                "email" => $email,
                // "phone" => $phone
            ),
  
        );

        $post_data = json_encode($data);

        // Initialize cURL session for Khalti payment API
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/initiate/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $post_data,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Key 372d240806c54587af927b6da29b24e9', // Replace with your Khalti secret key
                'Content-Type: application/json',
            ),
        ));

        // Execute cURL request
        $response = curl_exec($curl);

        // Handle response from Khalti payment API
        if ($response === false) {
            echo curl_error($curl);
        } else {
            $response_array = json_decode($response, true);
            if (!empty($response_array['payment_url'])) {
                // Redirect to Khalti payment page
                header("Location: " . $response_array['payment_url']);
                exit;
            } else {
                // Handle case where payment_url is empty
                echo "Payment initiation failed or payment URL is empty.";
            }
        }

        // Close cURL session
        curl_close($curl);

        // Output Khalti payment API response
        echo $response;
    } else {
        die('Order ID not provided.');
    }
    ?>