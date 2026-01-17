<?php
session_start();
require_once("../models/productModel.php");

if(isset($_POST['addProduct']))
    {
        addProduct(
            $_POST['name'],
            $_POST['price'],
            $_POST['description'],
            $_SESSION['id']    
        );
        header("Location: ../views/seller/dashboard.php");
        exit();
    }

    if(isset($_GET['approve']))
        {
            approveProduct($_GET['approve']);
            header("Location: ../views/admin/dashboard.php");
            exit();
        }
        ?>