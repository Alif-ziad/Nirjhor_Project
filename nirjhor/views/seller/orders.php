<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'seller') {
    header("Location: ../auth/login.php");
    exit();
}

require_once "../../models/dbConnect.php";

$conn = dbConnect();
$sellerId = $_SESSION['id'];

/*
 We match seller products by seller_id
*/
$query = "
SELECT 
    o.id AS order_id,
    o.total_amount,
    o.address,
    o.created_at,
    oi.product_name,
    oi.price,
    oi.quantity
FROM orders o
JOIN order_items oi ON o.id = oi.order_id
JOIN products p ON p.name = oi.product_name
WHERE p.seller_id = '$sellerId'
ORDER BY o.created_at DESC
";

$res = mysqli_query($conn, $query);
?>

<!doctype html>
<html>
<head>
    <title>Seller Orders</title>
</head>
<body>

<h2>Orders Containing Your Products</h2>

<table border="1" cellpadding="8">
<tr>
    <th>Order ID</th>
    <th>Product</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Total Order</th>
    <th>Delivery Address</th>
    <th>Date</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($res)): ?>
<tr>
    <td><?= $row['order_id'] ?></td>
    <td><?= htmlspecialchars($row['product_name']) ?></td>
    <td><?= $row['price'] ?> Tk</td>
    <td><?= $row['quantity'] ?></td>
    <td><?= $row['total_amount'] ?> Tk</td>
    <td><?= htmlspecialchars($row['address']) ?></td>
    <td><?= $row['created_at'] ?></td>
</tr>
<?php endwhile; ?>

</table>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
