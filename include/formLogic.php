<?php
    session_start();
    require('../include/config.php');
    $sessionID = $_SESSION["id"];
    $studentKey = $_GET["token"];
//    $query=mysqli_query($sql, "SELECT * FROM subject WHERE ");
//    $row = mysqli_fetch_assoc($query);
    $mathimaStoxoi = $_POST["3"];
//    $mathimaUlh = $_POST["mathima-ulh"];
//    $mathimaOrganoshYlhs = $_POST["mathima-organosh-ulh"];
//    $mathimaYliko = $_POST["mathima-uliko"];
//    $mathimaProhgoumenaMathimata = $_POST["mathima-prohgoumena-mathimata"];

    $query=mysqli_query($sql,'SELECT * FROM evaluation_key WHERE value = "' .$studentKey.'"');

    $query=mysqli_query($sql,'INSERT INTO student_answer (key_id, rating) VALUES ('.$studentKey.','.$mathimaStoxoi.')');
