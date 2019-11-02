<?php
session_start();
if(isset($_POST['login'])){
    
    include_once('connect.php');
    $name = $_POST['user'];
    //$mail = $_POST['email'];
    $passwd = $_POST['passwd'];

try{
    $stmt = $conn->prepare("SELECT * FROM test WHERE user = ? AND passwd= ?");
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
        echo "failed".$e->getMEssage();
}
} 
?>