<?php

   session_start();
   include_once('connect.php');
   $user = $_SESSION['user'];
  //$user = 
   //$caption = "Selfie Time ".$timestamp_caption;
   //$upload_dir = "uploads/";
   $img = $_POST['img'];
//    echo "$img";
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $upload = imagecreatefromstring($data);
    $file = "camagru".uniqid().".png";
    $filedest = "uploads/".$file;
    $success = imagepng($upload, $filedest);
    
    //file = $upload_dir . ".png";
    //echo "$img";
    //if($success = file_put_contents($file, $data)){
        try{
        
            $sql = "INSERT INTO `camagru`.`gallery` (`name`, comments, likes, images) VALUES (?,?,?,?)";
       
            $stmt = $conn->prepare($sql);
            $stmt->execute([$user, '', '0',$file]);
        if($stmt){
            echo "Post added successful";
            header("location: abc.php");
        }else
            echo "Failed to add a post";
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    //}

// include_once 'save.php';

// $imageDir = "images/";

// $img = explode(",", $_POST['img']);
// $img = base64_decode($img[1]);
// $id = $_SESSION['id'];

// $iid = uniqid();

// if (!file_exists($imageDir)) {
//     mkdir($imageDir);
// }

// file_put_contents($imageDir . $iid . '.jpeg', $img);
// add_image($id, $iid . '.jpeg');
// header("Location: camera.php");    






//print $success ? $file : 'Unable to save the file.';
?>