<?php 
    require_once '../Model/userModel.php';
    require_once 'config.php';
    require_once 'accountUtils.php';

    $GLOBALS['conn'] = getConnection();

    function insertUser($name,$firstName,$lastName,$email,$password,$address,$phone,$gender,$accountType,$role){
        $accountNumber = insertAccount($accountType);
        $sql = "INSERT INTO users (name,first_name,last_name,email,password,address,phone,sex,accounts_id)
        VALUES('{$name}','{$firstName}','{$lastName}','{$email}','{$password}','{$address}','{$phone}','{$gender}','{$accountNumber}')";
        $GLOBALS['conn']->exec($sql);
        $sql = "SELECT id from users WHERE accounts_id='{$accountNumber}'";
        $result = $GLOBALS['conn']->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if($row){
            $userId=$row['id'];
            if(insertRole($userId,$role)){
                insertBalacnce($accountNumber,0);
                return $accountNumber;
            }
            else{
                return false;
            }
        }
    }

    function insertRole($userId,$role){
        $sql = "INSERT INTO roles (users_id,name) VALUES('{$userId}','{$role}')";
        $GLOBALS['conn']->exec($sql);
        return true;
    }

    function insertBalacnce($accountNumber,$balance){
        $sql = "INSERT INTO balance (accounts_id,balance) VALUES('{$accountNumber}','{$balance}')";
        $GLOBALS['conn']->exec($sql);
    }

    function loginUser($username,$password){
        $stmt = "SELECT id FROM users WHERE email = '{$username}' AND password = '{$password}'";
        $result = $GLOBALS['conn']->query($stmt);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if($row){
            return $row['id'];
        }else{
            return false;
        }
    }

    function getUserAllInfo($id){
        $stmt = "SELECT * FROM users WHERE id = '{$id}'";
        $result = $GLOBALS['conn']->query($stmt);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if($row){
            return $row;
        }else{
            return false;
        }
    }

    function getUserRole($id){
        $stmt = "SELECT name FROM roles WHERE users_id = '{$id}'";
        $result = $GLOBALS['conn']->query($stmt);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if($row){
            return $row['name'];
        }else{
            return false;
        }
    }

    function getAllUsers(){
        $stmt = "SELECT * FROM users";
        $result = $GLOBALS['conn']->query($stmt);
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        if($row){
            return $row;
        }else{
            return false;
        }
    }

    function updateUser($id,$name,$firstName,$lastName,$email,$address,$phone,$gender){
        $stmt = "UPDATE users SET name = '{$name}', first_name = '{$firstName}', last_name = '{$lastName}', email = '{$email}', address = '{$address}', phone = '{$phone}', sex = '{$gender}' WHERE id = '{$id}'";
        if($GLOBALS['conn']->exec($stmt)){
            return true;
        }else{
            return false;
        }
    }

    function deleteUser($id){
        $stmt = "DELETE FROM roles WHERE users_id = '{$id}'";
        if($GLOBALS['conn']->exec($stmt)){
            $stmt = "DELETE FROM users WHERE id = '{$id}'";
            if($GLOBALS['conn']->exec($stmt)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }