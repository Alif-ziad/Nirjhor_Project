<?php?>
<!doctype html>
<html>
    <head>
        <title>Login - Nirjhor</title>
        <link rel="stylesheet" href ="../css/style.css">
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
                <a href="../customer/products.php" class="btn-header btn-login">Return to Home</a>
            </div>
        </div>
    </header>

    <h2>Login</h2>
    <form action="../../controllers/authController.php" method="POST">
        Enter E-mail:
        <input type="email" name="email" placeholder="Input Email"><br>
        <span name="emailErr"><?php if(isset($_GET["emailErr"])){echo $_GET["emailErr"];}?></span><br>
        Password:
        <input type="password" name="password"placeholder="password"><br>
        <span name="passErr"><?php if(isset($_GET["passErr"])){echo $_GET["passErr"];}?></span><br>
        <span name="genErr"><?php if(isset($_GET["genErr"])){echo $_GET["genErr"];}?></span>
        <input type="submit" name="submit" value="submit">
    </form>
    <p style="text-align:center;">
        Don't have an account? <a href="register.php">Sign up here</a>
    </p>
    
</body>
</html>

<?php include __DIR__ . '/../layout/footer.php'; ?>
