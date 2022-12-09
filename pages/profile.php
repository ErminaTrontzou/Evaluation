<?php
session_start();
require('../include/config.php');
$sessionID = $_SESSION["id"];
$query=mysqli_query($sql, 'SELECT *
                                    FROM student
                                    WHERE student.id ="' .$sessionID .'"');
$row = mysqli_fetch_assoc($query);
    $studentFullName = $row["last_name"]." ".$row["first_name"];
    $studentUsername = $row["username"];
    $studentEmail = $row["email"];
    $studentSemester = $row["semester"];
    $studentEntryYear = $row["entry_year"];
    $studentFather = $row["fathers_name"];
    $studentPhone = $row["phone"];
    $studentCity = $row["city"];
    $studentGender = $row["gender"];

?>

<html>
    <head>
        <meta charset="utf-8"/>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="../css/profileStyle.css" rel="stylesheet">
    </head>
    <body>
    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <?php if($studentGender == 'M') {
                            echo "<div><img src='../images/student_avatar_m.png' alt='male_student'/></div>";
                            }else{
                            echo "<div><img src='../images/student_avatar_f.png' alt='female_student'/></div>";
                            }
                            ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h3>
                            </br><?= $studentFullName?>
                        </h3>
                        <h6>
                            Student
                        </h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $sessionID?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Username</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $studentUsername?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Όνομα Πατρός</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $studentFather?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $studentEmail?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Κινητό</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $studentPhone?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Πόλη</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $studentCity?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Χρονιά Εγγραφής</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $studentEntryYear?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Εξάμηνο</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $studentSemester?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </body>
</html>
