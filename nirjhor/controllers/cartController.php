<?php
session_start();
require_once("../models/productModel.php");

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'customer') {
    header("Location: ../views/auth/login.php");
    exit();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['add'])) {

    $productId = $_GET['add'];

    // ✅ FIX: fetch product directly
    $product = getProductById($productId);

    if (!$product) {
        header("Location: ../views/customer/products.php");
        exit();
    }

    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity']++;
    } else {
        $_SESSION['cart'][$productId] = [
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => 1
        ];
    }

    header("Location: ../views/customer/cart.php");
    exit();
}
