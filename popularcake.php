<?php if (isset($_SESSION['user_name'])): ?>
<?php echo $_SESSION['user_name']; ?>
                        
<!-- admin -->
<?php elseif (isset($_SESSION['admin_name'])): ?>
<?php echo $_SESSION['admin_name']; ?>

<?php else: ?>
    
<?php endif;?>


<?php
include'includes.php/header.php';?>
<!------------- details ------------------->
<div class="product" id="product">
       <?php
        include 'database/connection.php';

    // Check if 'cakeId' is set in the URL
        // Retrieve 'cakeId' value
        // if (isset($_GET['cakeid'])) {
        $cakeid = $_GET['productid'];
        // Fetch cake details from the database based on 'cakeId'
        $sql = "SELECT * FROM popularcake WHERE cakeId = '$cakeid'";
        $result = mysqli_query($conn, $sql);

        // Check if a cake with the specified 'cakeId' exists
        if (mysqli_num_rows($result) == 1) {
            // Fetch cake details
            $cake = mysqli_fetch_assoc($result);
            $cakeFlavor = $cake['cakeFlavour'];
            $cakeQuantity = $cake['cakeQuantity'];
            $cakePrice = $cake['cakePrice'];
            $cakeImage = $cake['cakeImage'];
            $cakeDescription = $cake['cakeDescription'];

            echo '<div class="div-img">
                <img src="images/'.$cakeImage.'" alt="" class="productImg" />
            </div>
            <div class="productDetails">
                <h1 class="productTitle">'.$cakeFlavor.'</h1>
                <h1 class="productPrice">Rs. '.$cakePrice.'</h1>

                <select name="" id="" class="productPound">
                    <option value="0">1 pound</option>
                    <option value="100">2 pound</option>
                    <option value="200">3 pound</option>
                </select>

                <p class="productDesc">'.$cakeDescription.'</p>
                
                <form action="managecart.php"   method="post">
                    <input type="hidden" name="product" value="'.$cakeFlavor.'">
                    <input type="hidden" name="price" value="'.$cakePrice.'">
                    <input type="hidden" name="quantity" value="1" min="1">
                    <button class="productButton" type="submit"name="submit">Add to cart<span class="bg"></span></button>
                </form>
            </div>';
        } else {
            // Handle the case where no cake is found with the specified 'cakeId'
            echo "Cake not found.";
        }
    // } else {
    //     // Handle the case where 'cakeId' is not set in the URL
    //     echo "Cake Flavour is not set.";
    // }

    // Close the database connection
    mysqli_close($conn);
        // }
    ?>

    </div>
    </section>
     <script>
    const price = document.querySelector(".productPrice");
    console.log(price);
    const pound = document.querySelector(".productPound");
    console.log(pound);

    let curPrice = parseInt(price.textContent);
    pound.addEventListener("change", function () {
    const poundValue = parseInt(pound.value);

    price.textContent = curPrice + poundValue;
    });
</script>

</body>
</html>