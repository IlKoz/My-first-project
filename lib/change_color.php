<?php
    session_start();
    require "db.php";

    $color = $_POST["color"];
    $user_id = $_SESSION['user']['id'];
    $user_email = $_SESSION['user']['email'];
    $user_avatar = $_SESSION['user']['avatar'];
    $user_role = $_SESSION['user']['role'];

    $quaryUpdate = "UPDATE `user` SET `color` = '$color' WHERE `user`.`id`='$user_id'";
    $update = mysqli_query($db,$quaryUpdate);

    $_SESSION['user'] = [
        "id" => $user_id,
        "email" => $user_email,
        "role" => $user_role,
        "avatar" => $user_avatar,
        "color" => $color
    ];

    header("Location:../user.php?id=$user_id");
?>