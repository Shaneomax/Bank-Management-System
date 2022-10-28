<?php
    session_start();
    if(!isset($_SESSION['userId'])){
        header("Location:../index.php");
    }
    require_once "../Middleware/userUtils.php";

    $userId = "";
    if(isset($_GET["id"])){
        $userId = $_GET["id"];
    }
    $userInfo = getUserAllInfo($userId);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <?php include "../Controller/edituser.php"?>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $userId ?>">

        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?php echo $userInfo['name']; ?>">
        <?php if(isset($errors["name"])){ ?>
            <?php echo $errors["name"]; ?>
        <?php } ?>
        <br>

        <label for="firstName">First Name</label>
        <input type="text" name="firstName" id="firstName" value="<?php echo $userInfo['first_name']; ?>">
        <?php if(isset($errors["firstName"])){ ?>
            <?php echo $errors["firstName"]; ?>
        <?php } ?>
        <br>

        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" id="lastName" value="<?php echo $userInfo['last_name']; ?>">
        <?php if(isset($errors["lastName"])){ ?>
            <?php echo $errors["lastName"]; ?>
        <?php } ?>
        <br>

        <label for="gender">Gender</label>
        <input type="text" name="gender" id="gender" value="<?php echo $userInfo['sex'] ?>" readonly>
        <br>

        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="<?php echo $userInfo['email'] ?>">
        <?php if(isset($errors["lastName"])){ ?>
            <?php echo $errors["lastName"]; ?>
        <?php } ?>
        <br>

        <label for="address">Address</label>
        <input type="text" name="address" id="address" value="<?php echo $userInfo['address'] ?>">
        <?php if(isset($errors["address"])){ ?>
            <?php echo $errors["address"]; ?>
        <?php } ?>
        <br>

        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value="<?php echo $userInfo['phone'] ?>">
        <?php if(isset($errors["phone"])){ ?>
            <?php echo $errors["phone"]; ?>
        <?php } ?>
        <br>

        <input type="submit" name="submit" value="Update">
</body>
</html>