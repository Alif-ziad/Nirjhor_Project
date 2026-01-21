<?php
session_start();
require_once("../models/orderModel.php");

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'customer') {
    header("Location: ../views/auth/login.php");
    exit();
}

if (isset($_POST['place_order'])) {

    if (empty($_SESSION['cart'])) {
        header("Location: ../views/customer/cart.php");
        exit();
    }

    $address = trim($_POST['address']);
    $customer_id = $_SESSION['id'];

    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    $order_id = createOrder($customer_id, $address, $total);

    foreach ($_SESSION['cart'] as $item) {
        addOrderItem(
            $order_id,
            $item['name'],
            $item['price'],
            $item['quantity']
        );
    }

    unset($_SESSION['cart']);

    header("Location: ../views/customer/orders.php");
    exit();
}
