<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../css/formStyle.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Completed</title>
</head>
<body>
    <div class="thanks" style="text-align: center; margin-top: 10%">
        <h1>Ευχαριστούμε για την Αξιολόγηση!</h1>
    </div>
    <div class="container" style="margin-top: 5%">
        <div class="row">
            <div class="logout col-sm-6" style="text-align: center">    
                <form method="post" action="../include/completedLogic.php">
                    <button type="submit" class="btn btn-light">Αποσύνδεση</button>
                </form>
            </div>
            <div class="continue col-sm-6" style="text-align: center">
                <a type="button" class="btn btn-light" href="./key.php">Εισαγωγή Διαφορετικού Κωδικού</a>
            </div>
        </div>
    </div>
</body>
</html>