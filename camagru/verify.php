


<?php
//if(isset($_POST['likes'])){
    session_start();
    include_once ('config/setup.php');
    include_once ('config/database.php');

    //$comm = $_POST['comments'];

    try{
        $pdo = "UPDATE `users` SET ver=TRUE WHERE `username`=? ";
        $stmt = $conn->prepare($pdo);
        $result = $stmt->execute([$_SESSION["user"]]);
        if($result === TRUE){
            header("location : logoout.php");
        }else{
            echo "data not stored";
        }

    }catch(PDOException $e){
        echo $e->getMessage();

    }
//}
?>