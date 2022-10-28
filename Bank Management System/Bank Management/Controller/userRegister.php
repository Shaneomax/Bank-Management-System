<?php
    require_once '../Middleware/userUtils.php';
    require_once '../Model/userModel.php';

    $errors = array();

    function sanitizeInput($input){
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    if(isset($_POST['register'])){

        $name = sanitizeInput($_POST['name']);
        $firstName = sanitizeInput($_POST['firstName']);
        $lastName = sanitizeInput($_POST['lastName']);
        $email = sanitizeInput($_POST['email']);
        $password = sanitizeInput($_POST['password']);
        $address = sanitizeInput($_POST['address']);
        $phone = sanitizeInput($_POST['phone']);
        $gender = sanitizeInput($_POST["gender"]);
        $accountType = sanitizeInput($_POST["accountType"]);
        $role = $_POST["role"];

        //validate data

        $isValid = true;

        if(empty($name)){
            $isValid = false;
            $errors["username"] = "Username Required";
        }

        if(empty($firstName)){
            $isValid = false;
            $errors["firstName"] = "First Name Required";
        }

        if(empty($lastName)){
            $isValid = false;
            $errors["lastName"] = "Last Name Required";
        }

        if(empty($email)){
            $isValid = false;
            $errors["email"] = "Email Required";
        }

        if(empty($password)){
            $isValid = false;
            $errors["password"] = "Password Required";
        }

        if(empty($address)){
            $isValid = false;
            $errors["address"] = "Address Required";
        }

        if(empty($phone)){
            $isValid = false;
            $errors["phone"] = "Phone Number Required";
        }

        if(empty($accountType)){
            $isValid = false;
            $errors["accountType"] = "Account Type Required";
        }

        if(empty($role)){
            $isValid = false;
            $errors["role"] = "Role Required";
        }

        if($isValid){
            $accountNumber = insertUser($name,$firstName,$lastName,$email,$password,$address,$phone,$gender,$accountType,$role);
            echo $accountNumber;
        }
    }