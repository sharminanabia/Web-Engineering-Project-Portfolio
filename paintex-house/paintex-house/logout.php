
<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Logging Out</title>
<style>
  body {
    background: #f0f8ff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
    margin: 0;
  }
  .message-box {
    background: #dff0d8;
    border: 1px solid #3c763d;
    padding: 30px 40px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(60, 118, 61, 0.3);
    text-align: center;
    max-width: 400px;
  }
  .message-box h1 {
    margin-bottom: 15px;
    color: #3c763d;
  }
  .message-box p {
    font-size: 18px;
  }
  .message-box small {
    display: block;
    margin-top: 20px;
    color: #555;
  }
</style>
<script>
  // Redirect after 3 seconds
  setTimeout(function() {
    window.location.href = "index.php";
  }, 3000);
</script>
</head>
<body>
  <div class="message-box">
    <h1>Logged Out Successfully!</h1>
    <p>Thank you for visiting. You will be redirected shortly...</p>
    <small>If you are not redirected automatically, <a href="index.php">click here</a>.</small>
  </div>
</body>
</html>
