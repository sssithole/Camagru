<?php
session_start();
if(isset($_POST['forgot'])){
    
    include_once ('config/setup.php');
    include_once ('config/database.php');
    
    $name = $_POST['username'];
    $mail = $_POST['email'];
    

try{
    $stmt = $conn->prepare("SELECT * FROM `camagru`.test WHERE username = ? AND email= ?");
    $arr = array($name, $mail);
    $stmt->execute($arr);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result === FALSE){
        echo "INCORRECT username or Password";
    }else{
        
        $_SESSION['user'] =  $result['user'];
        header("location: index.php");
    }
}catch(PDOException $e){
        echo "failed".$e->getMEssage();
}
} 
?>