<?php
    session_start();
    require_once "../Middleware/accountUtils.php";
    $role = "";
    $userInfo=array();
    if(isset($_SESSION['userId'])){
        $role= $_SESSION['userRole'];
        $userId = $_SESSION['userId'];
        $userInfo = $_SESSION["userInfo"];
    }
    else{
        header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <header>
        <a href="../Views/dashboard.php">Dashboard</a>
        <a href="../Views/profile.php">Profile</a>
        <?php if($_SESSION["userRole"] == "admin"){ ?>
            <a href="../Views/register.php">Add User</a>
        <?php }else{ ?>
            <a href="../Views/deposite.php">Deposite Money</a>
            <a href="../Views/withdraw.php">Withdraw Money</a>
            <a href="../Views/transfer.php">Transfer Money</a>
            <a href="../Views/transaction.php">See All Transaction</a>
        <?php } ?>
        <a href="../Controller/logout.php">Logout</a>
    </header>
    <main>
        <?php include "../Controller/withdraw.php"; ?>
        <h1>Withdraw Money</h1>
        <?php if(isset($message)){ ?>
            <p><?php echo $message; ?></p>
        <?php } ?>
        <form action="" method="POST">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount">
            <?php if(isset($errors["amount"])){ ?>
                <span><?php echo $errors["amount"]; ?></span>
            <?php } ?>
            <input type="submit" name="withdraw" value="Withdraw">
        </form>
    </main>
</body>
</html>