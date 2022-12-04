<?php
    session_start();
    require('../include/config.php');
    $sessionID = $_SESSION["id"];
    $student_key = $_POST["token"];

    $query=mysqli_query($sql,'SELECT id FROM evaluation_key WHERE student_id = "' .$sessionID.'" AND value = "' .$student_key.'"');
    $key = mysqli_fetch_row($query);


    /**********************ERWTHSEIS GIA TO MATHIMA**********************/
    $query=mysqli_query($sql,'SELECT *
                                            FROM question
                                            WHERE code_name LIKE "mathima%"');
    $row = mysqli_fetch_all($query);
    $mathimaQuestion = array();
    $mathimaID = array();
    $mathimaQuestionsValues = array();
    for($i=0;$i<sizeof($row);$i++){
        $mathimaQuestion[$i]= $row[$i][1];
        $mathimaID[$i]= $row[$i][0];
        array_push($mathimaQuestionsValues, $_POST[$mathimaQuestion[$i]]);
    }
    for($i=0;$i<sizeof($mathimaQuestion);$i++){
        $query=mysqli_query($sql,"INSERT INTO student_answer (question_id, key_id, rating) 
                                    VALUES ('$mathimaID[$i]','$key[0]','$mathimaQuestionsValues[$i]')");
    }


    /**********************ERWTHSEIS GIA TIS ASKISEIS**********************/
    $query=mysqli_query($sql, 'SELECT * 
                                FROM question 
                                WHERE code_name LIKE "askiseis%"');
    $row = mysqli_fetch_all($query);
    $askishQuestion = array();
    $askishID = array();
    $askishQuestionsValues = array();
    for($i=0;$i<sizeof($row);$i++){
        $askishQuestion[$i] = $row[$i][1];
        array_push($askishID, $row[$i][0]);
        array_push($askishQuestionsValues, $_POST[$askishQuestion[$i]]);
    }
    for($i=0;$i<sizeof($askishQuestion);$i++){
        $query=mysqli_query($sql,"INSERT INTO student_answer (question_id, key_id, rating) 
                                    VALUES ('$askishID[$i]', '$key[0]', '$askishQuestionsValues[$i]')");
    }



    /**********************ERWTHSEIS GIA TON KATHIGITI**********************/
    $query=mysqli_query($sql, 'SELECT * 
                                FROM question 
                                WHERE code_name LIKE "didaskon%"');
    $row = mysqli_fetch_all($query);
    $didaskonQuestion = array();
    $didaskonID = array();
    $didaskonQuestionsValues = array();
    for($i=0; $i<sizeof($row); $i++){
        $didaskonQuestion[$i] = $row[$i][1];
        $didaskonID[$i] = $row[$i][0];
        array_push($didaskonQuestionsValues, $_POST[$didaskonQuestion[$i]]);
    }
    for($i=0; $i<sizeof($didaskonQuestion); $i++){
        $query=mysqli_query($sql, "INSERT INTO student_answer (question_id, key_id, rating) 
                                    VALUES ('$didaskonID[$i]', '$key[0]', '$didaskonQuestionsValues[$i]')");
    }

    /**********************ERWTHSEIS GIA TON MATHITI**********************/
    $query=mysqli_query($sql, 'SELECT * 
                                FROM question 
                                WHERE code_name LIKE "foithths%"');
    $row = mysqli_fetch_all($query);
    $foiththsQuestion = array();
    $foiththsID = array();
    $foiththsQuestionsValues = array();
    for($i=0; $i<sizeof($row); $i++){
        $foiththsQuestion[$i] = $row[$i][1];
        $foiththsID[$i] = $row[$i][0];
        array_push($foiththsQuestionsValues, $_POST[$foiththsQuestion[$i]]);
    }
    for($i=0; $i<sizeof($foiththsQuestion); $i++){
        $query=mysqli_query($sql, "INSERT INTO student_answer (question_id, key_id, rating) 
                                    VALUES ('$foiththsID[$i]', '$key[0]', '$foiththsQuestionsValues[$i]')");
    }