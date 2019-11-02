<?php
    session_start();
if(isset($_POST['forgot'])){

    include_once('connect.php');
//    $name = $_POST['user'];
  //  $mail = $_POST['email'];
    $passwd = $_POST['passwd'];

try{
    $stmt = $conn->prepare("UPDATE `camagru`.`test` SET passwd= ?");
    $arr = array($passwd);
    $stmt->execute($arr);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result === TRUE){
        $_SESSION['passwd'] = $result['passwd'];
        header("location:landingpage.php");
    }else{
        echo "data not stored";
    }
    // $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // if($result === FALSE){
    //     echo "INCORRECT username or E-MAIL";
    // }else{
    //    // $_SESSION['user'] =  $result['user'];
    //     header("location:forgot2.php");
    // }
}catch(PDOException $e){
        echo "failed".$e->getMEssage();
}
}
?> 