<?php
session_start();

if(!isset($_SESSION["username"]) || $_SESSION["type"] != "admin") {
  header("location:index.php");
  exit();
}

include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>View Orders | Paintex House</title>
  <link rel="stylesheet" href="css/foundation.css">

  <!-- ✅ DataTables CSS CDN -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
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
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>


<div class="row" style="margin-top:20px;">
  <div class="large-12 columns">
    <h2>All Orders</h2>

    <table id="ordersTable" class="display" style="width:100%">
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Product Code</th>
          <th>Product Name</th>
          <th>Price</th>
          <th>Units</th>
          <th>Total</th>
          <th>Date</th>
          <th>Customer Email</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $results = $mysqli->query("SELECT id, product_code, product_name, price, units, total, date, email FROM orders ORDER BY id DESC");
          if ($results->num_rows > 0) {
            while($row = $results->fetch_assoc()) {
              echo "<tr>";
              echo "<td>".$row["id"]."</td>";
              echo "<td>".$row["product_code"]."</td>";
              echo "<td>".$row["product_name"]."</td>";
              echo "<td>".$row["price"]."</td>";
              echo "<td>".$row["units"]."</td>";
              echo "<td>".$row["total"]."</td>";
              echo "<td>".$row["date"]."</td>";
              echo "<td>".$row["email"]."</td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='8'>No orders found.</td></tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
</div>

<!-- ✅ jQuery & DataTables JS CDN -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function () {
    $('#ordersTable').DataTable({
      pageLength: 10,
      order: [[0, 'desc']] // Order by Order ID descending
    });
  });
</script>

</body>
</html>
