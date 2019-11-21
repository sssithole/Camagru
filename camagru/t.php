<?php

   session_start();

   include_once ('config/setup.php');
   include_once ('config/database.php');

   $user = $_SESSION['username'];
  
   $img = $_POST['img'];

    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $upload = imagecreatefromstring($data);
    $file = "camagru".uniqid().".png";
    $filedest = "uploads/".$file;
    $success = imagepng($upload, $filedest);
    
   
        try{
        
            $sql = "INSERT INTO `camagru`.`images` (username ,images) VALUES (?,?)";
       
            $stmt = $conn->prepare($sql);
            $stmt->execute([$user,$file]);
        if($stmt){
            echo "Post added successful";
            header("location: home.php");
        }else
            echo "Failed to add a post";
        }catch(PDOException $e){
            echo $e->getMessage();
        }

?>
