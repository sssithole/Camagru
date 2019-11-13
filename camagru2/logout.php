<?php
     echo "brfor";
    //if(isset($_POST['logout'])){
        echo "1";
    session_start();
    echo "2";
    unset($_SESSION['']);
    echo "3";
    session_destroy();
    echo "4";
    header("Location: log.php");
    //}
 ?>