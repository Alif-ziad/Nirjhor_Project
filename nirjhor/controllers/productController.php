<?php

if(session_status() === PHP_SESSION_NONE)
    {
session_start();
    }
require_once(__DIR__ . "/../models/productModel.php");

if(isset($_POST['addProduct']))
    {
        if($_SESSION['role'] != 'seller')
            {
                header("Location: ../views/auth/login.php");
                exit();
            }

        $name=$_POST['name'];
        $price=$_POST['price'];
        $desc= $_POST['description'];
        $sellerId=$_SESSION['id'];

        $imgName = $_FILES['image']['name'];
        $tmpName = $_FILES['image']['tmp_name'];
        $imgPath = "../assets/images/".time()."_".$imgName;
        move_uploaded_file($tmpName, $imgPath);

        addProduct($name, $price, $desc, $sellerId, $imgPath);
        header("Location: ../views/seller/dashboard.php");
        exit();
    }

    if(isset($_POST['updateProduct']))
        {
            updateProduct(
                $_POST['product_id'],
                $_POST['name'],
                $_POST['price'],
                $_POST['description']
            );
            header("Location: ../views/seller/manage_products.php");
            exit();
        }

    if(isset($_POST['deleteProduct']))
        {
                deleteProduct($_POST['product_id']);
                header("Location: ../views/seller/manage_products.php");
                exit();
        }

        if(isset($_GET['approve']))
        {
                approveProduct($_GET['approve']);
                header("Location: ../views/admin/approve_products.php");
                exit();
        }

        if(isset($_GET['deny']))
        {
                denyProduct($_GET['deny']);
                header("Location: ../views/admin/approve_products.php");
                exit();
        }
?>