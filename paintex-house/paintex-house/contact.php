
<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact || Paintex House</title>
  <link rel="stylesheet" href="css/foundation.css" />
  <script src="js/vendor/modernizr.js"></script>
  <style>
    body {
      background: #f7f9fc;
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
    .contact-container {
      max-width: 700px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    h2 {
      color: #0078A0;
      margin-bottom: 20px;
      font-weight: 700;
      text-align: center;
    }
    form label {
      font-weight: 600;
      margin-top: 15px;
      display: block;
      color: #444;
    }
    form input, form textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 4px;
      border: 1px solid #ccc;
      font-size: 1em;
      resize: vertical;
      transition: border-color 0.3s ease;
    }
    form input:focus, form textarea:focus {
      border-color: #0078A0;
      outline: none;
    }
    form button {
      margin-top: 20px;
      background-color: #0078A0;
      color: white;
      border: none;
      padding: 12px 25px;
      font-size: 1.1em;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      display: block;
      width: 100%;
    }
    form button:hover {
      background-color: #005f73;
    }
    .info-text {
      text-align: center;
      font-size: 1.1em;
      margin-bottom: 25px;
      color: #555;
    }
    .email-link {
      color: #0078A0;
      font-weight: 700;
      text-decoration: none;
    }
    .email-link:hover {
      text-decoration: underline;
    }
    footer p {
      text-align: center;
      font-size: 0.8em;
      color: #777;
      margin: 50px 0 20px 0;
    }
    .map-container {
      margin-top: 30px;
      text-align: center;
    }
    iframe {
      width: 100%;
      height: 300px;
      border-radius: 8px;
      border: 0;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
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
      <li><a href="about.php">About</a></li>
      <li><a href="products.php">Products</a></li>
      <li><a href="cart.php">View Cart</a></li>
      <li><a href="orders.php">My Orders</a></li>
      <li class="active"><a href="contact.php">Contact</a></li>
      <?php
      if(isset($_SESSION['username'])){
        echo '<li><a href="account.php">My Account</a></li>';
        echo '<li><a href="logout.php">Log Out</a></li>';
      }
      else{
        echo '<li><a href="login.php">Log In</a></li>';
        echo '<li><a href="register.php">Register</a></li>';
      }
      ?>
    </ul>
  </section>
</nav>

<div class="contact-container">
  <h2>Contact Us</h2>
  <p class="info-text">
    We would love to hear from you! Reach out with any questions or feedback.
    Or email us directly at <a href="mailto:support@paintexhouse.com" class="email-link">support@paintexhouse.com</a>
  </p>

  <form method="POST" action="contact_submit.php">
    <label for="name">Your Name</label>
    <input type="text" id="name" name="name" placeholder="John Doe" required>

    <label for="email">Your Email</label>
    <input type="email" id="email" name="email" placeholder="john@example.com" required>

    <label for="message">Message</label>
    <textarea id="message" name="message" rows="5" placeholder="Write your message here..." required></textarea>

    <button type="submit">Send Message</button>
  </form>

  <div class="map-container">
    <iframe 
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.902743785115!2d90.40602291539933!3d23.780573584583156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8bf6e06a8b7%3A0xf9bb4c7c0a7f58d2!2sDhaka%2C%20Bangladesh!5e0!3m2!1sen!2sus!4v1687000000000!5m2!1sen!2sus" 
      allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</div>

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
