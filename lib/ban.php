<?php
    require "db.php";
    $id=$_GET["id"];
    $quaryDelete = "DELETE FROM `user` WHERE `user`.`id`='$id'";
    $delete = mysqli_query($db,$quaryDelete);
    header("Location:../users.php");
?>