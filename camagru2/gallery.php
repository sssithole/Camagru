<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
        include_once('connect.php');
        
        try{
        $sql = $conn->prepare("SELECT * FROM `camagru`.`gallery` ORDER BY `name` DESC");
        echo "sfs";
        $sql->execute();
        //$row = $sql->fetch();
        //echo "HERE ".$row['images'];
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
           
               echo '<A href= "#">
                <DIV class="gallery-image" style= "background-image: url(uploads/'.$row['images'].');"></DIV>
                <h3>PICTURE</h3>
                </A>';
               //<h3>'.$row['image_uploader_id'].'<h3>
               // <p> '.$row['image_caption'].'<p>
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    ?>