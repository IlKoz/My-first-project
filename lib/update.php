<?php
    require "db.php";
    $id = $_POST["id"];
    $info = $_POST["info"];
    $too = $_POST["tooinfo"];
    $quaryUpdate = "UPDATE `info` SET `info` = '$info',`tooinfo` = '$too' WHERE `info`.`id`='$id'";
    $update = mysqli_query($db,$quaryUpdate);
    header("Location:../index.php");
?>