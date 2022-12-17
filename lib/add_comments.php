<?php
    session_start();
    require "db.php";
    $from_id = $_POST["id"];
    $user_id = $_SESSION['user']['id'];
    $comment = $_POST["comment"];

    $queryAdd = "INSERT INTO`comments`(`id`,`user_to`,`user_from`,`body`) VALUES (NULL, '$user_id','$from_id','$comment')";
    $add = mysqli_query($db,$queryAdd);
    header("Location:../user.php?id=$from_id");
?>