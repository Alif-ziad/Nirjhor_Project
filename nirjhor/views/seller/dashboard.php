<?php
session_start();
?>

<h2>Seller Dashboard</h2>
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
                    <span class="site-name">SELLER PANEL</span>
                </a>
            </div>
<div class="header-buttons">
<a href="../customer/products.php" class="btn-header btn-login">Return to home</a>
<a href="../auth/logout.php" class="btn-header btn-logout">Logout</a>
</div>
</div>
</header>
</body>
<a href="add_product.php">
    <button> Add New product</button>
</a>

<a href="manage_products.php">
    <button>Manage Products</button>
</a>
<?php include __DIR__ . '/../layout/footer.php'; ?>
