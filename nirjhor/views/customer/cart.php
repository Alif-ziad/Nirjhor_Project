<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'customer') {
    header("Location: ../auth/login.php");
    exit();
}
echo "cart";
?>