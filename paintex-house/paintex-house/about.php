
<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us || Paintex House</title>
  <link rel="stylesheet" href="css/foundation.css" />
  <script src="js/vendor/modernizr.js"></script>
  <style>
    body {
      background: #f9fafa;
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      color: #333;
    }
    nav.top-bar {
      background-color: #0078A0;
    }
    nav.top-bar a {
      color: #fff !important;
      font-weight: 600;
    }
    nav.top-bar .active a {
      background-color: #005f73 !important;
      border-radius: 5px;
    }
    .about-container {
      max-width: 900px;
      margin: 50px auto;
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }
    .about-container h2 {
      color: #0078A0;
      font-weight: 700;
      text-align: center;
      margin-bottom: 30px;
    }
    .about-container p {
      font-size: 1.1em;
      line-height: 1.7;
      margin-bottom: 20px;
      color: #555;
    }
    .highlight {
      background: #e6f7fa;
      padding: 10px 15px;
      border-left: 4px solid #0078A0;
      font-style: italic;
      margin: 20px 0;
    }
    .icon-row {
      display: flex;
      justify-content: space-around;
      text-align: center;
      margin-top: 30px;
    }
    .icon-box {
      width: 30%;
    }
    .icon-box img {
      width: 60px;
      height: auto;
      margin-bottom: 10px;
    }
    footer {
      margin-top: 60px;
    }
    footer p {
      text-align: center;
      font-size: 0.8em;
      color: #777;
    }
    @media (max-width: 640px) {
      .icon-row {
        flex-direction: column;
        gap: 25px;
      }
      .icon-box {
        width: 100%;
      }
    }
  </style>
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
      <li class="active"><a href="about.php">About</a></li>
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

<div class="about-container">
  <h2>About Paintex House</h2>
  <p>Welcome to <strong>Paintex House</strong> — your trusted destination for premium, chemical-free, and eco-conscious beauty products. We believe in the power of nature to heal, nourish, and enhance your natural beauty without harming your skin or the environment.</p>

  <div class="highlight">
    🌿 "Pure beauty, powered by nature" — that's our philosophy.
  </div>

  <p>From organic skincare to herbal haircare, our products are carefully curated and sourced from natural ingredients. We are committed to cruelty-free practices, sustainability, and transparency in everything we offer.</p>

  <p>Our mission is to help you embrace your authentic self with products that are safe, effective, and kind to your body and the planet. Whether you're shopping for face serums, hair oils, or body scrubs — we've got something pure and perfect for you.</p>

  <div class="icon-row">
    <div class="icon-box">
      <img src="images/natural.png" alt="Natural Icon">
      <p>100% Natural Ingredients</p>
    </div>
    <div class="icon-box">
      <img src="images/crueltyfree.png" alt="Cruelty-Free Icon">
      <p>Cruelty-Free</p>
    </div>
    <div class="icon-box">
      <img src="images/eco.png" alt="Eco-Friendly Icon">
      <p>Eco-Friendly Packaging</p>
    </div>
  </div>

  <p style="margin-top: 30px;">Join our journey toward a greener, cleaner beauty lifestyle. 🌍</p>
</div>

<footer>
  <p>&copy; <?php echo date("Y"); ?> Paintex House. All Rights Reserved.</p>
</footer>

<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>
  $(document).foundation();
</script>

</body>
</html>
