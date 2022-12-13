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
    </br></br></br>
    <img src="../images/admin.jpg">
    </br></br></br>
    <div align="center">
        <form action="#" method="post">
            <select class="form-select" aria-label="Default select example" name="subjects">
                <option selected>Διάλεξε μάθημα για αποτελέσματα</option>
                <option value="1">Μαθηματικά</option>
                <option value="2">Φυσική</option>
                <option value="3">Χημεία</option>
                <option value="4">Αστρονομία</option>
            </select>
            <input type="submit" name="submit" value="Υποβολή" />
        </form>
    </div>
    </body>
</html>

<?php
if(isset($_POST['submit'])){
    $selected_val = $_POST['subjects'];
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