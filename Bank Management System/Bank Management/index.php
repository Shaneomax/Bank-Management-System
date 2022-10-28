<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Management System</title>
</head>
<body>
    <h1>Welcome To Bank Management System</h1>
    <h2>Please Login</h2>
    <?php 
        if(isset($_GET["message"])){
            echo $_GET["message"];
        }
    ?>
    <form action="Controller/userLogin.php" method="post">
        <label for="username">Email:</label>
        <input type="text" name="username" id="username">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <input type="submit" name="login" value="Login">
    </form>
    <br>
    <a href="Views/register.php">Register</a>
</body>
</html>