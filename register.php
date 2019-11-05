<?php

if(isset($_POST['register'])){
    include_once ('connect.php');

    $username = $_POST['user'];
    $mail = $_POST['email'];
    $passwd = $_POST['passwd'];
    $exists = FALSE;

try{
    $pdo = "SELECT * FROM `camagru`.`users` WHERE user = ?";
    $stmt = $conn->prepare($pdo);
    $stmt->execute([$username]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if($result){
        $exists = TRUE;
        echo "Username already exists<br>";
    }else{
        echo "account created<br>";
        $verification_code = hash('sha1', $username);
    }

}catch(PDOException $e){
    echo $e->getMessage();
}


if(!$exists){
    try{
        $pdo = "INSERT INTO `camagru`.`users` (user, email, passwd, verification_code) VALUES
        (?,?,?,?)";
        $stmt = $conn->prepare($pdo);
        $arr = array($username, $mail, $passwd, $verification_code);
        $stmt->execute($arr);
        echo "prep <br>";

        $msg = "click the link verifiy your account : http://localhost:8082/cama2/abc.php";

        //http://127.0.0.1:8082/cam2/abc.php?ver_code=$verification_code;
    
        $headers = array('From: noreply');

        mail($mail, "Verificatin email", $msg, implode("\r\n", $headers));
        echo "Check your email<br>";
    // if($stmt->execute($arr) === TRUE){
    //     header("location:landingpage.php");
    // }else{
    //     echo "data not stored";
    // }
    }catch(PDOException $e){
        echo "<br>". $e->getMessage();
    }
    }

}
/************************
 *                      *
 *     login            *
 *                      *
 ************************/

session_start();

if(isset($_POST['login'])){
    
    
    include_once('connect.php');
    $name = $_POST['user'];
    //$mail = $_POST['email'];
    $passwd = $_POST['passwd'];

try{
    $stmt = $conn->prepare("SELECT * FROM `camagru`.`users` WHERE user = ? AND passwd= ?");
    $arr = array($name, $passwd);
    $stmt->execute($arr);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result === FALSE){
        echo "INCORRECT username or Password";
    }else{
        $_SESSION['user'] =  $result['user'];
        header("location:abc.php");
    }
}catch(PDOException $e){
        echo "failed".$e->getMessage();
}
} 


/************************
 *                      *
 *     forgot           *
 *                      *
 ***********************/


if(isset($_POST['forgot'])){
    include_once('connect.php');

    $mail = $_POST['email'];

    try{

        $stmt = $conn->prepare("SELECT * FROM `camagru`.`users` WHERE email = ? AND verification_code =? ");
        $stmt->execute([$mail, $verification_code]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo $result;
        if($result === TRUE){
            echo "incorrect email or email does not exists";
        }else{
          //  try{
             //  $pdo = "INSERT INTO `camagru`.`users` (email, ) VALUES (?,?)";
                // $stmt = $conn->prepare($pdo);
                // $arr = array($mail, $verification_code);
                // $stmt->execute($arr);
               // echo "prep <br>";
        
                $msg = "click the link verifiy your account : http://localhost:8082/cama2/forgot2.php?email=$mail";
                    
              //  http://127.0.0.1:8082/abc.php?ver_code=$verification_code";
            
                $headers = array('From: noreply');
        
                mail($mail, "Verificatin email", $msg, implode("\r\n", $headers));
                echo "Check your email and change password <br>";
        
          //  }catch(PDOException $e){
          //      echo "<br>". $e->getMessage();
         //   }
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

/************************
 *                      *
 *    change_passwd     *
 *                      *
 ***********************/
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
        header("location:abc.php");
    }else{
        echo "data not stored";
    }
    
}catch(PDOException $e){

    echo "failed".$e->getMEssage();
}
}

/************************
 *                      *
 *    update_userinfo   *
 *                      *
 ***********************/

if(isset($_POST['update'])){
    include_once('connect.php');
    $name = $_POST['user'];
    $mail = $_POST['email'];
    $passwd = $_POST['passwd'];

try{

    $pdo = "UPDATE `camagru`.`users` SET user=? email=? passwd= ? WHERE user=? email=? passwd= ?";
    $stmt = $conn->prepare($pdo);
    $result = $stmt->execute([$name, $mail, $passwd]);
    if($result === TRUE){
        $_SESSION['user'] = $result['user'];
        header("location:abc.php");
    }else{
        echo "data not stored";
    }
    
}catch(PDOException $e){

    echo "failed".$e->getMEssage();
}
}


?>