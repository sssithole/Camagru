<?php
//if(isset($_POST['likes'])){
    session_start();
    include_once ('config/setup.php');
    include_once ('config/database.php');
    $id = $_GET['imgId'];
    //$comm = $_POST['comments'];

    try{

        $pdo="INSERT INTO `likes` (`likes`, `username`, img_id) VALUES
        (?,?,?)";
        //$pdo = "UPDATE `likes` SET likes=1 WHERE `username`=? AND `img_id`=? LIMIT 1";
        $stmt = $conn->prepare($pdo);
        $result = $stmt->execute(['1',$_SESSION["username"], $id]);
        if($result === TRUE){
          //  $_SESSION['user'] = $name;
          header ("Location: gallery.php");
          exit();
        }else{
            echo "data not stored";
        }

    }catch(PDOException $e){
        echo $e->getMessage();

    }
//}
?>