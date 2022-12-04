<?php
    session_start();
    require('../include/config.php');
    $sessionID = $_SESSION["id"];
    $student_key = $_POST["token"];

    $query=mysqli_query($sql,'SELECT id FROM evaluation_key WHERE student_id = "' .$sessionID.'" AND value = "' .$student_key.'"');
    $key = mysqli_fetch_row($query);


$query=mysqli_query($sql,'SELECT *
                                            FROM question
                                            WHERE code_name LIKE "mathima%"');
    $row = mysqli_fetch_all($query);
    $mathimaQuestion = array();
    for($i=0;$i<sizeof($row);$i++){
        $mathimaQuestion[$i]= $row[$i][1];
    }
    $mathimaID = array();
    for($i=0;$i<sizeof($row);$i++){
        $mathimaID[$i]= $row[$i][0];
    }
var_dump($mathimaID);


$mathimaQuestionsValues = array();
    for($i=0;$i<sizeof($row);$i++){
        array_push($mathimaQuestionsValues,$_POST[$mathimaQuestion[$i]]);
    }
    var_dump($key);
    var_dump($mathimaQuestionsValues);
    for($i=0;$i<sizeof($mathimaQuestion);$i++){
        $query=mysqli_query($sql,"INSERT INTO student_answer (question_id, key_id, rating) VALUES ('$mathimaID[$i]','$key','$mathimaQuestionsValues[$i]')");
    }


