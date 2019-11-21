<?php
if(isset($_POST['forgot'])){
    include_once ('config/setup.php');
    include_once ('config/database.php');

    $mail = $_POST['email'];

    try{

        $stmt = $conn->prepare("SELECT * FROM `camagru`.`users` WHERE email = ?");
        $stmt->execute([$mail]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo $result;
        if($result === TRUE){
            echo "incorrect email or email does not exists";
        }else{

                $msg = "click the link to reset your password : <a href='http://localhost:8082/camagru/restpass.php?email=$mail'>reset_password</a>";
                
            
                $headers = array('From: noreply');
        
                mail($mail, "Verificatin email", $msg, implode("\r\n", $headers));
                echo "Check your email and change password <br>";
        
        }
    }catch(PDOException $e){
        echo $e->getMessage();
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
   <form action="fogotform.php" method="POST">
       <h1>forgot password</h1>
       email<input type="email" name="email"><br>
       <button type="submit" name="forgot">submit</button>
   </form>
</body>
</html>