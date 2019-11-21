<?php
    session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="comments.php?imgId=<?php echo $_GET['imgId'];?>" method="POST">
        <textarea name='comments'></textarea>
        <button type='submit' name='comment'>comment</button>
        <a href='delete.php?imgId=<?php echo $_GET['imgId'];?>'><button type="button" >delete</button></a> 
        <a href='likes.php?imgId=<?php echo $_GET['imgId'];?>'><button type="button" >like</button></a>
    </form>
    <?php
        
        include_once ('config/setup.php');
        include_once ('config/database.php');
        try{
            $sql = $conn->prepare("SELECT * FROM `comments`");
            $sql->execute();
            while($re = $sql->fetch(PDO::FETCH_ASSOC))
                echo $re['comments']."<br>";
    
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    ?>
</body>
</html>