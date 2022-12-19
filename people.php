<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/people.css">
    <title>People</title>
</head>
<body>
    <?php
        require "header.php";
    ?>
    <main>
        <aside>
            <div class="link">
                <a href="people.php">
                    <span class="icon"><ion-icon name="people-outline"></ion-icon></span><br>
                    <span class="text">Люди</span>
                </a>
            <div>
            <div class="link">
                <a href="friend.php">
                    <span class="icon"><ion-icon name="people-circle-outline"></ion-icon></span><br>
                    <span class="text">Друзья</span>
                </a>
            <div>
        </aside>
        <section>
                <?php
                    if (isset($_SESSION['user'])) {
                        ?>
                            
                            <?php
                                require "lib/db.php";
                                $quaryAll = "SELECT * FROM `user`";
                                $all = mysqli_query($db,$quaryAll);
                                $all = mysqli_fetch_all($all);
                                foreach ($all as $item){        
                            ?>
                                <div class="user">
                                    <div><a href="user.php?id=<?=$item[0]?>"><img class="photo" src="<?=$item[4]?>" alt="photo"></a></div>
                                    <div class="nick"><p style="color: <?=$item[5]?>;"><?=$item[1]?></p></div>
                                </div>
                            <?php
                                }
                            ?>

                        <?php
                    }
                    
                ?>
        </section>
    </main>
</body>
</html>