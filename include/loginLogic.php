<?php
    session_start();
    require('config.php');
    $username = $_POST["username"];
    $password = $_POST["password"];


    $query=mysqli_query($sql, 'SELECT * FROM student WHERE username ="' .$username .'"');
    $row = mysqli_fetch_assoc($query);
    if(!password_verify($password, $row["password"])){
        header("Location: ../?error=true");
        die();
    }
    $_SESSION["id"]=$row["id"];
header("Location: ../pages/key.php");


