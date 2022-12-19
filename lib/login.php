<?php
    session_start();
    require "db.php";

    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $querryUser="SELECT * FROM `user` WHERE `user`.`email`= '$email'";
    $user=mysqli_query($db,$querryUser);
    $user=mysqli_fetch_assoc($user);

    if($user["pass"] == $pass) {

        $_SESSION['user'] = [
            "id" => $user['id'],
            "email" => $user['email'],
            "role" => $user['role'],
            "avatar" => $user['avatar'],
            "color" => $user['color']
        ];

        $userid = $user["id"];
        header("Location:../user.php?id=$userid");
    } else {
        $_SESSION['message'] = "Неправельная почта или пароль :(";
        header("Location:../auth.php");
    }
?>