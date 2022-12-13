<?php
    session_start();
    require('../include/config.php');


?>

<html>
    <head>
        <meta charset="utf-8"/>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="../css/adminStyle.css" rel="stylesheet">
    </head>
    <body>
    <h1 align="center">Καλωσήρθες <b> admin </b> </h1>
    <div align="center">
        <form  method="post" action="../include/logoutLogic.php">
            <input  type="submit" name="logout" value="Logout"/>
        </form>
    </div>
    </br></br></br>
    <img src="../images/admin.jpg">
    </br></br></br>
    <div class="tabs">
        <input class="input" name="tabs" type="radio" id="tab-1" checked="checked"/>
        <label class="label" for="tab-1">Αποτελέσματα Αξιολογήσεων</label>
        <div align="center" class="panel">
            <form action="#" method="post">
                <select class="form-select" aria-label="Default select example" name="subjectsForResult">
                    <option selected>Διάλεξε μάθημα για αποτελέσματα</option>
                    <option value="1">Μαθηματικά</option>
                    <option value="2">Φυσική</option>
                    <option value="3">Χημεία</option>
                    <option value="4">Αστρονομία</option>
                </select>
                <input type="submit" name="submitResult" value="Υποβολή" />
            </form>
            <?php
            if(isset($_POST['submitResult'])){
                $selected_val = $_POST['subjectsForResult'];
                $query=mysqli_query($sql, 'SELECT rating
                                    FROM evaluation_key
                                    JOIN student_answer ON student_answer.key_id=evaluation_key.id
                                    WHERE  subject_id ="' .$selected_val .'"');
                $row = mysqli_fetch_all($query);
                $mathimaRatings = 0;
                for($i=0;$i<sizeof($row);$i++){
                    $mathimaRatings += $row[$i][0];
                }
                $result = sprintf('%0.3f' ,$mathimaRatings / sizeof($row));

                $query=mysqli_query($sql, 'SELECT *
                                    FROM evaluation_key
                                    JOIN subject ON subject.id = evaluation_key.subject_id
                                    WHERE  subject_id ="' .$selected_val .'"');
                $row = mysqli_fetch_assoc($query);
                $subjectName = $row["title"];
                echo "</br></br><div align='center' class='result'>";
                echo "<h4>Ο μέσος όρος του μαθήματος <b>$subjectName</b> είναι:<b> $result </b> </h4>";
                echo "</div>";

            }
            ?>
        </div>
        <input class="input" name="tabs" type="radio" id="tab-2"/>
        <label class="label" for="tab-2">Εισαγωγή Ερώτησης</label>
        <div class="panel">
            <form action="#" method="post">
                <h2>Εισαγωγή νέας Ερώτησης!</h2>
                <label for="codeName">Code Name</label><br>
                <input type="text" id="code_name" name="code"><br>
                <label for="questionText">Ερώτηση</label><br>
                <input type="text" id="question" name="question_text">
                </br>
                </br>
                <input type="submit" name="submitInsert" value="Υποβολή" />
            </form>
            <?php
            if(isset($_POST['submitInsert'])){
                $codeName = $_POST['code'];
                $question = $_POST['question_text'];
                $query=mysqli_query($sql,"INSERT INTO question ( code_name, question) 
                                    VALUES ( '$codeName', '$question')");
                echo "</br></br><div align='center' class='result'>";
                echo "<h4>Εγινε η εισαγωγη με <b>επιτυχια!</b></h4>";
                echo "</div>";
            }
            ?>
        </div>
        </div>
    </body>
</html>

