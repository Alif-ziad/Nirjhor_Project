<?php
require_once("dbConnect.php");

function registerUser($name, $email, $password, $role, $shop_name = null, $shop_address = null)
{
    $conn = dbConnect();

    // Only sellers need approval
    if ($role === 'seller') {
        $is_approved = 0; // pending
    } else{
        $is_approved = 1; // customer/admin auto-approved
    }

    $query = "
        INSERT INTO users
        (name, email, password, role, shop_name, shop_address, is_approved)
        VALUES
        ('$name', '$email', '$password', '$role', '$shop_name', '$shop_address', '$is_approved')
    ";

    return mysqli_query($conn, $query);
}

function authUser($id, $pass)
{
    $conn = dbConnect();

    $query = "SELECT * FROM users WHERE id='$id' AND password='$pass'";
    $data = mysqli_query($conn, $query);

    if ($data && mysqli_num_rows($data) === 1) {
        $user = mysqli_fetch_assoc($data);

        // Only sellers can be pending
        if ($user['role'] === 'seller' && $user['is_approved'] == 0) {
            return "NOT_APPROVED";
        }

        return $user;
    }

    return false;
}



/* Admin helpers (used later, unchanged logic) */
function getPendingSellers()
{
    $conn = dbConnect();
    $res = mysqli_query($conn, "SELECT * FROM users WHERE role='seller' AND is_approved=0");
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function approveSeller($id)
{
    $conn = dbConnect();
    return mysqli_query($conn, "UPDATE users SET is_approved=1 WHERE id='$id'");
}
?>
