<?php
    session_start();
    require('../include/config.php');
    $sessionID = $_SESSION["id"];
    $query=mysqli_query($sql, 'SELECT *
                                    FROM student
                                    WHERE student.id ="' .$sessionID .'"');
    $row = mysqli_fetch_assoc($query);
    $studentName = $row["username"];
   $error = @$_GET["error"];
   $formError = @$_GET["formError"];
   $userError = @$_GET["userError"];
?>

<html>
<head>
    <title>Key</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="../css/keyStyle.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

</head>

<body>
<div>
    <h3 align="right"><b>Γειά σου </b><a href="profile.php"><span style="color:green"> <?= $studentName ?></span></a> !</h3>
    <h1 align="center"><b>Πλατφόρμα αξιολόγησης μαθημάτων έτους 2022</b> </h1>
    <h2 align="center"><b>Διεθνές Πανεπιστήμιο της Χώρας του Ποτέ</b></h2>

</div>
<div class="container">
    <div class="row justify-content-center">
        <h4 align="center"><b>Πληκτρολόγησε τον κωδικό αξιολόγησης!</b></h4>
        <div class="col-12 col-md-10 col-lg-8">
            <form class="card card-sm" method="post" action="../include/keyLogic.php">
                <div class="card-body row no-gutters align-items-center">
                    <div class="col-auto">
                        <i class="fas fa-search h4 "></i>
                    </div>
                    <div class="col">
                        <input name= "student_key" class="form-control form-control-lg form-control-borderless" type="search" placeholder="Type the key">
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-lg searchButton" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Unable to Enter Key</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <?php
            if($error){
                echo "Your key is an invalid code.";
            }
            if($formError){
                echo "Your key has already been used.";
            }
            if($userError){
                echo "This key is not connected to your profile.";
            }
            ?>
            </div>
      <div class="modal-footer">    
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
        </div>
    </div>
</div>
</div>

<?php if($error || $formError || $userError){
    echo"<script> $('#exampleModalCenter').modal('toggle');</script>";
}?>

</body>
</html>
