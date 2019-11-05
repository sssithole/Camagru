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
   
    <h1>hello name</h1>
    <form action="change.php" method="POST">
    <button type="submit" name="home">home</button>
    <button type="submit" name="update">update</button>
    </form>
</body>
</html>