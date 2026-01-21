<?php
session_start();
require_once("../models/userModel.php");

/* ================= ADMIN ACTIONS (GET) ================= */
if (isset($_GET['approveSeller'])) {

    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        header("Location: ../views/auth/login.php");
        exit();
    }

    approveSeller($_GET['approveSeller']);
    header("Location: ../views/admin/manage_users.php");
    exit();
}

if (isset($_GET['denySeller'])) {

    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        header("Location: ../views/auth/login.php");
        exit();
    }

    denySeller($_GET['denySeller']);
    header("Location: ../views/admin/manage_users.php");
    exit();
}

/* ================= POST REQUESTS ================= */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    /* ================= LOGIN ================= */
    if (isset($_POST['submit'])) {

        $email  = trim($_POST['email'] ?? "");
        $pass = trim($_POST['password'] ?? "");

        if (empty($email) || empty($pass)) {
            header("Location: ../views/auth/login.php?genErr=Fields cannot be empty");
            exit();
        }

        $user = authUser($email, $pass);

        if ($user === "NOT_APPROVED") {
            header("Location: ../views/auth/login.php?genErr=Seller not approved yet");
            exit();
        }

        if (!$user) {
            header("Location: ../views/auth/login.php?genErr=Invalid ID or password");
            exit();
        }
        $_SESSION['id'] = $user['id'];
        $_SESSION['email']   = $user['email'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] === 'admin') {
            header("Location: ../views/admin/dashboard.php");
        } elseif ($user['role'] === 'seller') {
            header("Location: ../views/seller/dashboard.php");
        } else {
            header("Location: ../views/customer/products.php");
        }
        exit();
    }

    /* ================= REGISTER ================= */
    if (isset($_POST['register'])) {

        registerUser(
            $_POST['name'],
            $_POST['email'],
            $_POST['password'],
            $_POST['role'],
            $_POST['shop_name'] ?? null,
            $_POST['shop_address'] ?? null
        );

        header("Location: ../views/auth/login.php");
        exit();
    }
}
?>
