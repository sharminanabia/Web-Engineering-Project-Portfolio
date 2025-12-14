<?php
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}

if(isset($_SESSION["username"])){
    header("location:index.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login || Paintex House</title>

  <link rel="stylesheet" href="css/foundation.css" />
  <script src="js/vendor/modernizr.js"></script>

  <style>
    body {
      background-color: #f9fbfc;
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    }
    nav.top-bar {
      background-color: #0078A0;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    nav.top-bar .title-area h1 a {
      color: white;
      font-weight: bold;
      text-decoration: none;
      font-size: 1.5rem;
    }
    nav.top-bar ul.right li a {
      color: #f0f0f0;
      font-weight: 600;
      padding: 0.8rem 1rem;
      transition: background-color 0.3s ease;
    }
    nav.top-bar ul.right li.active a,
    nav.top-bar ul.right li a:hover {
      background-color: #005f73;
      color: #ffffff;
    }

    form.login-form {
      max-width: 480px;
      margin: 40px auto;
      background: #fff;
      padding: 2rem 2.5rem;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    form.login-form label {
      font-weight: 600;
      margin-bottom: 0.3rem;
      display: block;
      color: #333;
    }
    form.login-form input[type="email"],
    form.login-form input[type="password"] {
      width: 100%;
      padding: 0.7rem 1rem;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }
    form.login-form input[type="email"]:focus,
    form.login-form input[type="password"]:focus {
      border-color: #0078A0;
      outline: none;
    }

    .button-group {
      display: flex;
      gap: 1rem;
      margin-top: 1.5rem;
    }
    .button-group input[type="submit"],
    .button-group input[type="reset"] {
      flex: 1;
      padding: 0.75rem 0;
      border: none;
      border-radius: 6px;
      font-size: 1.1rem;
      font-weight: 700;
      cursor: pointer;
      transition: background-color 0.3s ease;
      color: white;
    }
    .button-group input[type="submit"] {
      background-color: #0078A0;
    }
    .button-group input[type="submit"]:hover {
      background-color: #005f73;
    }
    .button-group input[type="reset"] {
      background-color: #f44336;
    }
    .button-group input[type="reset"]:hover {
      background-color: #ba000d;
    }

    footer p {
      text-align: center;
      font-size: 0.85rem;
      color: #777;
      margin-top: 3rem;
      padding-bottom: 2rem;
    }
  </style>
</head>
<body>

  <nav class="top-bar" data-topbar role="navigation" aria-label="Primary Navigation">
    <ul class="title-area">
      <li class="name">
        <h1><a href="index.php" tabindex="1">Paintex House</a></h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

    <section class="top-bar-section">
      <ul class="right">
        <li><a href="about.php" tabindex="2">About</a></li>
        <li><a href="products.php" tabindex="3">Products</a></li>
        <li><a href="cart.php" tabindex="4">View Cart</a></li>
        <li><a href="orders.php" tabindex="5">My Orders</a></li>
        <li><a href="contact.php" tabindex="6">Contact</a></li>
        <?php if(isset($_SESSION['username'])): ?>
          <li><a href="account.php" tabindex="7">My Account</a></li>
          <li><a href="logout.php" tabindex="8">Log Out</a></li>
        <?php else: ?>
          <li class="active"><a href="login.php" tabindex="7">Log In</a></li>
          <li><a href="register.php" tabindex="8">Register</a></li>
        <?php endif; ?>
      </ul>
    </section>
  </nav>

  <main>
    <form class="login-form" method="POST" action="verify.php" aria-labelledby="login-heading" novalidate>
      <h2 id="login-heading" style="text-align:center; margin-bottom: 1.5rem; color:#0078A0;">Login to Paintex House</h2>

      <label for="username">Email Address</label>
      <input 
        type="email" 
        id="username" 
        name="username" 
        placeholder="you@example.com" 
        required 
        aria-required="true"
        autocomplete="email"
        autofocus
      >

      <label for="pwd" style="margin-top: 1rem;">Password</label>
      <input 
        type="password" 
        id="pwd" 
        name="pwd" 
        required 
        aria-required="true" 
        autocomplete="current-password"
      >

      <div class="button-group">
        <input type="submit" value="Login" aria-label="Login to your account">
        <input type="reset" value="Reset" aria-label="Clear login form">
      </div>
    </form>
  </main>

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

