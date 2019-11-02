<!-- ?php
session_start();
if(isset($_POST['forgot'])){

    include_once('connect.php');
    $name = $_POST['user'];
    $mail = $_POST['email'];

try{
    $stmt = $conn->prepare("SELECT * FROM `camagru`.`test` WHERE user = ? AND email= ?");
    $arr = array($name, $mail);
    $stmt->exec($arr);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result === FALSE){
        echo "INCORRECT username or E-MAIL";
    }else{
        $_SESSION['user'] =  $result['user'];
        $_SESSION['email'] = $result['email'];
        header("location:landingpage.php");
    }
}catch(PDOException $e){
        echo "failed".$e->getMEssage();
}
}

?>  -->
<?php
session_start();
if(isset($_POST['forgot'])){
    
    include_once('connect.php');
    $name = $_POST['user'];
    $mail = $_POST['email'];
    //$passwd = $_POST['passwd'];

try{
    $stmt = $conn->prepare("SELECT * FROM `camagru`.test WHERE user = ? AND email= ?");
    $arr = array($name, $mail);
    $stmt->execute($arr);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result === FALSE){
        echo "INCORRECT username or Password";
    }else{
        //$_SESSION['email'] = $result['email'];
        $_SESSION['user'] =  $result['user'];
        header("location:landingpage.php");
    }
}catch(PDOException $e){
        echo "failed".$e->getMEssage();
}
} 
?>