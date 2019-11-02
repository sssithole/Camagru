<?php

if(isset($_POST['register'])){
    include_once ('connect.php');

    $username = $_POST['user'];
    $mail = $_POST['email'];
    $passwd = $_POST['passwd'];
    

try{
    $pdo = "INSERT INTO `camagru`.`test` (user, email, passwd) VALUES(?, ?, ?)";
    $stmt = $conn->prepare($pdo);
    $arr = array($username, $mail, $passwd);

    if($stmt->execute($arr) === TRUE){
        header("location:landingpage.php");
    }else{
        echo "data not stored";
    }
}catch(PDOException $e){
    echo "<br>". $e->getMessage();
}
}
session_start();
if(isset($_POST['login'])){
    
    include_once('connect.php');
    $name = $_POST['user'];
    //$mail = $_POST['email'];
    $passwd = $_POST['passwd'];

try{
    $stmt = $conn->prepare("SELECT * FROM `camagru`.`test` WHERE user = ? AND passwd= ?");
    $arr = array($name, $passwd);
    $stmt->execute($arr);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result === FALSE){
        echo "INCORRECT username or Password";
    }else{
        $_SESSION['user'] =  $result['user'];
        header("location:landingpage.php");
    }
}catch(PDOException $e){
        echo "failed".$e->getMessage();
}
} 
?>