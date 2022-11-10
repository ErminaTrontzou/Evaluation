<?php
    session_start();
    require('config.php');
    $student_key=$_POST["student_key"];
    $sessionID = $_SESSION["id"];
    $query=mysqli_query($sql,'SELECT * FROM evaluation_key WHERE value = "' .$student_key .'"');

    $row = mysqli_fetch_assoc($query);
    if(empty($row)){
        header("Location: ../pages/key.php?error=true");
        die();
    }
    if($row["student_id"] != $sessionID){
        header("Location: ..pages/key.php?userError=true");
        die();
    }
    if($row["is_done"] == 1){
        header("Location: ../pages/key.php?formError=true");
        die();
    }
    header("Location: ../pages/form.php?token=" .$student_key);