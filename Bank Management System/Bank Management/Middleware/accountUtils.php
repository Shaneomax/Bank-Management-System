<?php 
    require_once '../Model/accountModel.php';
    require_once 'config.php';

    $GLOBALS['conn'] = getConnection();

    //random number generator
    function generateRandomNumber(){
        return rand(111111111111,999999999999);
    }

    function insertAccount($account_type_id){
        $accountNumber = generateRandomNumber();
        if(!checkAccountNumberExists($accountNumber)){
            $sql = "INSERT INTO accounts (number,account_types_id) VALUES ('$accountNumber','$account_type_id')";
            $GLOBALS['conn']->exec($sql);
            return $accountNumber;
        }else{
            return insertAccount($account_type_id);
        }
    }

    function checkAccountNumberExists($accountNumber){
        $sql = "SELECT * FROM accounts WHERE number = :accountNumber";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':accountNumber',$accountNumber);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if(count($result)>0){
            return true;
        }else{
            return false;
        }
    }

    function getBalance($accountNumber){
        $sql = "SELECT * FROM balance WHERE accounts_id = :accountNumber";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':accountNumber',$accountNumber);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if(count($result)>0){
            return $result[0]['balance'];
        }else{
            return false;
        }
    }

    function deposite($accountNumber,$amount){
        $balance = getBalance($accountNumber);
        $newBalance = $balance + $amount;
        $sql = "UPDATE balance SET balance = '$newBalance' WHERE accounts_id = '$accountNumber'";
        $GLOBALS['conn']->exec($sql);
        $sql2 = "INSERT INTO deposites (account_number,amount,deposite_at) VALUES ('$accountNumber','$amount','".date("Y-m-d H:i:s")."')";
        return $GLOBALS['conn']->exec($sql2);
    }

    function withdraw($accountNumber,$amount){
        $balance = getBalance($accountNumber);
        if($balance >= $amount){
            $newBalance = $balance - $amount;
            $sql = "UPDATE balance SET balance = '$newBalance' WHERE accounts_id = '$accountNumber'";
            $GLOBALS['conn']->exec($sql);
            $sql2 = "INSERT INTO withdraws (account_number,amount,withdraw_at) VALUES ('$accountNumber','$amount','".date("Y-m-d H:i:s")."')";
            return $GLOBALS['conn']->exec($sql2);
        }else{
            return false;
        }
    }

    function transfer($accountNumber,$amount,$toAccountNumber){
        $balance = getBalance($accountNumber);
        if($balance >= $amount){
            $newBalance = $balance - $amount;
            $sql = "UPDATE balance SET balance = '$newBalance' WHERE accounts_id = '$accountNumber'";
            $GLOBALS['conn']->exec($sql);
            $sql2 = "INSERT INTO transfers (account_number,amount,to_account_number,transfer_at) VALUES ('$accountNumber','$amount','$toAccountNumber','".date("Y-m-d H:i:s")."')";
            $GLOBALS['conn']->exec($sql2);
            $toBalance = getBalance($toAccountNumber);
            $newBalance = $toBalance + $amount;
            $sql3 = "UPDATE balance SET balance = balance + '$newBalance' WHERE accounts_id = '$toAccountNumber'";
            return $GLOBALS['conn']->exec($sql3);
        }else{
            return false;
        }
    }

    function getAllDeposites($accountNumber){
        $sql = "SELECT * FROM deposites WHERE account_number = :accountNumber";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':accountNumber',$accountNumber);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function getAllWithdraws($accountNumber){
        $sql = "SELECT * FROM withdraws WHERE account_number = :accountNumber";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':accountNumber',$accountNumber);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function getAllTransfers($accountNumber){
        $sql = "SELECT * FROM transfers WHERE account_number = :accountNumber";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':accountNumber',$accountNumber);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }