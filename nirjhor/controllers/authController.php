<?php
session_start();
require_once("../models/userModel.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    /* ================= LOGIN ================= */
    if (isset($_POST['submit'])) {

        $id = trim($_POST['id'] ?? "");
        $pass = trim($_POST['password'] ?? "");

        if (empty($id) || empty($pass)) {

            $idErr = empty($id) ? "User ID required" : "";
            $passErr = empty($pass) ? "Password required" : "";

            header("Location: ../views/auth/login.php?idErr=$idErr&passErr=$passErr");
            exit();
        }

        $user = authUser($id, $pass);

        if ($user === "NOT_APPROVED") {
            header("Location: ../views/auth/login.php?genErr=Seller not approved yet");
            exit();
        }

        if (!$user) {
            header("Location: ../views/auth/login.php?genErr=Invalid ID or password");
            exit();
        }

        // Login success
        $_SESSION['id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        // Role-based redirect
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

        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $pass = $_POST['password'];
        $role = $_POST['role'];
        $shop_name = $_POST['shop_name'] ?? null;
        $shop_address = $_POST['shop_address'] ?? null;

        if (empty($name) || empty($email) || empty($pass)) {
            header("Location: ../views/auth/register.php?err=Empty fields");
            exit();
        }

        registerUser($name, $email, $pass, $role, $shop_name, $shop_address);

        header("Location: ../views/auth/login.php");
        exit();
    }
}
?>
