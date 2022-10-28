<?php 
    require_once "../Middleware/userUtils.php";

    if(isset($_GET["id"])){
        $userId = $_GET["id"];
    }

    if(deleteUser($userId)){
        header("Location:../Views/dashboard.php");
    }
    else{
        header("Location:../Views/dashboard.php?delete=fail");
    }