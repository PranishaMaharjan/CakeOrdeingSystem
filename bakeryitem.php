<?php
    include'includes.php/header.php';
?>
        
    
    
<!------------- details ------------------->
    <section class="detail" style="background-color:#E1D9D1" >
      <div class="trending-container">
        
     <?php
  // Connect to the database
  include 'database/connection.php';

  // Get the room data from the database
  $sql = "SELECT * FROM bakeryitem";
  $result = mysqli_query($conn, $sql);

  // Loop through the room data and create the cards
  while ($bakery = mysqli_fetch_assoc($result)) {
    $bakery_id = $bakery['id'];
    $bakery_name = $bakery['bakeryitemName'];
    $bakery_price = $bakery['bakeryitemPrice'];
    $bakery_image = $bakery['bakeryitemImage'];
      
 
     echo '
            <div class="card">
              <div class="title">'.$bakery_name.'</div>
              <div class="desc"></div>
              <div class="img"><img class="img-m" src="images/'.$bakery_image.'" alt=""></div>
              <div class="box">
                <div class="price" >Rs. '.$bakery_price.'</div>
                

                  <form action="managecart.php"   method="post">
                    <input type="hidden" name="product" value="'.$bakery_name.'">
                    <input type="hidden" name="price" value="'.$bakery_price.'">
                    <input type="hidden" name="quantity" value="1" min="1">
                    <button class="btnn" type="submit"name="submit">Add<span class="bg"></span></button>
                </form>
                 
              </div>
            </div>';
     }?>
    </div>
    <!-- end -->
    
    </section>
    </section>
</body>
</html>