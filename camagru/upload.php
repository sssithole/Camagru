<?php
if(isset($_POST['upload'])){
    session_start();
    include_once ('config/setup.php');
    include_once ('config/database.php');

    $name = $_SESSION['username'];
    $file = $_FILES['file'];

    $filename = $_FILES['file']['name'];
    $fileTemp = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];  
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type']; 
    

     $fileExt = explode('.', $filename);
     $fileActExt = strtolower(end($fileExt));

     $allowed = array('jpg','jpeg','png','gif');

     if (in_array($fileActExt, $allowed)){
        if($fileError === 0){
             if($fileSize < 10000000){
                $newname = uniqid('', true).".".$fileActExt;
                $filedest = 'uploads/'.$newname;
                try{
                $sql = "INSERT INTO `images` (username, images) VALUES (?,?)";
                var_dump($sql);
                $stmt = $conn->prepare($sql);
                
                $stmt->execute([$name, $newname]);

                 move_uploaded_file($fileTemp, $filedest);
                 header("location: home.php");
                }catch(PDOException $e){
                    echo $e->getMessage();

                }
             }else{
                 echo "FILE IS TO LAREG";
             }

         }else{
             echo "Error uploading";
         }

     }else{
         echo "You uploaded wrong file type";
    }

}
?> 