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
</head>
<body>

<h2>Checkout</h2>

<p><strong>Total Amount:</strong> <?= $total ?> Tk</p>

<form action="../../controllers/orderController.php" method="POST">
    <label>Delivery Address:</label><br>
    <textarea name="address" required></textarea><br><br>

    <input type="submit" name="place_order" value="Place Order">
</form>

</body>
</html>
