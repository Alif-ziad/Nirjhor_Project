<?php
session_start();
require_once "../../models/productModel.php";

$products = getApprovedProducts();
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
                <a href="products.php" class="logo-link">
                    <img src="../../assets/images/logo.png" alt="Logo" class="logo-img">
                    <span class="site-name">NIRJHOR</span>
                </a>
            </div>

  <div class="header-buttons">
<?php if (!isset($_SESSION['email'])) { ?>
<a href="../auth/login.php" class="btn-header btn-login">Login</a>
<a href="../auth/register.php" class="btn-header btn-signup">Sign Up</a>
<?php } else { ?>

    <?php if ($_SESSION['role'] === 'customer') { ?>
        <a href="cart.php" class="btn-header btn-login">Cart</a>
    <?php } ?>

    <?php if ($_SESSION['role'] === 'seller') { ?>
        <a href="../seller/dashboard.php" class="btn-header btn-login">Dashboard</a>
    <?php } ?>

    <?php if ($_SESSION['role'] === 'admin') { ?>
        <a href="../admin/dashboard.php" class="btn-header btn-login">Dashboard</a>
    <?php } ?>

    <a href="../auth/logout.php" class="btn-header btn-logout">Logout</a>

<?php } ?>
</div>
</div>
</header>

<div class="products">
<?php foreach ($products as $p): ?>
    <div class="product-card">

       <?php
$image = !empty($p['image']) ? $p['image'] : 'default.png';
?>

<img src="../../assets/images/<?= htmlspecialchars($image) ?>" width="150"><br>

        <b><?= htmlspecialchars($p['name']) ?></b><br>
        Price: <?= $p['price'] ?> Tk<br><br>

        <a href="../../controllers/cartController.php?add=<?= $p['product_id'] ?>">
            Add to Cart
        </a>
    </div>
<?php endforeach; ?>
</div>

</body>
</html>
<?php include __DIR__ . '/../layout/footer.php'; ?>