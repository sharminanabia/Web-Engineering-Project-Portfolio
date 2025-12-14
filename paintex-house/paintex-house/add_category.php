
<?php
session_start();
include 'config.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = trim($_POST['category_name']);

    if (!empty($category_name)) {
        // Prevent SQL injection
        $stmt = $mysqli->prepare("INSERT INTO categories (name) VALUES (?)");
        $stmt->bind_param("s", $category_name);

        if ($stmt->execute()) {
            $success = "Category added successfully!";
        } else {
            $error = "Failed to add category. Please try again.";
        }

        $stmt->close();
    } else {
        $error = "Category name cannot be empty.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
    <link rel="stylesheet" href="css/foundation.css" />
</head>
<body>

<div class="row" style="margin-top: 50px;">
    <div class="small-6 small-centered columns">
        <h2>Add New Category</h2>

        <?php if (!empty($success)) { echo '<p style="color:green;">'.$success.'</p>'; } ?>
        <?php if (!empty($error)) { echo '<p style="color:red;">'.$error.'</p>'; } ?>

        <form method="post" action="add_category.php">
            <label>Category Name:
                <input type="text" name="category_name" placeholder="e.g., Paints, Brushes" required />
            </label>
            <input type="submit" class="button" value="Add Category" />
        </form>

        <p><a href="products.php">← Back to Products</a></p>
    </div>
</div>

<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>
  $(document).foundation();
</script>

</body>
</html>
