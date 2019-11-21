<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>WELCOME HOME </h1>
    <form action="updateUSER.php" method="POST">
   
    <a href='home.php'><button type="button" name="home">home</button></a> 
    <button type="submit" name="update">update</button>
    <a href='logout.php'><button type="button" name="logout">logout</button></a>
    <a href='indexcam.php'><button type="button" name="comment">Camera</button></a> 
    <a href='uploadform.php'><button type="button" name="comment">upload</button></a> 
    <a href='gallery.php'><button type="button" name="comment">gallery</button></a> 
    </form>
    <?php
         include_once ('config/setup.php');
         include_once ('config/database.php');
        
        try{
        $sql = $conn->prepare("SELECT * FROM `images` ORDER BY `img_id` DESC");
      
        $sql->execute();

        while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
            
           
               echo '<a href= "#">
                <DIV class="gallery-image" style= "background-image: url(uploads/'.$row['images'].');"></DIV>

                </a>';
             
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    ?>
</body>
</html>