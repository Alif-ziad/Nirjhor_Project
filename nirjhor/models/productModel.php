<?php
require_once("dbConnect.php");

function addProduct($name, $price, $desc, $sellerId, $image)
{
    $conn = dbConnect();
    $query = "
        INSERT INTO products 
        (name, price, description, seller_id, image, status)
        VALUES 
        ('$name', '$price', '$desc', '$sellerId', '$image', 'pending')
    ";
    return mysqli_query($conn, $query);
}

function getSellerProducts($sellerId)
{
    $conn = dbConnect();
    $res = mysqli_query($conn, "SELECT * FROM products WHERE seller_id ='$sellerId'");
    return mysqli_fetch_all($res,MYSQLI_ASSOC);
}

function getPendingProducts()
{
    $conn = dbConnect();
    $res = mysqli_query($conn, "SELECT * FROM products WHERE status ='pending'");
    return mysqli_fetch_all($res,MYSQLI_ASSOC);
}

function getApprovedProducts()
{
    $conn = dbConnect();
    $res = mysqli_query($conn, "SELECT * FROM products WHERE status ='approved'");
    return mysqli_fetch_all($res,MYSQLI_ASSOC);
}

function approveProduct($product_id)
{
    $conn = dbConnect();
    return mysqli_query($conn, "UPDATE products SET status='approved' WHERE product_id='$product_id'");
}

function denyProduct($product_id)
{
    $conn = dbConnect();
    return mysqli_query($conn, "UPDATE products SET status='denied' WHERE product_id='$product_id'");
}



function updateProduct($product_id, $name, $price, $desc)
{
    $conn = dbConnect();
    return mysqli_query($conn, "UPDATE products SET name='$name', price='$price', description='$desc' WHERE product_id='$product_id'");
}
function deleteProduct($product_id)
{
    $conn = dbConnect();
    return mysqli_query($conn, "DELETE FROM products WHERE product_id='$product_id'");
}

function getProductById($id)
{
    $conn = dbConnect();
    $res = mysqli_query($conn, "SELECT * FROM products WHERE product_id='$id'");
    return mysqli_fetch_assoc($res);
}

?>
