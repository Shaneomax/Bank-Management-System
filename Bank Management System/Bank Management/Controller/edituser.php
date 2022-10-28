<?php
    require_once "../Middleware/userUtils.php";

    function sanitizeInput($input){
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    $errors = array();

    if(isset($_POST["submit"])){
        $id = $_POST["id"];
        $name = sanitizeInput($_POST["name"]);
        $firstName = sanitizeInput($_POST["firstName"]);
        $lastName = sanitizeInput($_POST["lastName"]);
        $email = sanitizeInput($_POST["email"]);
        $address = sanitizeInput($_POST["address"]);
        $phone = sanitizeInput($_POST["phone"]);
        $gender = $_POST["gender"];

        if(empty($name)){
            $errors["name"]="Name Required";
        }

        if(empty($firstName)){
            $errors["firstName"]="First Required";
        }


        if(empty($lastName)){
            $errors["lastName"]="Last Required";
        }

        if(empty($address)){
            $errors["address"]="Address Required";
        }

        if(empty($phone)){
            $errors["phone"]="Phone Required";
        }


        if(empty($email)){
            $errors["email"]="Email Required";
        }

        if(count($errors) == 0){
            if(updateUser($id, $name, $firstName, $lastName, $email, $address, $phone, $gender)){
                header("Location:../Views/dashboard.php");
            }
            else{
                header("Location:../Views/dashboard.php?update=fail");
            }
        }
    }