<?php
    session_start();
    require_once "../Middleware/userUtils.php";
    require_once "../Middleware/accountUtils.php";
    $role = "";
    $userInfo=array();
    if(isset($_SESSION['userId'])){
        $userId = $_SESSION['userId'];
        $userInfo = getUserAllInfo($userId);
        $role = getUserRole($userId);
        $_SESSION["userInfo"] = $userInfo;
        $_SESSION["userRole"] = $role;
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
    <?php if(isset($_GET["update"])){
        if($_GET["update"] == "fail"){
            echo "Update Failed";
        }
        else{
            echo "Update Successful";
        }
    }
    ?>
    <?php if(isset($_GET["delete"])){
        if($_GET["delete"] == "fail"){ 
            echo "Delete Failed";
        }
        else{
            echo "Delete Successful";
        }
    }
    ?>
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
        <?php if($_SESSION["userRole"] == "admin"){ ?>
            <h1>Welcome <?php echo $userInfo['name']; ?></h1>
        <?php $users=getAllUsers(); 
        if($users){
            $count = 0;
            foreach($users as $user){
               if($user['accounts_id'] != $userInfo['accounts_id']){
                    $count++;
               }
            }
            if($count > 0){
        ?>
                <h5>Total Accounts Are : <?php echo $count?> </h5>
                <p>User Details</p>
                <table border="1px">
                    <tr>
                        <th>Name</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th colspan="2">Action</th>
                    </tr>
                    <?php foreach($users as $user) {
                        if($user['id'] != $userInfo['id']){?>
                            <tr>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['first_name']; ?></td>
                            <td><?php echo $user['last_name']; ?></td>
                            <td><?php echo $user['sex'];?></td>
                            <td><?php echo $user['email'];?></td>
                            <td><?php echo $user['address'];?></td>
                            <td><?php echo $user['phone'];?></td>
                            <td><a href="../Controller/deleteuser.php?id=<?php echo $user['id'];?>">Delete</a></td>
                            <td><a href="../Views/edituser.php?id=<?php echo $user['id'];?>">Edit</a></td>
                            </tr>
                            <?php
                        }
                        }?>
                </table>
                <?php 
            }
            else{
                echo "No Users Available Right Now";
            }
        }
        else{
            echo "No Users Available Right Now";
        }
        ?>
        <?php }else{ ?>
            <h1>Welcome <?php echo $userInfo['name']; ?></h1>
            <h5>Your Account Details</h5>
            <h2>Account Number : <?php echo $userInfo['accounts_id'] ?></h2>
            <h3>Your Total Balance Is : <?php echo getBalance($userInfo['accounts_id'])?></h3>
            <?php } ?>
    </main>
</body>
</html>