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

    $query=mssql_query($sql,'SELECT * 
                                        FROM evaluation_key
                                        JOIN student ON student.id = ')
?>

<html>
    <head>
        <title>Evaluation</title>
    </head>
    <body>
        <div class="title">
            <h1>Αξιολόγηση για το μάθημα <?= $subjectTitle ?> </h1>
        </div>
        <div>

        </div>
    </body>
</html>
