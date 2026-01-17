<?php
require_once("dbConnect.php");

function addProduct($name, $price, $desc, $sellerId)
{
    $conn = dbConnect();
    $query = "INSERT INTO products VALUES('', '$name', '$price', 'desc', '$seller_id', 'pending')";
    return mysqli_query($conn, $query);
}

function getPendingProducts()
{
    $conn = dbConnect();
    $query = "SELECT * FROM products WHERE status= 'pending'";
    return mysqli_query($conn, $query);
}

function approveProduct($id)
{
    $conn = dbConnect();
    $query = "UPDATE products SET status='approved' WHERE product_id=$id'";
    return mysqli_query($conn, $query);
}

function getApprovedProducts()
{
    $conn = dbConnect();
    $query = "SELECT * FROM products WHERE status= 'approved'";
    return mysqli_query($conn, $query);
}
?>
