<?php
    session_start();
    $userInfo = array();
    $role = "";
    if(isset($_SESSION['userId'])){
        $userInfo = $_SESSION["userInfo"];
        $role = $_SESSION["userRole"];
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
    <title>Profile</title>
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
        <h1>Personal Information <span><a href="../Views/edituser.php?id=<?php echo $userInfo['id'];?>">Edit</a></span></h1>
        <p>Role : <?php echo $role; ?></p>
        <p>Name : <?php echo $userInfo['name']; ?></p>
        <p>Email : <?php echo $userInfo['email']; ?></p>
        <p>Phone Number : <?php echo $userInfo['phone']; ?></p>
        <p>Address : <?php echo $userInfo['address']; ?></p>
</body>
</html>