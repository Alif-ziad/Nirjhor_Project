<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}
require_once "../../models/productModel.php";
$products = getPendingProducts();
?>

<h2>Approve Products</h2>

<table border="1">
<tr>
    <th>Image</th>
    <th>Name</th>
    <th>Price</th>
    <th>Seller</th>
    <th>Action</th>
</tr>

<?php foreach ($products as $p): ?>
<tr>
    <td><img src="<?= $p['image'] ?>" width="80"></td>
    <td><?= $p['name'] ?></td>
    <td><?= $p['price'] ?></td>
    <td><?= $p['seller_id'] ?></td>
    <td>
        <a href="../../controllers/productController.php?approve=<?= $p['product_id'] ?>">Approve</a> |
        <a href="../../controllers/productController.php?deny=<?= $p['product_id'] ?>">Deny</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
<a href="dashboard.php">
    <button type="button">Return to Dashboard</button>
</a>
