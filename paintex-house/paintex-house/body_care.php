
<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';

// Define currency symbol
$currency = '৳';  // Change this if you want a different currency symbol

// Get Body Care category ID
$cat_query = $mysqli->query("SELECT id FROM categories WHERE name = 'Body Care' LIMIT 1");
$body_care_id = 0;
if($cat = $cat_query->fetch_object()) {
    $body_care_id = $cat->id;
} else {
    die("Body Care category not found.");
}
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Body Care Products || Paintex House</title>
  <link rel="stylesheet" href="css/foundation.css" />
  <script src="js/vendor/modernizr.js"></script>
</head>
<body>

<nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="index.php">Paintex House</a></h1>
    </li>
    <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
  </ul>

  <section class="top-bar-section">
    <ul class="right">
      <li><a href="about.php">About</a></li>
      <li><a href="products.php">Products</a></li>
      <li><a href="cart.php">View Cart</a></li>
      <li><a href="orders.php">My Orders</a></li>
      <li><a href="contact.php">Contact</a></li>
      <?php
      if(isset($_SESSION['username'])){
        echo '<li><a href="account.php">My Account</a></li>';
        echo '<li><a href="logout.php">Log Out</a></li>';
      } else {
        echo '<li><a href="login.php">Log In</a></li>';
        echo '<li><a href="register.php">Register</a></li>';
      }
      ?>
    </ul>
  </section>
</nav>

<div class="row" style="margin-top:10px;">
  
  <!-- Sidebar Categories -->
  <div class="small-3 columns">
    <h4>Categories</h4>
    <ul>
      <li><a href="products.php">All Products</a></li>
      <li><a href="hair_care.php">Hair_care</a></li>
     <li><a href="body_care.php">Body_care</a></li>
    </ul>
  </div>

  <!-- Product Display -->
  <div class="small-9 columns">
    <h3>Body Care Products</h3>
    <?php
      $i = 0;
      $product_id = array();
      $product_quantity = array();

      $result = $mysqli->query("SELECT * FROM products WHERE category_id = $body_care_id");
      if($result === FALSE){
        die($mysqli->error);
      }

      if($result){
        while($obj = $result->fetch_object()) {
          echo '<div class="large-4 columns">';
          echo '<p><h4>'.$obj->product_name.'</h4></p>';
          echo '<img src="images/products/'.$obj->product_img_name.'" style="width:100%;height:auto;" />';
          echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
          echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
          echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
          echo '<p><strong>Price</strong>: '.$currency.$obj->price.'</p>';

          if($obj->qty > 0){
            echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'">
            <input type="submit" value="Add To Cart" style="background:#0078A0;color:#fff;padding:10px;border:none;font-size:1em;" /></a></p>';
          } else {
            echo '<p style="color:red;">Out Of Stock!</p>';
          }

          echo '</div>';
          $i++;
        }
      }

      $_SESSION['product_id'] = $product_id;
    ?>
  </div>
</div>

<div class="row" style="margin-top:10px;">
  <div class="small-12">
    <footer style="margin-top:10px;">
      <p style="text-align:center; font-size:0.8em;clear:both;">&copy; Paintex House. All Rights Reserved.</p>
    </footer>
  </div>
</div>

<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>
  $(document).foundation();
</script>

</body>
</html>
