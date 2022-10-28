<?php
    function getConnection(){
        $host = "localhost";
        $user = "root";
        $pass = "root";
        $db = "bank_management_system";

        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }