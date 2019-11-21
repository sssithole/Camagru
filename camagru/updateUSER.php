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
<form action="updateUserf.php" method="POST">
    
    username<input type="text" name="username" required><br>
    e-mail<input type="email" name="email" required><br>
    password<input type="password" name="password" required><br>
    <button type="submit" name="update">update</button>
    <!-- ?php $_GET['user']?> -->
    </form>
</body>
</html>