<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/redact.css">
    <title>Redact</title>
</head>
<body>
    <?php
        require "lib/db.php";
        $id=$_GET["id"];
        $queryOneInfo="SELECT * FROM `info` where `info`.`id`='$id'";
        $oneInfo=mysqli_query($db,$queryOneInfo);
        $oneInfo=mysqli_fetch_assoc($oneInfo);
        if (!$oneInfo)
        {
            die('error oneInfo');
        }
    ?>
    <form action="lib/update.php" method="post">
        <h1>Redact</h1>
        <input type="hidden" name="id" value="<?=$oneInfo['id']?>"><br>
        <input type="text" name="info" placeholder="info" value="<?=$oneInfo['info']?>"><br>
        <input type="text" name="tooinfo" placeholder="tooinfo" value="<?=$oneInfo['tooinfo']?>"><br>
        <input type="submit" value="send">
    </form>
</body>
</html>