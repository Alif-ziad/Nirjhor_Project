<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

require_once "../../models/dbConnect.php";
$conn = dbConnect();

$totalUsers = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM users")
)['total'];

$totalSellers = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM users WHERE role='seller'")
)['total'];

$approvedSellers = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM users WHERE role='seller' AND is_approved=1")
)['total'];

$pendingSellers = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM users WHERE role='seller' AND is_approved=0")
)['total'];

$totalOrders = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM orders")
)['total'];

$totalRevenue = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT IFNULL(SUM(total_amount),0) AS total FROM orders")
)['total'];

$todayOrders = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM orders WHERE DATE(created_at)=CURDATE()")
)['total'];
?>

<!doctype html>
<html>
<head>
    <title>Admin Reports</title>
</head>
<body>
<!doctype html>
<html>
<head>
    <title>Admin Reports</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
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
                <a href="dashboard.php" class="btn-header btn-login">Dashboard</a>
                <a href="manage_users.php" class="btn-header btn-login">Manage Users</a>
                <a href="approve_products.php" class="btn-header btn-login">Return to home</a>
                <a href="../auth/logout.php" class="btn-header btn-logout">Logout</a>
            </div>
        </div>
    </header>
<h2>📊 System Reports</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Metric</th>
    <th>Value</th>
</tr>

<tr>
    <td>Total Users</td>
    <td><?= $totalUsers ?></td>
</tr>

<tr>
    <td>Total Sellers</td>
    <td><?= $totalSellers ?></td>
</tr>

<tr>
    <td>Approved Sellers</td>
    <td><?= $approvedSellers ?></td>
</tr>

<tr>
    <td>Pending Seller Approvals</td>
    <td><?= $pendingSellers ?></td>
</tr>

<tr>
    <td>Total Orders</td>
    <td><?= $totalOrders ?></td>
</tr>

<tr>
    <td>Orders Today</td>
    <td><?= $todayOrders ?></td>
</tr>

<tr>
    <td>Total Revenue</td>
    <td><?= $totalRevenue ?> Tk</td>
</tr>
</table>

<br>

</body>
</html>
<?php include __DIR__ . '/../layout/footer.php'; ?>