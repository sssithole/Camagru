<?php
   // session_start();
if(isset($_POST['new'])){

    include_once('connect.php');
//    $name = $_POST['user'];
    $mail = $_POST['email'];
    $passwd = $_POST['passwd'];

try{

    $pdo = "UPDATE `camagru`.`users` SET passwd= ? WHERE email = ?";
    $stmt = $conn->prepare($pdo);
    $result = $stmt->execute([$passwd,$mail]);
    if($result === TRUE){
        // $_SESSION['passwd'] = $result['passwd'];
        header("location:landingpage.php");
    }else{
        echo "data not stored";
    }
    
}catch(PDOException $e){

    echo "failed".$e->getMEssage();
}
}
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
    <form action="register.php" method="POST">
        <input name="email" value="<?=$_GET['email']?>"  hidden/>
        new password<input type="password" name="passwd">
        <button type="submit" name="new">submit</button>
    </form>
</body>
</html> 