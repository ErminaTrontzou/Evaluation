<?php
    session_start();
    require('config.php');
    $username = $_POST["username"];
    $password = $_POST["password"];


    $query=mysqli_query($sql, 'SELECT * FROM users WHERE username ="' .$username .'"');
    $row = mysqli_fetch_assoc($query);
    if(password_verify($password,$row["password"]) && $row["isAdmin"]=="1"){
        header("Location: ../pages/admin-panel.php");
    }else if(password_verify($password, $row["password"]) && $row["isAdmin"]=="0"){
        $_SESSION["id"]=$row["id"];
        header("Location: ../pages/key.php");

    }else{
        header("Location: ../?error=true");
        die();
    }



