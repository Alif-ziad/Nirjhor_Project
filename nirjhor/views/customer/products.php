<?php
session_start();
require_once '../../controllers/productController.php';

//$products = getApprovedProducts();
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
