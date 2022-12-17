<?php
    session_start();
    require "db.php";
    $friend_id = $_GET["id"];
    $user_id = $_SESSION['user']['id'];

    $quaryAll = "SELECT * FROM `friend_requests` WHERE `friend_requests`.`user_to`='$friend_id' AND `user_from`='$user_id'";
    $all = mysqli_query($db,$quaryAll);
    $all = mysqli_fetch_assoc($all);
    if (!$all) {
        $queryAdd = "INSERT INTO`friend_requests`(`id`,`user_to`,`user_from`) VALUES (NULL, '$user_id','$friend_id')";
        $add = mysqli_query($db,$queryAdd);
        header("Location:../user.php?id=$friend_id");
    } else {
        $id = $all["id"];

        $quaryDelete = "DELETE FROM `friend_requests` WHERE `friend_requests`.`id`='$id'";
        $delete = mysqli_query($db,$quaryDelete);

        $queryAdd = "INSERT INTO`friend`(`id`,`one_user`,`two_user`,`status`) VALUES (NULL, '$friend_id','$user_id','1')";
        $add = mysqli_query($db,$queryAdd);
        header("Location:../user.php?id=$friend_id");
    }
?>