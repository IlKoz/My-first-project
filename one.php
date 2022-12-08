<?php
    require "lib/db.php";
    $id=$_GET["id"];
    $quarryOne="SELECT * FROM `info` where `info`.`id`='$id'";
    $one=mysqli_query($db,$quarryOne);
    $one=mysqli_fetch_assoc($one);
    if(!$one)
    {
        die ("error one");
    }
?>

<div>
    <p>info</p>
    <p><?=$one["info"]?></p>
    <br>
    <p>tooinfo</p>
    <p><?=$one["tooinfo"]?></p>
</div>