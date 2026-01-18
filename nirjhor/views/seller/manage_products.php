<?php
session_start();
if ($_SESSION['role'] != 'seller') {
    header("Location: ../auth/login.php");
    exit();
}
require_once "../../models/productModel.php";
$products = getSellerProducts($_SESSION['id']);
?>

<h2>Manage Products</h2>

<table border="1">
<tr>
    <th>Image</th>
    <th>Name</th>
    <th>Price</th>
    <th>Status</th>
    <th>Update</th>
    <th>Delete</th>
</tr>

<?php foreach ($products as $p): ?>
<tr>
    <td><img src="<?= $p['image'] ?>" width="80"></td>
    <td><?= $p['name'] ?></td>
    <td><?= $p['price'] ?></td>
    <td><?= $p['status'] ?></td>

    <td>
        <form action="../../controllers/productController.php" method="POST">
            <input type="hidden" name="product_id" value="<?= $p['product_id'] ?>">
            <input type="text" name="name" value="<?= $p['name'] ?>">
            <input type="text" name="price" value="<?= $p['price'] ?>">
            <input type="text" name="description" value="<?= $p['description'] ?>">
            <button name="updateProduct">Update</button>
        </form>
    </td>

    <td>
        <form action="../../controllers/productController.php" method="POST">
            <input type="hidden" name="product_id" value="<?= $p['product_id'] ?>">
            <button name="deleteProduct">Delete</button>
        </form>
    </td>
</tr>
<?php endforeach; ?>
</table>
<a href="dashboard.php">
    <button type="button">Return to Dashboard</button>
</a>
