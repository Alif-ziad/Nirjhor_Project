<?php
require_once("dbConnect.php");

function authUser($id, $pass)
{
    $query="SELECT * FROM users WHERE id='$id' AND password='$pass'";
    $conn=dbConnect();
    $data=mysqli_query($conn, $query);
    $users;
    if(mysqli_num_rows($data)>0)
        {
            while($rows=mysqli_fetch_assoc($data))
                {
                    $users=$rows;
                }
        }

        return $users;
}
?>