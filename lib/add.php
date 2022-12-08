<?php
    require "db.php";
    $info = $_POST["info"];
    $too = $_POST["tooinfo"];
    $file = $_FILES["photo"];

    $filename = time() . $file["name"];
    $path = "uploads_products/" . $filename;
    $path2 = "../" . "$path";
    $save = move_uploaded_file($file["tmp_name"], $path2);
    if (!$save) {
        $_SESSION['message'] = "Ошибка при загрузке файла :(";
        header("Location:../add.php");
    } else {
        $queryAdd = "INSERT INTO`info`(`id`,`info`,`tooinfo`,`photo`) VALUES (NULL, '$info','$too','$path')";
        $add = mysqli_query($db,$queryAdd);
        header("Location:../add.php");
    }

    //$queryAdd = "INSERT INTO`info`(`id`,`info`,`tooinfo`)
    //values(NULL, '$info','$too')";
    //$add = mysqli_query($db,$queryAdd);
    //header("Location:../add.php");
?>