<?php
    require_once("../Middleware/userUtils.php");
    session_start();

    $message = "";

    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $userId = loginUser($username,$password);
        if($userId){
            $_SESSION["userId"] = $userId;
            header("Location: ../Views/dashboard.php");
        }else{
            $message = "Invalid username or password";
            header("Location: ../index.php?message={$message}");
        }
    }