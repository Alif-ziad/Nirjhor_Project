<?php
session_start();
?>

<!doctype html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
        
    <header class="site-header">
        <div class="header-container">
            <div class="logo-section">
                <a href="../customer/products.php" class="logo-link">
                    <img src="../../assets/images/logo.png" alt="Logo" class="logo-img">
                    <span class="site-name">NIRJHOR</span>
                </a>
            </div>
            
            <div class="header-buttons">
                <a href="../customer/products.php" class="btn-header btn-login">Return to home</a>
            </div>
        </div>
    </header>

<h2>User Registration</h2>

<form action="../../controllers/authController.php" method="POST">

    <label>Full Name:</label>
    <input type="text" name="name" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <label>Register As:</label>
    <input type="radio" name="role" value="customer" checked onclick="toggleSeller(false)"> Customer
    <input type="radio" name="role" value="seller" onclick="toggleSeller(true)"> Seller
    <br><br>
    <div id="sellerFields" style="display:none;">
        <label>Shop Name:</label>
        <input type="text" name="shop_name"><br>

        <label>Shop Address:</label>
        <input type="text" name="shop_address"><br>
    </div>

    <input type="submit" name="register" value="Register">
<br>
<script>
function toggleSeller(show){
    document.getElementById("sellerFields").style.display = show ? "block" : "none";
}
</script>
</form>
<p style="text-align:center;">
        Already have an account? <a href="login.php">Login here</a>
    </p>
</body>
</html>

<?php include __DIR__ . '/../layout/footer.php'; ?>
