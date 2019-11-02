<?php
ini_set('diplay_errors', 1);
ini_set('display_startup_errors', 1);

$dsn = new PDO('mysql:host=localhost;dbname=user', 'root', '');
$stmt = $dsn->prepare("SELECT * FROM userz;");
$Stmt->execute();

foreach($row as $row)
{
     
}

?>