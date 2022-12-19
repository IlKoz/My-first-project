<?php
    session_start();
    require "db.php";
    $user_id = $_SESSION['user']['id'];
    $user_email = $_SESSION['user']['email'];
    $user_avatar = $_SESSION['user']['avatar'];
    $user_color = $_SESSION['user']['color'];

    $quaryUpdate = "UPDATE `user` SET `role` = 'vip' WHERE `user`.`id`='$user_id'";
    $update = mysqli_query($db,$quaryUpdate);

    $_SESSION['user'] = [
        "id" => $user_id,
        "email" => $user_email,
        "role" => "vip",
        "avatar" => $user_avatar,
        "color" => $user_color
    ];

    header("Location:../user.php?id=$user_id");
?>