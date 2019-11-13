<?php

include_once('connect.php');
//function to verify user
function verify($code)
{   
    try{
        $sql = "UPDATE `camgru`.`users` SET `ver` = '1' WHERE `users`.`verfication_code` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$code]);
    }catch(PDOException $e){
        $e->getMessage();
    }
}

//function to check if user exists
function getuser($code)
{
    try{
        $sql = "SELECT * FROM `camagru`.`users` WHERE `verfication_code` = ?";
        $stmt = $GLOBALS['conn']->prepare($sql);
        echo $code;
        $stmt->execute([$code]);
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
    var_dump($results);
    return $results;
    }catch(PDOException $e){
        $e->getMessage();
    }
}
function verifycode($code)
{
    $sql = "SELECT * FROM camagru.users WHERE verfication_code = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$code]);
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return ($results);
}

if (isset($_GET['ver_code'])){
    $code = $_GET['ver_code'];
    $results = getuser($code);
   
	if ($results)
	{
		echo "Welcome to Camagru";
//		$dataModel = verify($code);
		header("Location: log.php");
	}

// else if(isset($_GET['v_code'])){
// 	session_start();
// 	$code = $_GET['v_code'];
// 	$results = $dataModel->verifycode($code);
// 	if ($results){
// 		$_SESSION['user'] = $results['id'];
// 		header("location: ../views/changepasswd.php");
// 	}
	else{
		die ('invalid v_code');
	}
}
    
?>