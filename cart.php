<?php
     include'includes.php/header.php';
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/144a91ca19.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/brands.css" />
    <link rel="stylesheet" href="css/cart.css" />
    <!-- <link rel="stylesheet" href="css/account.css" /> -->

    <title>Cart</title>
  </head>
  <body>
       
    </header>
    <div class="head1" style="background-color:#E1D9D1" >
        <h1>CART</h1>
    </div>
<div class="container">
  <div class="items">
    
  <table class="table">
  <thead class="text-center">
    <tr>
      <th scope="col">Serial No.</th>
      <th scope="col">Item Name</th>
      <th scope="col">Pound</th>
      <th scope="col">Cake Message</th>
      <th scope="col">Item Price</th>
      <th scope="col">Quantity</th>
      

      
      <th scope="col">Total</th>
      <th></th>
    </tr>
  </thead>
  <tbody class="text-center">
    <?php
    $sr=0;
    $total=0;
    if(isset($_SESSION['cart']))
    {
    foreach($_SESSION['cart'] as $key => $value)
    {
      $sr=$key+1;
      echo "<tr>
        <td>$sr</td>
        <td>$value[product]</td>
        <td>$value[weight]</td>
        <td>$value[message]</td>
        <td>$value[price]<input type='hidden' class='iprice' value='$value[price]'</td>
        <form action='managecart.php' method='POST'>
        <td><input class='text-center iquantity' name='Mod_Quantity' onchange='this.form.submit();' type='number' value='$value[Quantity]' min='1' max='10'></td>
        <input type='hidden' name='product' value='$value[product]'>
        </form>


        

        <td class='itotal'></td>
        <td>
        <form action='managecart.php' method='POST'>
        <button name='Remove_Item' class='btn btn1'>REMOVE</button>
        <input type='hidden' name='product' value='$value[product]'>
        </form>
        </td>
        
      </tr>";
    }

    // Display the grand total outside the loop
        echo "<tr>
                <td colspan='5'></td>
                <td colspan='1' class='grandtotal'>
                    <h3>Grand Total:</h3>
                    <h4 class='text-right' id='gtotal'></h4>
                </td>
            </tr>";
  }
    ?>
  </tbody>
  </table>
  <!-- <div class="grandtotal">
  <h3>Grand Total:</h3>
    <h4 class="text-right" id="gtotal"></h4>
    </div> -->
       </div>


  <div class="total">
    
    <?php 
     if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
     {
    ?>
    <form action="place_order.php" method="POST" style="height: 300px; width: 300px; ">
      <label>Name:</label>
      <input type="text" name="fname" value="<?php echo $_SESSION['user_name'];?>" disabled><br/>
      <!-- <label>Phone:</label>
      <input type="number" name="phone" required><br/> -->
      <label>Address:</label>
      <input type="text" name="address" required><br/>
      <input type="submit" class="btn btn2" name="Cash on delivery" value="cash on delivery"><br>
      <!-- <input type="radio" name="khalti" value="Khalti"> <a href="khalti.php">Khalti</a><br> -->
      <!-- <button class="btn btn2" name="CashOnDelivery">Cash on delivery</button> -->
      <button class="btn btn2" name="khalti">Online Payment</button>
      <!-- <input type="submit">Khalti -->
    </form>
    <!-- <button class="btn btn2" name="purchase"><a href="khalti.php">Khalti</a></button> -->
    <?php
     }
    ?>
  </div>
</div>

<script>
  var gt=0;
  var iprice=document.getElementsByClassName('iprice');
  var iquantity=document.getElementsByClassName('iquantity');
  var itotal=document.getElementsByClassName('itotal');
  var gtotal=document.getElementById('gtotal');

  function subTotal()
  {
    gt=0;
    for(i=0;i<iprice.length;i++)
    {
      itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
      gt=gt+(iprice[i].value)*(iquantity[i].value);
    }
    gtotal.innerText=gt;
  } 
  subTotal();
  </script>
</body>
</html>