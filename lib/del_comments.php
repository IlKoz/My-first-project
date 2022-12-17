<?php
    session_start();
    require "db.php";
    $comment_id=$_GET["id"];
    $user_id = $_SESSION['user']['id'];

    $querryUsers="SELECT * FROM `comments` WHERE `comments`.`id`= '$comment_id'";
    $users=mysqli_query($db,$querryUsers);
    $users=mysqli_fetch_assoc($users);
    if ($user_id == $users["user_to"]) {
        $quaryDelete = "DELETE FROM `comments` WHERE `comments`.`id`='$comment_id'";
        $delete = mysqli_query($db,$quaryDelete);
        $id_from = $users["user_from"];
        header("Location:../user.php?id=$id_from");
    } else {
        $id_from = $users["user_from"];
        header("Location:../user.php?id=$id_from");
    }
?>