<?php
require_once("dbConnect.php");

function createOrder($customer_id, $address, $total)
{
    $conn = dbConnect();

    $query = "INSERT INTO orders (customer_id, address, total_amount)
              VALUES ('$customer_id', '$address', '$total')";

    mysqli_query($conn, $query);

    return mysqli_insert_id($conn);
}

function addOrderItem($order_id, $product_name, $price, $quantity)
{
    $conn = dbConnect();

    $query = "INSERT INTO order_items 
              (order_id, product_name, price, quantity)
              VALUES 
              ('$order_id', '$product_name', '$price', '$quantity')";

    return mysqli_query($conn, $query);
}

function getSellerOrders($sellerId)
{
    $conn = dbConnect();

    $query = "
        SELECT oi.order_id, oi.product_name, oi.price, oi.quantity
        FROM order_items oi
        JOIN products p ON oi.product_name = p.name
        WHERE p.seller_id = '$sellerId'
    ";

    $res = mysqli_query($conn, $query);
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function getAdminReport()
{
    $conn = dbConnect();

    $users = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT COUNT(*) AS total FROM users")
    )['total'];

    $orders = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT COUNT(*) AS total FROM orders")
    )['total'];

    $revenue = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT SUM(total) AS sum FROM orders")
    )['sum'] ?? 0;

    return [
        'users' => $users,
        'orders' => $orders,
        'revenue' => $revenue
    ];
}


?>
