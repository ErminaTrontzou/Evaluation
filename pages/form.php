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
        $mathimaID[$i]= $row[$i][1];
    }



$query=mysqli_query($sql,'SELECT *
                                        FROM question
                                        WHERE code_name LIKE "askiseis%"');
    $row = mysqli_fetch_all($query);
    $askiseisQuestion = array();
    for($i=0;$i<sizeof($row);$i++){
        $askiseisQuestion[$i]= $row[$i][2];
    }
    $askiseisID = array();
    for($i=0;$i<sizeof($row);$i++){
        $askiseisID[$i]= $row[$i][1];
    }

    $query=mysqli_query($sql,'SELECT *
                                FROM question
                                WHERE code_name LIKE "ergasies%"');
    $row = mysqli_fetch_all($query);
    $ergasiesQuestion = array();
    for($i=0;$i<sizeof($row);$i++){
        $ergasiesQuestion[$i]= $row[$i][2];
    }
    $ergasiesID = array();
    for($i=0;$i<sizeof($row);$i++){
        $ergasiesID[$i]= $row[$i][1];
    }

    $query=mysqli_query($sql,'SELECT *
                                            FROM question
                                            WHERE code_name LIKE "didaskon%"');
    $row = mysqli_fetch_all($query);
    $didaskonQuestion = array();
    for($i=0;$i<sizeof($row);$i++){
        $didaskonQuestion[$i]= $row[$i][2];
    }
    $didaskonID = array();
    for($i=0;$i<sizeof($row);$i++){
        $didaskonID[$i]= $row[$i][1];
    }

    $query=mysqli_query($sql,'SELECT *
                                            FROM question
                                            WHERE code_name LIKE "foithths%"');
    $row = mysqli_fetch_all($query);
    $foiththsQuestion = array();
    for($i=0;$i<sizeof($row);$i++){
        $foiththsQuestion[$i]= $row[$i][2];
    }
    $foiththsID = array();
    for($i=0;$i<sizeof($row);$i++){
        $foiththsID[$i]= $row[$i][1];
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
                <h1>Αξιολόγηση για το μάθημα <span style=" color:orangered"><?= $subjectTitle ?></span> από <span style=" color:orangered"><?= $teacherName?></span> </h1>
                <br>
                <div class="content">
                    <table>
                        <tr>
                            <td>
                            <h3>Ερωτήσεις για το μάθημα </h3>
                            <?php
                                for ($i = 0; $i < sizeof($mathimaQuestion); $i++ ){
                                    echo "<div> <p>".$mathimaQuestion[$i]."</p></div>";
                                    echo "<div ><p>";
                                    echo "<input type='radio' value='1' name='$mathimaID[$i]' >1";
                                    echo "<input type='radio' value='2' name='$mathimaID[$i]' >2";
                                    echo "<input type='radio' value='3' name='$mathimaID[$i]' >3";
                                    echo "<input type='radio' value='4' name='$mathimaID[$i]' >4";
                                    echo "<input type='radio' value='5' name='$mathimaID[$i]' >5";
                                    echo "</p></div>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3>Ερωτήσεις για τις ασκήσεις </h3>
                                <?php
                                for ($i = 0; $i < sizeof($askiseisQuestion); $i++ ){
                                    echo "<div><p>".$askiseisQuestion[$i]."</p></div>";
                                    echo "<div>";
                                    echo "<input type='radio' value='1' name='$askiseisID[$i]' >1";
                                    echo "<input type='radio' value='2' name='$askiseisID[$i]' >2";
                                    echo "<input type='radio' value='3' name='$askiseisID[$i]' >3";
                                    echo "<input type='radio' value='4' name='$askiseisID[$i]' >4";
                                    echo "<input type='radio' value='5' name='$askiseisID[$i]' >5";
                                    echo "</p> </div>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3>Ερωτήσεις για τις εργασίες </h3>
                                <?php
                                for ($i = 0; $i < sizeof($ergasiesQuestion); $i++ ){
                                    echo "<div><p>".$ergasiesQuestion[$i]."</p></div>";
                                    echo "<div>";
                                    echo "<input type='radio' value='1' name='$ergasiesID[$i]' >1";
                                    echo "<input type='radio' value='2' name='$ergasiesID[$i]' >2";
                                    echo "<input type='radio' value='3' name='$ergasiesID[$i]' >3";
                                    echo "<input type='radio' value='4' name='$ergasiesID[$i]' >4";
                                    echo "<input type='radio' value='5' name='$ergasiesID[$i]' >5";
                                    echo "</p> </div>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3>Ερωτήσεις για τον καθηγητή </h3>
                                <?php
                                for ($i = 0; $i < sizeof($didaskonQuestion); $i++ ){
                                    echo "<div><p>".$didaskonQuestion[$i]."</p></div>";
                                    echo "<input type='radio' value='1' name='$didaskonID[$i]' >1";
                                    echo "<input type='radio' value='2' name='$didaskonID[$i]' >2";
                                    echo "<input type='radio' value='3' name='$didaskonID[$i]' >3";
                                    echo "<input type='radio' value='4' name='$didaskonID[$i]' >4";
                                    echo "<input type='radio' value='5' name='$didaskonID[$i]' >5";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3>Ερωτήσεις για τον Φοιτητή </h3>
                                <?php
                                for ($i = 0; $i < sizeof($foiththsQuestion); $i++ ){
                                    echo "<div><p>".$foiththsQuestion[$i]."</p></div>";
                                    echo "<input type='radio' value='1' name='$foiththsID[$i]' >1";
                                    echo "<input type='radio' value='2' name='$foiththsID[$i]' >2";
                                    echo "<input type='radio' value='3' name='$foiththsID[$i]' >3";
                                    echo "<input type='radio' value='4' name='$foiththsID[$i]' >4";
                                    echo "<input type='radio' value='5' name='$foiththsID[$i]' >5";
                                }
                                ?>
                            </td>
                        </tr>
                                <br><br>
                    </table>
                    <input type="hidden" name='token' value='<?=$student_key?>'>

                    </div>
                </div>
                <button class="submitButton" type="submit">Submit</button>
            </form>
        </div>
    </body>
</html>
