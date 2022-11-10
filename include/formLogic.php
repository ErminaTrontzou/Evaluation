<?php
    session_start();
    require('../include/config.php');
    $sessionID = $_SESSION["id"];
    $query=mysqli_query($sql, "SELECT * FROM subject WHERE ");
    $row = mysqli_fetch_assoc($query);
