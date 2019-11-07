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
   <!-- session_start(); -->
    <h1>WELCOME HOME BRO/GIRL</h1>
    <form action="change.php" method="POST">
        <!-- $_SESSION -->
    <!-- <button type="submit" name="home">home</button> -->
    <a href='abc.php'><button type="button" name="home">home</button></a> 
    <button type="submit" name="update">update</button>
    <a href='log.php'><button type="button" name="logout">logout</button></a> 
    </form>
</body>
</html>