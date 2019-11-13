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
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
   <!-- session_start(); -->
    <h1>WELCOME HOME </h1>
    <form action="change.php" method="POST">
        <!-- $_SESSION -->
    <!-- <button type="submit" name="home">home</button> -->
    <a href='abc.php'><button type="button" name="home">home</button></a> 
    <button type="submit" name="update">update</button>
    <!-- <button type="button" name="logout">logout</button></a>  -->
    <a href='logout.php'><button type="button" name="logout">logout</button></a>
    <a href='setup.php'><button type="button" name="comment">Coment</button></a> 
    <a href='camera.php'><button type="button" name="comment">Camera</button></a> 
    </form>
    <?php
        include_once('connect.php');
        
        try{
        $sql = $conn->prepare("SELECT * FROM `camagru`.`gallery` ORDER BY `name` DESC");
        $sql->execute();
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
           
               echo '<A href= "#">
                <DIV class="gallery-image" style= "background-image: url(uploads/'.$row['images'].');"></DIV>
                <h3>PICTURE</h3>
                </A>';
               //<h3>'.$row['image_uploader_id'].'<h3>
               // <p> '.$row['image_caption'].'<p>
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    ?>
</body>
</html>