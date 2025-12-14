<!-- admin-success.php -->

<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
if(!isset($_SESSION["username"]) || $_SESSION["type"] != "admin") {
  header("location:index.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Admin Update Successful | Paintex House</title>
  <link rel="stylesheet" href="css/foundation.css" />
</head>
<body>

  <div class="row" style="margin-top: 50px;">
    <div class="large-12 columns text-center">
      <h2>Product Updated Successfully</h2>
      <a href="admin.php" class="button success small">Back to Admin Panel</a>
    </div>
  </div>

</body>
</html>
