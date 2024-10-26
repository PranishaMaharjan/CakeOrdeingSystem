<?php if (isset($_SESSION['user_name'])): ?>
<?php echo $_SESSION['user_name']; ?>

<!-- admin -->
<?php elseif (isset($_SESSION['admin_name'])): ?>
<?php echo $_SESSION['admin_name']; ?>

<?php else: ?>

<?php endif;?>

<?php
include 'includes.php/header.php';
?>
<!------------- details ------------------->
<div class="product" id="product">
       <?php
        include 'database/connection.php';

        $cakeid = $_GET['productid'];
        $sql = "SELECT * FROM cake WHERE cakeId = '$cakeid'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $cake = mysqli_fetch_assoc($result);
            $cakeFlavor = $cake['cakeFlavour'];
            $cakePrice = $cake['cakePrice'];
            $cakeImage = $cake['cakeImage'];
            $cakeDescription = $cake['cakeDescription'];

            echo '<div class="div-img">
                <img src="images/'.$cakeImage.'" alt="" class="productImg" />
            </div>
            <div class="productDetails">
                <h1 class="productTitle">'.$cakeFlavor.'</h1>
                <h1 class="productPrice" data-price="'.$cakePrice.'">Rs. '.$cakePrice.' per pound</h1>

                <select name="weight" id="weightSelect" class="productPound">
                    <option value="1">1 pound</option>
                    <option value="2">2 pound</option>
                    <option value="3">3 pound</option>
                    <option value="4">4 pound</option>
                    <option value="5">5 pound</option>
                    <option value="6">6 pound</option>
                    <option value="7">7 pound</option>
                </select>

                <p class="productDesc">'.$cakeDescription.'</p>

                <form action="managecart.php" method="post">
                    <input type="hidden" name="product" value="'.$cakeFlavor.'">
                    <input type="hidden" id="priceInput" name="price" value="'.$cakePrice.'">
                    <input type="hidden" id="weightInput" name="weight" value="1">
                    <input type="hidden" name="quantity" value="1" min="1">
                    <label>Message:</label><br>
                    <textarea name="message" value="message" rows="4" cols="50"></textarea>
                    <button class="productButton" type="submit" name="submit">Add to cart<span class="bg"></span></button>
                </form>
            </div>';
        } else {
            echo "Cake not found.";
        }

        mysqli_close($conn);
    ?>
</div>
</section>
<script>
    const priceElement = document.querySelector(".productPrice");
    const poundSelect = document.querySelector(".productPound");
    const priceInput = document.getElementById("priceInput");
    const weightInput = document.getElementById("weightInput");

    let basePrice = parseInt(priceElement.dataset.price);

    poundSelect.addEventListener("change", function () {
        const selectedWeight = parseInt(poundSelect.value);
        const totalPrice = basePrice * selectedWeight;
        priceElement.textContent = 'Rs. ' + totalPrice + ' per pound';
        priceInput.value = totalPrice; // Update the hidden input with the new price
        weightInput.value = selectedWeight; // Update the hidden input with the selected weight
    });
</script>

</body>
</html>