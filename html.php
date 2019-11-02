<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <div>
            <?=$erro[0]?>
        </div>
        <form action="login.php" method="POST">
            USER<input type="text" name="user"><br>
            mail<input type="text" name="email"><br>
            passwrd<input type="password" name="passwd"><br>
            <button type="submit" name = "submit">REGISTER</button>

        </form>
    </body>
</html>