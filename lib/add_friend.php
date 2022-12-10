<?php
    session_start();
    require "db.php";
    $friend_id = $_GET["id"];
    $user_id = $_SESSION['user']['id'];

    $queryAdd = "INSERT INTO`friend`(`id`,`user_id`,`friend_id`) VALUES (NULL, '$user_id','$friend_id')";
    $add = mysqli_query($db,$queryAdd);
    header("Location:../user.php?id=$friend_id");
?>