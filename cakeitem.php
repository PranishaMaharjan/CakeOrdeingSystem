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
  $sql = "SELECT * FROM cake";
  $result = mysqli_query($conn, $sql);

  // Loop through the room data and create the cards
  while ($cakes = mysqli_fetch_assoc($result)) {
    $cake_id = $cakes['cakeId'];
    $cake_name = $cakes['cakeFlavour'];
    $cake_price = $cakes['cakePrice'];
    $cake_image = $cakes['cakeImage'];
      
 
     echo '
            <div class="card">
              <div class="title">'.$cake_name.'</div>
              <div class="desc"></div>
              <div class="img"><img class="img-m" src="images/'.$cake_image.'" alt=""></div>
              <div class="box">
                <div class="price" >Rs.'.$cake_price.' per pound</div>
                  <button class="btnn"><a href="detail-cake.php?productid='.$cakes['cakeId'].'">Detail </a><span class="bg"></span></button>

                  <form action="managecart.php"   method="post">
                    <input type="hidden" name="product" value="'.$cake_name.'">
                    <input type="hidden" name="price" value="'.$cake_price.'">
                    <input type="hidden" name="quantity" value="1" min="1">
                    
                </form>
                 
              </div>
            </div>';
     }?>
    </div>
    <!-- end -->
    
    </section>
    </section>

    <!-- /for add button -->
    <!-- <button class="btnn" type="submit"name="submit">Add<span class="bg"></span></button> -->
</body>
</html>