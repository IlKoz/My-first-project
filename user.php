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
    <link rel="stylesheet" href="css/user.css">
    <title>User</title>
</head>
<body>
    <?php
        require "header.php";
    ?>
    <main>
        <aside>
            <a href="people.php">
                <span class="icon"><ion-icon name="people-outline"></ion-icon></span><br>
                <span class="text">Люди</span>
            </a>
            <a href="friend.php">
                <span class="icon"><ion-icon name="people-circle-outline"></ion-icon></span><br>
                <span class="text">Друзья</span>
            </a>
        </aside>

        <section>
            <?php
                if (isset($_SESSION['user'])) {

                    require "lib/db.php";
                    $id=$_GET["id"];
                    $quarryOne="SELECT * FROM `user` where `user`.`id`='$id'";
                    $one=mysqli_query($db,$quarryOne);
                    $one=mysqli_fetch_assoc($one);
                    if(!$one)
                    {
                        die ("error one");
                    }

                    if ($id == $_SESSION['user']['id']) {
                        ?>
                        <div class="content">
                            <div class="content_item">
                                <img class="avatar" src="<?=$_SESSION['user']['avatar']?>" alt="avatar">
                                <h1 class="change_avatar"><a href="file_avatar.php">Сменить аватарку</a></h1>
                                <h1 class="name"> <?=$_SESSION['user']['email']?> </h1>
                                <h1 class="logout"><a href="lib/logout.php">Выйти</a></h1>
                            </div>
                        </div>
                        <?php
                        if ($_SESSION['user']['role'] == 'user') {
                            ?>



                            <?php
                        } else if ($_SESSION['user']['role'] == 'admin') {
                            ?>
                            <div class="content">
                                <div class="content_item">
                                    <h1 class="admin_panel"><a href="add.php">Админ-панель(товаров)</a></h1>
                                    <h1 class="admin_panel"><a href="users.php">Админ-панель(пользователей)</a></h1>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="content">
                            <div class="content_item">
                                <img class="avatar" src="<?=$one["avatar"]?>" alt="avatar">
                                <?php
                                    
                                    require "lib/db.php";
                                    $friend_id = $_GET["id"];
                                    $user_id = $_SESSION['user']['id'];
                
                                    $quarryOne2="SELECT * FROM `friend` WHERE `friend`.`user_id`='user_id' AND `friend_id`='$friend_id'";
                                    $one2=mysqli_query($db,$quarryOne2);
                                    $one2=mysqli_fetch_assoc($one2);
                                    if(!$one2)
                                    {
                                        ?>
                                        <h1 class="add_friends">Добавить в друзья</h1>
                                        <?php
                                        
                                    } else {
                                        if ($one2["status"] == 0) {
                                            ?>
                                            <h1 class="add_friends">Вы подписаны</h1>
                                            <?php
                                        } else {
                                            ?>
                                            <h1 class="add_friends">Друг</h1>
                                            <?php
                                        }
                                    }
                                    

                                ?>
                                <h1 class="name"> <?=$one["email"]?> </h1>
                            </div>
                        </div>
                        <?php
                    }

                } else {
                    echo '<h1>Вы ещё не зарегались!!!</h1>';
                }
            ?>
        </section>
    </main>
</body>
</html>    

