
<?php
session_start();

if (!isset($_SESSION["username"]) || $_SESSION["type"] != "admin") {
  header("location: index.php");
  exit();
}

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_code = mysqli_real_escape_string($mysqli, $_POST['product_code']);
    $product_name = mysqli_real_escape_string($mysqli, $_POST['product_name']);
    $product_desc = mysqli_real_escape_string($mysqli, $_POST['product_desc']);
    $qty = intval($_POST['qty']);
    $price = floatval($_POST['price']);
    $category_id = intval($_POST['category_id']);

    // Validate category selection
    if ($category_id <= 0) {
        $error = "Please select a valid category.";
    } else {
        // Handle image upload
        $image_name = $_FILES['product_img_name']['name'];
        $image_tmp = $_FILES['product_img_name']['tmp_name'];
        $target_dir = "images/products/";

        if (move_uploaded_file($image_tmp, $target_dir . $image_name)) {
            $query = "INSERT INTO products (product_code, product_name, product_desc, product_img_name, qty, price, category_id) 
                      VALUES ('$product_code', '$product_name', '$product_desc', '$image_name', '$qty', '$price', $category_id)";

            if ($mysqli->query($query)) {
                $success = "Product added successfully!";
            } else {
                $error = "Error adding product: " . $mysqli->error;
            }
        } else {
            $error = "Failed to upload image.";
        }
    }
}

// Fetch categories for dropdown
$categories = [];
$result = $mysqli->query("SELECT id, name FROM categories ORDER BY name ASC");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
} else {
    $error = "Failed to load categories: " . $mysqli->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Product | Paintex House</title>
  <link rel="stylesheet" href="css/foundation.css">
</head>
<body>

<div class="row" style="margin-top:30px;">
  <div class="large-8 large-offset-2 columns">
    <h3>Add New Product</h3>

    <?php if (isset($success)) echo "<div class='panel success'>{$success}</div>"; ?>
    <?php if (isset($error)) echo "<div class='panel alert'>{$error}</div>"; ?>

    <form action="" method="POST" enctype="multipart/form-data">
      <label>Product Code
        <input type="text" name="product_code" required>
      </label>

      <label>Product Name
        <input type="text" name="product_name" required>
      </label>

      <label>Description
        <textarea name="product_desc" required></textarea>
      </label>

      <label>Category
        <select name="category_id" required>
          <option value="">-- Select Category --</option>
          <?php
          foreach ($categories as $cat) {
              echo '<option value="' . htmlspecialchars($cat['id']) . '">' . htmlspecialchars($cat['name']) . '</option>';
          }
          ?>
        </select>
      </label>

      <label>Product Image
        <input type="file" name="product_img_name" accept="image/*" required>
      </label>

      <label>Quantity
        <input type="number" name="qty" required min="0">
      </label>

      <label>Price
        <input type="number" step="0.01" name="price" required min="0">
      </label>

      <button type="submit" class="button success">Add Product</button>
    </form>

    <br>
    <a href="admin.php" class="button secondary small">Back to Admin Panel</a>
  </div>
</div>

</body>
</html>
