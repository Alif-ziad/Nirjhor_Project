<?php
require_once("dbConnect.php");

function registerUser($name, $email, $password, $role, $shop_name = null, $shop_address = null)
{
    $conn = dbConnect();

    $is_approved = ($role === 'seller') ? 0 : 1;

    $query = "
        INSERT INTO users
        (name, email, password, role, shop_name, shop_address, is_approved)
        VALUES
        ('$name', '$email', '$password', '$role', '$shop_name', '$shop_address', '$is_approved')
    ";

    return mysqli_query($conn, $query);
}

function authUser($email, $pass)
{
    $conn = dbConnect();

    $query = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
    $data = mysqli_query($conn, $query);

    if ($data && mysqli_num_rows($data) === 1) {
        $user = mysqli_fetch_assoc($data);

        if ($user['role'] === 'seller' && $user['is_approved'] == 0) {
            return "NOT_APPROVED";
        }

        return $user;
    }

    return false;
}

function getAllSellers()
{
    $conn = dbConnect();
    $res = mysqli_query($conn, "SELECT * FROM users WHERE role='seller'");
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function getPendingSellers()
{
    $conn = dbConnect();
    $res = mysqli_query($conn, "SELECT * FROM users WHERE role='seller' AND is_approved=0");
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function approveSeller($id)
{
    $conn = dbConnect();
    return mysqli_query(
        $conn,
        "UPDATE users SET is_approved=1, status='approved' WHERE id='$id'"
    );
}


function denySeller($id)
{
    $conn = dbConnect();
    return mysqli_query($conn, "DELETE FROM users WHERE id='$id' AND role='seller'");
}
?>
