<?php
session_start();
?>
<link rel="stylesheet" href="../css/style.css">
<body>
    
    <header class="site-header">
        <div class="header-container">
            <div class="logo-section">
                <a href="dashboard.php" class="logo-link">
                    <img src="../../assets/images/logo.png" alt="Logo" class="logo-img">
                    <span class="site-name">SELLER PANEL</span>
                </a>
            </div>
            
            <div class="header-buttons">
               
                <a href="manage_products.php" class="btn-header btn-login">Manage Products</a>
                <a href="../auth/logout.php" class="btn-header btn-logout">Logout</a>
            </div>
        </div>
    </header>

</body>
<h2>Add Product </h2>

<form action="../../controllers/productController.php" method="POST" enctype="multipart/form-data">

<input type="text" name="name" placeholder="product Name" required><br>
<input type="number" name="price" placeholder="Price" required><br>
<textarea name="description" placeholder="Product details"></textarea><br>
Image:
<input type="file" name="image" required><br><br>
<input type="submit" name="addProduct" value="Add Product"><br><br>
<a href="add_product.php">
    <button type="button">Reset</button>
</a><br><br>
<a href="dashboard.php">
    <button type="button">Return to Dashboard</button>
</a><br><br>
</form>
<?php include __DIR__ . '/../layout/footer.php'; ?>