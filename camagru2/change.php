<?php
    session_start();

    var_dump($_SESSION);
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
<form action="register.php" method="POST">
    
    username<input type="text" name="user" required><br>
    e-mail<input type="email" name="email" required><br>
    password<input type="password" name="passwd" required><br>
    <button type="submit" name="update">update</button>
    <?php $_GET['user']?>
    </form>
</body>
</html>