<?php
if(isset($_POST['comment'])){
    // print_r($_GET['imdId'])."<br>";
    session_start();
    //var_dump($_SESSION);
    include_once ('config/setup.php');
    include_once ('config/database.php');
    $name = $_SESSION['username'];
    $me = $_GET['imgId'];
    $comm = $_POST['comments'];
    //$id = $_SESSION['img_id'];
    $_SESSION['imgId'] = $_GET['imgId'];
    //var_dump($id);

    try{
        $pdo = "INSERT INTO `camagru`.`comments` (`comments`, `username`, `img_id`) VALUES(?, ?, ?)";
        $stmt = $conn->prepare($pdo);
        // $result = $stmt->execute([$comm, $name, $_SESSION['img_id']]);
        $result = $stmt->execute([$comm, $name, $me]);
        // echo "fail";
        if($result === TRUE){
        //    echo $_SESSION['id'];
        //    echo "<br>".$_SESSION['img_id'];
        //    echo $comm;
        //    header("Location : commentsf.php");
        header ("Location: gallery.php");
        exit();

        }else{
            echo "data not stored";
        }

    }catch(PDOException $e){
        echo $e->getMessage();

    }

}



?>
