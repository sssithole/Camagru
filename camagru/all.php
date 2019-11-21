<?php
/************************
 *                      *
 *     register         *
 *                      *
 ************************/
if(isset($_POST['register'])){
    session_start();
    include_once ('connect.php');

    $username = $_POST['user'];
    $mail = $_POST['email'];
    $passwd = $_POST['passwd'];
    $exists = FALSE;

    if (empty($username) || empty($mail) || empty($passwd)) {
         		header ("Location: regfor.php?error=emptyfields&user=".$username."&mail=".$email);
         		exit();
            } 
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($mail, FILTER_VALIDATE_EMAIL)){
            header ("Location: ../register.php?error=invaliduseremail");
           	exit();
            } 
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header ("Location: regfor.php?error=invaliduser&mail=".$email);
            exit();
          	} 
             //Check if input email & password are valid characters 
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $passwd)){
            header ("Location: regfor.php?error=invalidpassword");
            exit();
            } 
            //Check if email is valid
    else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            header ("Location: regfor.php?error=invalidemail&user=".$username);
            exit();
            }
         
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

        $msg = "click the link verifiy your account : <a href='http://localhost:8082/camagru2/log.php?ver_code=$verification_code'>verifiy</a>";

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



if(isset($_POST['login'])){
    
    session_start();
    var_dump($_SESSION);
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

                $msg = "click the link verifiy your account : http://localhost:8082/cama2/forgot2.php?email=$mail";
                
            
                $headers = array('From: noreply');
        
                mail($mail, "Verificatin email", $msg, implode("\r\n", $headers));
                echo "Check your email and change password <br>";
        
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
    session_start();
    include_once('connect.php');
    $name = $_POST['user'];
    $mail = $_POST['email'];
    $passwd = $_POST['passwd'];

try{

    $pdo = "UPDATE `camagru`.`users` SET user=?, email=?, passwd= ? WHERE user=? ";
    $stmt = $conn->prepare($pdo);
    $result = $stmt->execute([$name, $mail, $passwd, $_SESSION["user"]]);
    if($result === TRUE){
        $_SESSION['user'] = $name;
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
 *       likes          *
 *                      *
 ***********************/
if(isset($_POST['send'])){
    session_start();
    try{
        $sql = "UPDATE `camgru`.`users` SET `like` = '1' WHERE `gallery`.`like` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }catch(PDOException $e){
        $e->getMessage();
    }
}
/************************
 *                      *
 *      comments        *
 *                      *
 ***********************/
if(isset($_POST['coment'])){
    session_start();
    include_once('connect.php');
    var_dump($_SESSION);
   
    $gname = $_SESSION['user'];
    var_dump($gname);
    $comm = $_POST['comment'];


        $pdo = "INSERT INTO `camagru`.`gallery` (`name`, comments) VALUES
        ($gname, $comm)";
       
        $stmt = $conn->prepare($pdo);

   
        $result = $stmt->execute([$gname, $comm]);
        
        var_dump($result);
    if($result === TRUE){
        $_SESSION['user'] = $name;
        header("location:abc.php");
    }else{
        echo "data not stored";
    }


    try{
        $pdo = "SELECT `camagru`.users.user, `camagru`.gallery.name FROM users,gallery WHERE users.user = `name` ORDER BY users.user";
        $stmt = $conn->prepare($pdo);      
        $stmt->execute();
        var_dump($stmt);
        echo "2";

    }catch(PDOException $e){
        $e->getMessage();
    }
}
/************************
 *                      *
 *      upload-pic      *
 *                      *
 ***********************/
if(isset($_POST['upload'])){

    $file = $_FILES['file'];

    print_r($file);
    // $filename = $_FILES['file']['name'];
    // $filetemp = $_FILES['file']['temp'];
    // $filesize = $_FILES['file']['size'];  
    // $fileerror = $_FILES['file']['error'];
    // $filetype = $_FILES['file']['type'];
    

    // $fileExt = explode(".", $filename);
    // $fileactext = strtolower(end($fileExt));

    // $allowed = array("jpg","jpeg","png");

    // if (in_array($fileactext, $allowed)){
    //     if($fileerror == 0){
    //         if($filesize < 10000000){
    //             $newname = uniqid("", true).".".$fileactext;
    //             $filedest = "img/".$newname;


    //             move_uploaded_file($filetemp, $filedest);
    //             header("location:abc.php");
    //         }else{
    //             echo "file to big";
    //         }

    //     }else{
    //         echo "Error uploading";
    //     }

    // }else{
    //     echo "You uploaded wrong file type";
    // }

}
?>