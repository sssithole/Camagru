$sql = "SELECT passwd FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        $info = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
    if ($info === FALSE)
    {
        $_SESSION['message'] = "Incorrect username or password, please try again."; //this needs to errors[];
    }
    else
    {
        if (password_verify($_POST['passwd'], $info['passwd']))
        {
            $_SESSION['username'] = $username;
            $_SESSION['message'] = "Sign in successful";
            header("location: home.php");
            exit();
        }