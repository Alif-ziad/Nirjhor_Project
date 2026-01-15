<?php
session_start();
require_once("../models/userModel.php");
if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $hasErr=false;
        $idErr;
        $passErr;
        $id=$_POST["id"];
        $pass=$_POST["password"];
 if(empty($userId) && empty($pass))
    {
        $hasErr=true;
        $idErr="user Id cannot be empty";
        $passErr="password cannot be empty";
        header("Location: ../views/auth/login.php?idErr=".$idErr."&passErr=".$passErr);

    }

    else
    {
        $user=authUser($id,$pass);
        if($user)
            {
                if($user['role']=="admin")
                {
                       
                $_SESSION['id']=$user['id'];
                $_SESSION['role']=$user['role'];
                header("Location: ../views/customer/products.php");
                }

                if($user['role']=="seller")
                {
                $_SESSION['id']=$user['id'];
                $_SESSION['role']=$user['role'];
                header("Location: ../views/customer/products.php");
                }

                if($user['role']=="customer")
                {
                $_SESSION['id']=$user['id'];
                $_SESSION['role']=$user['role'];
                header("Location: ../views/customer/products.php");
                }
            }
             else
                {
                    header("Location: ../views/auth/login.php?genErr=id or password didn't match");
                    exit();
                }
    

    }

    }

?>
