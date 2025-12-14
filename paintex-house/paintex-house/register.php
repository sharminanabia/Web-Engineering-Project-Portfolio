
<?php

// Start session if not already started
if(session_id() == '' || !isset($_SESSION)){session_start();}

// Redirect if user already logged in
if (isset($_SESSION["username"])) {
    header("location:index.php");
    exit();
}

?>

<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register || Paintex House</title>
  <link rel="stylesheet" href="css/foundation.css" />
  <script src="js/vendor/modernizr.js"></script>
  <style>
    body {
      background: #f9faff;
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
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
    form {
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgb(0 0 0 / 0.1);
      max-width: 600px;
      margin: 40px auto;
    }
    label {
      font-weight: 600;
      color: #333;
    }
    input[type="text"],
    input[type="email"],
    input[type="number"],
    input[type="password"] {
      border: 1px solid #ccc;
      padding: 10px;
      font-size: 1em;
      border-radius: 4px;
      width: 100%;
      box-sizing: border-box;
      transition: border-color 0.3s ease;
    }
    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="number"]:focus,
    input[type="password"]:focus {
      border-color: #0078A0;
      outline: none;
    }
    input[type="submit"],
    input[type="reset"] {
      background: #0078A0;
      border: none;
      color: #fff;
      font-family: 'Helvetica Neue', sans-serif;
      font-size: 1em;
      padding: 12px 20px;
      border-radius: 6px;
      cursor: pointer;
      margin-right: 10px;
      transition: background 0.3s ease;
    }
    input[type="submit"]:hover,
    input[type="reset"]:hover {
      background: #005f73;
    }
    footer p {
      text-align: center;
      font-size: 0.8em;
      color: #777;
      margin-top: 50px;
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
    <!-- Right Nav Section -->
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
      }
      else{
        echo '<li><a href="login.php">Log In</a></li>';
        echo '<li class="active"><a href="register.php">Register</a></li>';
      }
      ?>
    </ul>
  </section>
</nav>

<form method="POST" action="insert.php">
  <div class="row">
    <div class="small-12 columns">
      <label for="fname">First Name</label>
      <input type="text" id="fname" name="fname" placeholder="Sauda" required>
    </div>

    <div class="small-12 columns" style="margin-top: 15px;">
      <label for="lname">Last Name</label>
      <input type="text" id="lname" name="lname" placeholder="Moni" required>
    </div>

    <div class="small-12 columns" style="margin-top: 15px;">
      <label for="address">Address</label>
      <input type="text" id="address" name="address" placeholder="Road, Area" required>
    </div>

    <div class="small-12 columns" style="margin-top: 15px;">
      <label for="city">City</label>
      <input type="text" id="city" name="city" placeholder="Rajshahi" required>
    </div>

    <div class="small-12 columns" style="margin-top: 15px;">
      <label for="pin">Pin Code</label>
      <input type="number" id="pin" name="pin" placeholder="400056" required>
    </div>

    <div class="small-12 columns" style="margin-top: 15px;">
      <label for="email">E-Mail</label>
      <input type="email" id="email" name="email" placeholder="saudamoni@gmail.com" required>
    </div>

    <div class="small-12 columns" style="margin-top: 15px;">
      <label for="pwd">Password <span style="color:#d32f2f;">*</span></label>
      <input type="password" id="pwd" name="pwd" required>
    </div>

    <div class="small-12 columns" style="margin-top: 25px;">
      <input type="submit" value="Register">
      <input type="reset" value="Reset">
    </div>
  </div>
</form>

<footer>
  <p>&copy; Paintex House. All Rights Reserved.</p>
</footer>

<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>
  $(document).foundation();
</script>

</body>
</html>
