<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="POST">
    username<input type="text" name="username" required><br>
    password<input type="password" name="password" required><br>
    <button type="submit" name="login">login</button><br>
    <br>fogot password<a href='fogotform.php'><button type="button" >forgot password</button></a>
    <br>if dont have an account<a href='regform.php'><button type="button" >signup</button></a>
    </form>
</body>
</html>