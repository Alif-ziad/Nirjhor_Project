<?php
session_start();
require_once("../../models/userModel.php");

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

$sellers = getAllSellers();
?>

<!doctype html>
<html>
<head>
    <title>Manage Users</title>
</head>
<body>

<h2>Manage Sellers</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Shop Name</th>
        <th>Shop Address</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

<?php foreach ($sellers as $seller): ?>
<tr>
    <td><?= $seller['id'] ?></td>
    <td><?= $seller['name'] ?></td>
    <td><?= $seller['email'] ?></td>
    <td><?= $seller['shop_name'] ?></td>
    <td><?= $seller['shop_address'] ?></td>
    <td>
        <?= $seller['is_approved'] ? 'Approved' : 'Pending' ?>
    </td>
    <td>
        <?php if ($seller['is_approved'] == 0): ?>
            <a href="../../controllers/authController.php?approveSeller=<?= $seller['id'] ?>">Approve</a> |
            <a href="../../controllers/authController.php?denySeller=<?= $seller['id'] ?>">Deny</a>
        <?php else: ?>
            —
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</table>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
