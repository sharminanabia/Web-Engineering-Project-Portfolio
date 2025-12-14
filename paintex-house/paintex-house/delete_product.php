<?php
session_start();

if (!isset($_SESSION["username"]) || $_SESSION["type"] != "admin") {
  header("location:index.php");
  exit();
}

include 'config.php';

if (isset($_GET['id'])) {
  $id = intval($_GET['id']);

  // Optional: Delete associated product image if needed
  $result = $mysqli->query("SELECT product_img_name FROM products WHERE id = $id");
  if ($result && $row = $result->fetch_assoc()) {
    $imgPath = "images/products/" . $row['product_img_name'];
    if (file_exists($imgPath)) {
      unlink($imgPath); // delete image file
    }
  }

  // Delete product from DB
  $stmt = $mysqli->prepare("DELETE FROM products WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $stmt->close();
}

header("Location: admin.php");
exit();
