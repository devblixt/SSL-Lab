<?php

    session_start();
    $username = "eval";
    $password = "eva";

    if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){
        header("Location: album.php");
    }
    if(isset($_POST['username']) && isset($_POST['password'])){
        if($_POST['username'] == $username && $_POST['password'] == $password){
            $_SESSION["loggedIn"] = true;
            header("Location: album.php");
        }
        else{
            echo "<h2>Wrong Login Credentials! Try Again...</h2>";
        }
    }

?>