<?php
    require "lib/db.php";
    $id=$_GET["id"];
    $quaryDelete = "DELETE FROM `info` WHERE `info`.`id`='$id'";
    $delete = mysqli_query($db,$quaryDelete);
    header("Location:../add.php");
?>