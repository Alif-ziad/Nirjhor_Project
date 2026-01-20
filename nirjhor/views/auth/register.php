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

<h2>User Registration</h2>

<form action="../../controllers/authController.php" method="POST">

    <label>Full Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <label>Register As:</label><br>
    <input type="radio" name="role" value="customer" checked onclick="toggleSeller(false)"> Customer
    <input type="radio" name="role" value="seller" onclick="toggleSeller(true)"> Seller
    <br><br>

    <!-- Seller-only fields -->
    <div id="sellerFields" style="display:none;">
        <label>Shop Name:</label><br>
        <input type="text" name="shop_name"><br><br>

        <label>Shop Address:</label><br>
        <input type="text" name="shop_address"><br><br>
    </div>

    <input type="submit" name="register" value="Register">

</form>

<br>
<a href="login.php">Already have an account? Login</a>

<script>
function toggleSeller(show){
    document.getElementById("sellerFields").style.display = show ? "block" : "none";
}
</script>

</body>
</html>
