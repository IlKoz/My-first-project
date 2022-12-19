<?php
    session_start();
    require "db.php";

    $id = $_SESSION['user']['id'];
    $email = $_SESSION['user']['email'];
    $role = $_SESSION['user']['role'];
    $color = $_SESSION['user']['color'];

    $file = $_FILES["file"];
    $filename = time() . $file["name"];
    $path = "uploads_avatar/" . $filename;
    $path2 = "../" . "$path";
    $save = move_uploaded_file($file["tmp_name"], $path2);
    if (!$save) {
        $_SESSION['message'] = "Ошибка при загрузке файла :(";
        header("Location:../file_avatar.php");
    } else {
        $quaryUpdate = "UPDATE `user` SET `avatar` = '$path' WHERE `user`.`id`='$id'";
        $update = mysqli_query($db,$quaryUpdate);
        $_SESSION['user'] = [
            "id" => $id,
            "email" => $email,
            "role" => $role,
            "avatar" => $path,
            "color" => $color
        ];
        header("Location:../user.php");
    }
?>