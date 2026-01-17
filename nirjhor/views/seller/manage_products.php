<?php
session_start();
require_once("../../models/productModel.php");

$sellerId= $_SESSION['id'];
$prodcuts= getProductsBySeller($sellerId);
?>

<h2>My Products</h2>
<table border="1">
<tr>
    <th>Name</th>
    <th>Price</th>
    <th>Status</th>
</tr>
