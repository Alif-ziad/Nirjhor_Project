<?php
session_start();
require_once '../../controllers/productController.php';
require_once "../../models/productModel.php";
$products = getApprovedProducts();
?>

<!doctype html>
<html>
    <head>
        <title>Nirjhor</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
<body>

    <h2>Nirjhor</h2>
    <div class="nav">
        <?php if (!isset($_SESSION['id'])) {

            echo '<form action="../auth/login.php" method="get">
                    <button type="submit">Login</button>
                  </form>';

            echo '<form action="../auth/register.php" method="get">
                    <button type="submit">Sign Up</button>
                  </form>';

        } else {

            if ($_SESSION['role'] == 'customer') {
                echo '<a href="cart.php"><button>Cart</button> </a>';
            }

            if ($_SESSION['role'] == 'seller') {
                echo '<a href="../seller/dashboard.php"><button>dashboard</button> </a>';
            }

            if ($_SESSION['role'] == 'admin') {
                echo '<a href="../admin/dashboard.php"><button>dashboard</button> </a>';
            }

            echo '<a href="../auth/logout.php">
                    <button>Logout</button>
                  </a>';
        }
        ?>
    </div>
    <div class="products">
        <?php foreach ($products as $p): ?>
          <div style="border:1px solid #000; width:200px; padding:10px; margin:10px; display:inline-block;">
            <img src="<?= $p['image'] ?>" width="150"><br>
            <b><?= $p['name'] ?></b><br>
            Price:<?= $p['price'] ?><br>
          </div>
    <?php endforeach; ?>
    </div>
</body>
</html>

