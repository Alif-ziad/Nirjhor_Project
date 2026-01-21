<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'customer') {
    header("Location: ../auth/login.php");
    exit();
}

if (empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit();
}

$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>

<!doctype html>
<html>
<head>
    <title>Checkout</title>
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

<h2>Checkout</h2>

<p><strong>Total Amount:</strong> <?= $total ?> Tk</p>

<form action="../../controllers/orderController.php" method="POST">
    <label>Delivery Address:</label><br>
    <textarea name="address" required></textarea><br><br>

    <input type="submit" name="place_order" value="Place Order">
</form>

</body>
</html>
