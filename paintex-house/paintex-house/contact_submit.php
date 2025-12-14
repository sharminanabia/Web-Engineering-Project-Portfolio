
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars(trim($_POST['name']));
  $email = htmlspecialchars(trim($_POST['email']));
  $message = htmlspecialchars(trim($_POST['message']));

  // Example: Save to database (You can skip this or use your DB logic)
  // Or you can send it via email using mail() function
  // mail('your@email.com', 'New Contact Message', $message, "From: $name <$email>");

  // For now, just display the success message
} else {
  header("Location: contact.php");
  exit();
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Message Sent | Paintex House</title>
  <link rel="stylesheet" href="css/foundation.css">
  <style>
    body {
      background-color: #f7f9fc;
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      text-align: center;
      padding: 80px 20px;
    }
    .message-box {
      max-width: 600px;
      margin: auto;
      background: #ffffff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    h1 {
      color: #0078A0;
      margin-bottom: 20px;
    }
    p {
      color: #555;
      font-size: 1.1em;
    }
    a.button {
      margin-top: 30px;
      display: inline-block;
      padding: 12px 25px;
      background-color: #0078A0;
      color: white;
      text-decoration: none;
      border-radius: 6px;
      font-size: 1em;
      transition: background-color 0.3s ease;
    }
    a.button:hover {
      background-color: #005f73;
    }
  </style>
</head>
<body>
  <div class="message-box">
    <h1>Thank You, <?= $name ?>!</h1>
    <p>Your message has been sent successfully. <br>
       We will get back to you soon at <strong><?= $email ?></strong>.</p>
    <a href="index.php" class="button">Back to Home</a>
  </div>
</body>
</html>
