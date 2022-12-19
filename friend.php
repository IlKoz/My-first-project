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
    <link rel="stylesheet" href="css/friend.css">
    <title>Friends</title>
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
        <div class="sections">
            <h1 class="section_text">Друзья</h1>
            <section>
                    <?php
                        if (isset($_SESSION['user'])) {
                            ?>
                                
                                <?php
                                    require "lib/db.php";
                                    $user_id = $_SESSION['user']['id'];

                                    $quaryAll = "SELECT * FROM `friend` WHERE `friend`.`one_user`='$user_id' AND `status`='1' OR `two_user`='$user_id' AND `status`='1'";
                                    $all = mysqli_query($db,$quaryAll);
                                    $all = mysqli_fetch_all($all);
                                    if (!$all) {
                                        ?>
                                        <p class="text_section">Добавте своего первого друга!</p>
                                        <?php
                                    } else {
                                        foreach ($all as $item){
                                            if ($item[2] == $user_id) {
                                                $quaryAll2 = "SELECT * FROM `user` WHERE `user`.`id`='$item[1]'";
                                                $all2 = mysqli_query($db,$quaryAll2);
                                                $all2 = mysqli_fetch_all($all2);
                                                foreach ($all2 as $item2) {
                                                    ?>
                                                    <div class="user">
                                                        <div><a href="user.php?id=<?= $item2[0] ?>"><img class="photo" src="<?= $item2[4] ?>" alt="photo"></a></div>
                                                        <div class="nick" style="color: <?=$item2[5]?>;"><p><?=$item2[1]?></p></div>
                                                    </div>
                                                    <?php
                                                }
                                            } else {
                                                $quaryAll2 = "SELECT * FROM `user` WHERE `user`.`id`='$item[2]'";
                                                $all2 = mysqli_query($db,$quaryAll2);
                                                $all2 = mysqli_fetch_all($all2);
                                                foreach ($all2 as $item2) {
                                                    ?>
                                                    <div class="user">
                                                        <div><a href="user.php?id=<?= $item2[0] ?>"><img class="photo" src="<?= $item2[4] ?>" alt="photo"></a></div>
                                                        <div class="nick" style="color: <?=$item2[5]?>;"><p><?=$item2[1]?></p></div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        }
                                    }
                                ?>

                            <?php
                        }
                        
                    ?>
            </section>

            <h1 class="section_text">Подписки</h1>
            <section>
                <?php
                    if (isset($_SESSION['user'])) {
                        ?>
                            
                            <?php
                                require "lib/db.php";
                                $user_id = $_SESSION['user']['id'];

                                $quaryAll = "SELECT * FROM `friend_requests` WHERE `friend_requests`.`user_to`='$user_id'";
                                $all = mysqli_query($db,$quaryAll);
                                $all = mysqli_fetch_all($all);
                                if (!$all) {
                                    ?>
                                    <p class="text_section">Вы не на кого не подписаны</p>
                                    <?php
                                } else {
                                    foreach ($all as $item) {
                                        $quaryAll2 = "SELECT * FROM `user` WHERE `user`.`id`='$item[2]'";
                                        $all2 = mysqli_query($db,$quaryAll2);
                                        $all2 = mysqli_fetch_all($all2);
                                        foreach ($all2 as $item2) {
                                            ?>
                                            <div class="user">
                                                <div><a href="user.php?id=<?= $item2[0] ?>"><img class="photo" src="<?= $item2[4] ?>" alt="photo"></a></div>
                                                <div class="nick" style="color: <?=$item2[5]?>;"><p><?=$item2[1]?></p></div>
                                            </div>
                                            <?php
                                        }    
                                    }
                                }
                            
                            ?>

                        <?php
                    }
                    
                ?>
            </section>

            <h1 class="section_text">Подписчики</h1>
            <section>
                <?php
                    if (isset($_SESSION['user'])) {
                        ?>
                            
                            <?php
                                require "lib/db.php";
                                $user_id = $_SESSION['user']['id'];

                                $quaryAll = "SELECT * FROM `friend_requests` WHERE `friend_requests`.`user_from`='$user_id'";
                                $all = mysqli_query($db,$quaryAll);
                                $all = mysqli_fetch_all($all);
                                if (!$all) {
                                    ?>
                                    <p class="text_section">На вас ни кто не подписан</p>
                                    <?php
                                } else {
                                    foreach ($all as $item) {
                                        $quaryAll2 = "SELECT * FROM `user` WHERE `user`.`id`='$item[1]'";
                                        $all2 = mysqli_query($db,$quaryAll2);
                                        $all2 = mysqli_fetch_all($all2);
                                        foreach ($all2 as $item2) {
                                            ?>
                                            <div class="user">
                                                <div><a href="user.php?id=<?= $item2[0] ?>"><img class="photo" src="<?= $item2[4] ?>" alt="photo"></a></div>
                                                <div class="nick" style="color: <?=$item2[5]?>;"><p><?=$item2[1]?></p></div>
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                            ?>

                        <?php
                    }
                    
                ?>
            </section>
        </div>
    </main>
</body>
</html>