<?php
session_Start();
 if($_SERVER['REQUEST_METHOD']='POST')
    {
        if(isset($_POST['submit']))
        {
          $message=$_POST['message'];
            if(isset($_SESSION['cart']))
            {
              $myitems=array_column($_SESSION['cart'],'product');
              if(in_array($_POST['product'],$myitems))
              {
                echo "<script>
			          alert('Item Already Added!');
				        window.location.href='cart.php';
                </script>";
              }
              else{
                // $count=count($_SESSION['cart']);
                // $_SESSION['cart'][$count]=array('product'=>$_POST['product'], 'price'=>$_POST['price'],'Quantity'=>1);
                $count = count($_SESSION['cart']);
                // Add the message along with other item details
                $_SESSION['cart'][$count] = array(
                    'product' => $_POST['product'],
                    'price' => $_POST['price'],
                    'weight'=>$_POST['weight'],
                    'Quantity' => 1,
                    'message' => $message // Include the message here
                );
                
                echo "<script>
			          alert('Item Added!');
				        window.location.href='cart.php';
				        </script>";
              }
            }
            else
            {
                $_SESSION['cart'][0]=array('product'=>$_POST['product'], 'price'=>$_POST['price'],'Quantity'=>1);
                echo "<script>
			          alert('Item Added!');
				        window.location.href='cart.php';
				        </script>";
            }
        }
        if(isset($_POST['Remove_Item']))
        {
          foreach($_SESSION['cart'] as $key=>$value)
          {
            if($value['product']==$_POST['product'])
            {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart']=array_values($_SESSION['cart']);
            echo "<script>
            alert('Item Removed!');
				        window.location.href='cart.php';
				        </script>";
            }
          }
        }
        if(isset($_POST['Mod_Quantity']))
        {
          foreach($_SESSION['cart'] as $key=>$value)
          {
            if($value['product']==$_POST['product'])
            {
              $_SESSION['cart'][$key]['Quantity']=$_POST['Mod_Quantity'];
            echo "<script>
				        window.location.href='cart.php';
				        </script>";
            }
          }
        }
        if(isset($_POST['cake_message']))
        {
          foreach($_SESSION['cart'] as $key=>$value)
          {
            if($value['product']==$_POST['product'])
            {
              $_SESSION['cart']=array_values($_SESSION['cart']);
            echo "<script>
				        window.location.href='cart.php';
				        </script>";
            }
          }
        }
      }
?>