<?php
    session_start();
    require('../include/config.php');
    $student_key=$_GET["token"];

    $query=mysqli_query($sql, 'SELECT *
                                    FROM evaluation_key 
                                    JOIN subject ON subject.id = evaluation_key.subject_id 
                                    JOIN teacher ON subject.teacher_id = teacher.id
                                    WHERE evaluation_key.value ="' .$student_key .'"');

    $row = mysqli_fetch_assoc($query);
    $teacherName = $row["last_name"]." ".$row["first_name"];
    $subjectTitle = $row["title"];

    $query=mysqli_query($sql,'SELECT *
                                        FROM question
                                        WHERE code_name LIKE "mathima%"');
    $row = mysqli_fetch_all($query);
    $mathimaQuestion = array();
    for($i=0;$i<sizeof($row);$i++){
       $mathimaQuestion[$i]= $row[$i][2];
    }
    $mathimaID = array();
    for($i=0;$i<sizeof($row);$i++){
        $mathimaID[$i]= $row[$i][0];
    }



$query=mysqli_query($sql,'SELECT *
                                        FROM question
                                        WHERE code_name LIKE "askiseis%"');
    $row = mysqli_fetch_all($query);
    $askiseisQuestion = array();
    for($i=0;$i<sizeof($row);$i++){
        $askiseisQuestion[$i]= $row[$i][2];
    }

    $query=mysqli_query($sql,'SELECT *
                                            FROM question
                                            WHERE code_name LIKE "didaskon%"');
    $row = mysqli_fetch_all($query);
    $didaskonQuestion = array();
    for($i=0;$i<sizeof($row);$i++){
        $didaskonQuestion[$i]= $row[$i][2];
    }

    $query=mysqli_query($sql,'SELECT *
                                            FROM question
                                            WHERE code_name LIKE "foithths%"');
    $row = mysqli_fetch_all($query);
    $foiththsQuestion = array();
    for($i=0;$i<sizeof($row);$i++){
        $foiththsQuestion[$i]= $row[$i][2];
    }

?>

<html>
    <head>
        <title>Evaluation</title>
        <link href="../css/formStyle.css" rel="stylesheet">
    </head>
    <body>
        <div class="title">
            <form  method="post" action="../include/formLogic.php">
                <h1>Αξιολόγηση για το μάθημα <?= $subjectTitle ?> του <?= $teacherName?> </h1>
                <div align="left">
                <h3>Ερωτήσεις για το μάθημα </h3>
                <?php
                for ($i = 0; $i < sizeof($mathimaQuestion); $i++ ){
                    echo "<div> <p>".$mathimaQuestion[$i]."</div>";
                    echo "<div>";
                    echo "<input type='radio' value=1 name='.$mathimaID[$i].' >";
                    echo "<input type='radio' value=2 name='.$mathimaID[$i].' >";
                    echo "<input type='radio' value=3 name='.$mathimaID[$i].' >";
                    echo "<input type='radio' value=4 name='.$mathimaID[$i].' >";
                    echo "<input type='radio' value=5 name='.$mathimaID[$i].' >";
                    echo "</p> </div>";
                }
                ?>
                <h3>Ερωτήσεις για τις ασκήσεις </h3>
                <?php
                for ($i = 0; $i < sizeof($askiseisQuestion); $i++ ){
                    echo "<p>".$askiseisQuestion[$i]."</p>";
                }
                ?>
                <h3>Ερωτήσεις για τον καθηγητή </h3>
                <?php
                for ($i = 0; $i < sizeof($didaskonQuestion); $i++ ){
                    echo "<p>".$didaskonQuestion[$i]."</p>";
                }
                ?>
                <h3>Ερωτήσεις για τον Φοιτητή </h3>
                <?php
                for ($i = 0; $i < sizeof($foiththsQuestion); $i++ ){
                    echo "<p>".$foiththsQuestion[$i]."</p>";
                }
                ?>
                <button class="btn btn-lg searchButton" type="submit">Search</button>
                </div>
            </form>
        </div>
        <div>

        </div>
    </body>
</html>
