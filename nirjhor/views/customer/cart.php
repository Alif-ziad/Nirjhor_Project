<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'customer') {
    header("Location: ../auth/login.php");
    exit();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['remove'])) {
    $removeId = $_GET['remove'];
    unset($_SESSION['cart'][$removeId]);
    header("Location: cart.php");
    exit();
}

$total = 0;
?>

<!doctype html>
<html>
<head>
    <title>My Cart</title>
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
                <a href="../auth/logout.php" class="btn-header btn-logout">Logout</a>
            </div>
        </div>
    </header>

<h2>🛒 My Cart</h2>

<?php if (empty($_SESSION['cart'])) { ?>
    <p >Your cart is empty.</p>
    <a href="products.php">Continue Shopping</a>
<?php } else { ?>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
        <th>Action</th>
    </tr>

    <?php foreach ($_SESSION['cart'] as $id => $item): 
        $subTotal = $item['price'] * $item['quantity'];
        $total += $subTotal;
    ?>
    <tr>
        <td><?= htmlspecialchars($item['name']) ?></td>
        <td><?= $item['price'] ?> Tk</td>
        <td><?= $item['quantity'] ?></td>
        <td><?= $subTotal ?> Tk</td>
        <td>
            <a href="cart.php?remove=<?= $id ?>">Remove</a>
        </td>
        <td><?= htmlspecialchars($item['name']) ?></td>

    </tr>
    <?php endforeach; ?>

    <tr>
        <td colspan="3" align="right"><strong>Total:</strong></td>
        <td colspan="2"><strong><?= $total ?> Tk</strong></td>
    </tr>
</table>

<br>
<div class="checkout-links">
    <a href="checkout.php">Proceed to Checkout</a>
    |
    <a href="products.php">Continue Shopping</a>
</div>
<?php } ?>

</body>
</html>
