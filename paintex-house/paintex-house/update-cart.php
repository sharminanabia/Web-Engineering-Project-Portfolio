<?php
if(session_id() == '' || !isset($_SESSION)) { session_start(); }

include 'config.php';

$action = $_GET['action'] ?? '';

if ($action === 'empty') {
  unset($_SESSION['cart']);
} elseif (isset($_GET['id'])) {
  $product_id = (int)$_GET['id']; // Typecast to int for safety

  $result = $mysqli->query("SELECT qty FROM products WHERE id = $product_id");

  if ($result) {
    if ($obj = $result->fetch_object()) {
      switch($action) {
        case "add":
          if (!isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] = 1;
          } elseif ($_SESSION['cart'][$product_id] + 1 <= $obj->qty) {
            $_SESSION['cart'][$product_id]++;
          }
          break;

        case "remove":
          if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]--;
            if ($_SESSION['cart'][$product_id] <= 0) {
              unset($_SESSION['cart'][$product_id]);
            }
          }
          break;
      }
    }
  }
}

header("Location: cart.php");
exit();
?>
