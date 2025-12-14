
<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shopping Cart || Paintex House</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <style>
      .cart-table th, .cart-table td {
        text-align: center;
        padding: 12px;
      }
      .cart-table {
        width: 100%;
        border-collapse: collapse;
      }
      .cart-table th {
        background-color: #f0f0f0;
      }
      .cart-actions {
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
      }
      .cart-actions a, .cart-actions button {
        margin: 5px;
      }
      .empty-cart-msg {
        text-align: center;
        padding: 30px;
        font-size: 1.2em;
        color: #666;
      }
    </style>
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <!-- Navigation Bar -->
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
          <li class="active"><a href="cart.php">View Cart</a></li>
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

    <!-- Shopping Cart Content -->
    <div class="row" style="margin-top:20px;">
      <div class="large-12 columns">
        <h3>Your Shopping Cart</h3>
        <?php
        if(isset($_SESSION['cart'])) {
          $total = 0;
          echo '<table class="cart-table">';
          echo '<tr><th>Code</th><th>Name</th><th>Quantity</th><th>Cost (৳)</th></tr>';

          foreach($_SESSION['cart'] as $product_id => $quantity) {
            $result = $mysqli->query("SELECT product_code, product_name, price FROM products WHERE id = ".$product_id);
            if($result){
              while($obj = $result->fetch_object()) {
                $cost = $obj->price * $quantity;
                $total += $cost;

                echo '<tr>';
                echo '<td>'.$obj->product_code.'</td>';
                echo '<td>'.$obj->product_name.'</td>';
                echo '<td>'.$quantity.'
                  <a class="button tiny success" href="update-cart.php?action=add&id='.$product_id.'">+</a>
                  <a class="button tiny alert" href="update-cart.php?action=remove&id='.$product_id.'">-</a>
                </td>';
                echo '<td>৳'.number_format($cost, 2).'</td>';
                echo '</tr>';
              }
            }
          }

          echo '<tr><td colspan="3" align="right"><strong>Total</strong></td><td><strong>৳'.number_format($total, 2).'</strong></td></tr>';
          echo '</table>';

          echo '<div class="cart-actions">';
          echo '<a href="update-cart.php?action=empty" class="button alert">Empty Cart</a>';
          echo '<a href="products.php" class="button secondary">Continue Shopping</a>';
          if(isset($_SESSION['username'])) {
            echo '<a href="orders-update.php" class="button success">Proceed with COD</a>';
          } else {
            echo '<a href="login.php" class="button success">Login to Checkout</a>';
          }
          echo '</div>';
        } else {
          echo '<div class="empty-cart-msg">🛒 Your shopping cart is currently empty. <br><a href="products.php" class="button small">Start Shopping</a></div>';
        }
        ?>
      </div>
    </div>

    <!-- Footer -->
    <div class="row" style="margin-top:30px;">
      <div class="small-12 columns">
        <footer>
          <p style="text-align:center; font-size:0.9em;">&copy; <?= date('Y'); ?> Paintex House. All Rights Reserved.</p>
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
