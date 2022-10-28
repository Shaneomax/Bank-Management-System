<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <?php 
        include("../Controller/userRegister.php");
        if(isset($errors)){
            foreach($errors as $error){
                echo $error."<br>";
            }
        }
    ?>
    <form action="" method="POST">
        <label for="name">Username</label>
        <input type="text" name="name" id="name">
        <br>

        <label for="firstName">First Name</label>
        <input type="text" name="firstName" id="firstName">
        <br>

        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" id="lastName">
        <br>

        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br>

        <label for="address">Address</label>
        <input type="text" name="address" id="address">
        <br>

        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone">
        <br>
        <label for="gender" id="gender">Gender</label>
        <select name="gender" id="gender">
            <option value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <br>

        <label for="accountType">Account Type</label>
        <select name="accountType" id="accountType">
            <option value="">Select Account Type</option>
            <option value="1">Fixed-Deposite</option>
            <option value="2">Savings</option>
        </select>
        <br>

        <label for="roles">Role</label>
        <select name="role" id="roles">
            <option value="">Select Role</option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
        <br>

        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>