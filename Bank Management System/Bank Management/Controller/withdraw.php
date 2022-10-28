<?php 
    include_once "../Middleware/accountUtils.php";

    $errors = array();
    $message = "";

    if(isset($_POST["withdraw"])){
        $amount = $_POST["amount"];
        $accountNumber = $_SESSION["userInfo"]["accounts_id"];

        if(empty($amount)){
            $errors["amount"] = "Amount is required";
        }elseif(!is_numeric($amount)){
            $errors["amount"] = "Amount must be a number";
        }elseif($amount < 0){
            $errors["amount"] = "Amount must be greater than 0";
        }
        
        if(count($errors) == 0){ 
            if(withdraw($accountNumber, $amount)){
                $message = "Withdraw Successful";
            }else{
                $message = "Insufficient Balance";
            }
        }
    }