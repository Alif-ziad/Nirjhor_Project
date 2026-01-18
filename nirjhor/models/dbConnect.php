<?php
$host="localhost";
$user="root";
$password="";
$dbName="nirjhor";
$port=3306;

function dbConnect()
{
    global $host;
    global $user;
    global $password;
    global $dbName;
    global $port;
    $conn=mysqli_connect($host, $user, $password, $dbName, $port);

    if(!$conn)
        {
            echo "not connected";
        }
    return $conn;
}
?>