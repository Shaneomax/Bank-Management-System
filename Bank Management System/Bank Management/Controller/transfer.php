<?php 
    include_once "../Middleware/accountUtils.php";

    $errors = array();
    $message = "";

    if(isset($_POST["transfer"])){
        $amount = $_POST["amount"];
        $accountNumber = $_SESSION["userInfo"]["accounts_id"];
        $to_accountNumber = $_POST["to_accountNumber"];

        if(empty($amount)){
            $errors["amount"] = "Amount is required";
        }elseif(!is_numeric($amount)){
            $errors["amount"] = "Amount must be a number";
        }elseif($amount < 0){
            $errors["amount"] = "Amount must be greater than 0";
        }

        if(empty($to_accountNumber)){
            $errors["to_accountNumber"] = "Receiver Account Number is required";
        }elseif(!is_numeric($to_accountNumber)){
            $errors["to_accountNumber"] = "Receiver Account Number must be a number";
        }elseif($to_accountNumber < 0){
            $errors["to_accountNumber"] = "Receiver Account Number must be greater than 0";
        }

        
        if(count($errors) == 0){ 
            if(checkAccountNumberExists($to_accountNumber)){
                if(transfer($accountNumber, $amount, $to_accountNumber)){
                    $message = "Transfer Successful";
                }else{
                    $message = "Transfer Failed";
                }
            }else{
                $message = "Receiver Account Number does not exists";
            }
        }
    }