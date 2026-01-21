<?php
session_start();
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
                <a href="products.php" class="btn-header btn-login">Return to home</a>
                <a href="cart.php" class="btn-header btn-login">Cart</a>
                <a href="../auth/logout.php" class="btn-header btn-logout">Logout</a>
            </div>
        </div>
    </header>

</body>
<h2>✅ Order Placed Successfully</h2>
<p>Thank you for your purchase.</p>

<a href="products.php">Continue Shopping</a>
<?php include __DIR__ . '/../layout/footer.php'; ?>
