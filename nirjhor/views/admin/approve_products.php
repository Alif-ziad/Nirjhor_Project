<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}
require_once "../../models/productModel.php";
$products = getPendingProducts();
?>
<!doctype html>
<html>
<head>
    <title>Nirjhor</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
    <header class="site-header">
        <div class="header-container">
            <div class="logo-section">
                <a href="dashboard.php" class="logo-link">
                    <img src="../../assets/images/logo.png" alt="Logo" class="logo-img">
                    <span class="site-name">ADMIN PANEL</span>
                </a>
            </div>
            
            <div class="header-buttons">
                <a href="../customer/products.php" class="btn-header btn-login">Return to home</a>
                <a href="manage_users.php" class="btn-header btn-login">Manage Users</a>
                <a href="../auth/logout.php" class="btn-header btn-logout">Logout</a>
            </div>
        </div>
    </header>

</body>

<h2>Approve Products</h2>

<table border="1">
<thead>
<tr>
    
    <th>Image</th>
    <th>Name</th>
    <th>Price</th>
    <th>Seller</th>
    <th>Action</th>
</tr>
</thead>

<?php foreach ($products as $p): ?>
<tr>
    <td>
    <img src="../../assets/images/<?= htmlspecialchars($p['image']) ?>" width="80">
</td>
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
<?php include __DIR__ . '/../layout/footer.php'; ?>
