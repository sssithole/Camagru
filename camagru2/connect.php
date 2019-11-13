<?php
$servername = "localhost";
$username = "root";
$password = "123456";

try {
   // $sql = "CREATE DATABASE IF NOT EXISTS camagru";
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS camagru";
    $conn->exec($sql);
    echo "Database created successfully<br>";
}catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}

try{

    $sql ="CREATE TABLE IF NOT EXISTS `camagru`.`users` (
        `id` INT NOT NULL AUTO_INCREMENT ,
        `user` VARCHAR(30) NOT NULL ,
        `email` VARCHAR(50) NOT NULL ,
        `passwd` VARCHAR(100) NOT NULL ,
        `notfications` BOOLEAN NOT NULL DEFAULT TRUE , 
        `verification_code` VARCHAR(225) NOT NULL ,
        `ver` BOOLEAN NOT NULL DEFAULT FALSE , PRIMARY KEY (`id`)) ENGINE = InnoDB;";


    $conn->exec($sql);
    echo "table created<br>";

}catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}
try{
    $pdo = "CREATE TABLE IF NOT EXISTS `camagru`.`gallery` (
        `name` VARCHAR(30) NOT NULL ,
        `comments` VARCHAR(100) NOT NULL ,
        `likes` BOOLEAN NOT NULL DEFAULT FALSE ,
        `images` VARCHAR(250) NOT NULL ) ENGINE = InnoDB;";
    $conn->exec($pdo);
    echo "table 2 <br>";    

}catch(PDOException $e){
    $e->getMessage();
}

?>