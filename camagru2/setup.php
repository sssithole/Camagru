<?php
    session_start();
    var_dump($_SESSION);
  // var_dump($gname);
    
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

    <form action="register.php" method="POST">
        <!-- enter username<input type="text" name="name" require> -->
        
        <textarea name="comment" id="" cols="50" rows="10"></textarea>
        <button type="submit" name="coment">send</button></a>
    </form>

</body>
</html>
