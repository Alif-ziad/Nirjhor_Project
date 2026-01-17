<?php
session_start();
?>

<h2>Add Product </h2>

<form action="../../controllers/productController.php" method="POST" enctype="multipart/form-data">

<input type="text" name="name" placeholder="product Name" required><br>
<input type="number" name="price" placeholder="Price" required><br>
<textarea name="description" placeholder="Product details"></textarea><br>
Image:
<input type="file" name="image" required><br><br>
<input type="submit" name="addProduct" value="Add Product">

<input type="reset" value="reset">
<a href="dashboard.php">
    <button type="button">Return to Dashboard</button>
</a>
</form>