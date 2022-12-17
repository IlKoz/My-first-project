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
        <?php
        if (isset($_SESSION['user'])) {
        ?>
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
                <section class="section1">
                    <?php
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

                                        $quarryOne2="SELECT * FROM `friend` WHERE `friend`.`one_user`='$user_id' AND `two_user`='$friend_id' OR `two_user`='$user_id' AND `one_user`='$friend_id'";
                                        $one2=mysqli_query($db,$quarryOne2);
                                        $one2=mysqli_fetch_assoc($one2);
                                        if ($one2) {
                                            ?>
                                            <h1 class="add_friends">Друг</h1>
                                            <?php
                                        } else {
                                            $quarryOne3="SELECT * FROM `friend_requests` WHERE `friend_requests`.`user_to`='$user_id' AND `user_from`='$friend_id'";
                                            $one3=mysqli_query($db,$quarryOne3);
                                            $one3=mysqli_fetch_assoc($one3);
                                            if ($one3) {
                                                ?>
                                                <h1 class="add_friends">Вы подписаны</h1>
                                                <?php
                                            } else {
                                                ?>
                                                <h1 class="add_friends"><a href="lib/add_friend.php?id=<?=$friend_id?>">Добавить в друзья</a></h1>
                                                <?php
                                            }
                                        }

                                    ?>
                                    <h1 class="name"> <?=$one["email"]?> </h1>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </section>
                
                <h1 class="section_text">Записи</h1>
                <section class="section2">
                    <div class="comments">
                        <div>
                            <img class="comments_avatar" src="<?=$_SESSION['user']['avatar']?>" alt="avatar">
                        </div>
                        <div class="textarea_div">
                            <form action="lib/add_comments.php" method="post">
                                <textarea name="comment" class="textarea" placeholder="Оставить комментарий..."></textarea>
                                <input name="id" type="hidden" value="<?=$_GET["id"]?>">
                                <input type="submit" value="Отправить">
                            </form>
                        </div>
                    </div>
                    <?php
                        $friend_id = $_GET["id"];
                        $user_id = $_SESSION['user']['id'];
                        $quarryAll="SELECT * FROM `comments` WHERE `comments`.`user_from`='$friend_id'";
                        $all=mysqli_query($db,$quarryAll);
                        $all=mysqli_fetch_all($all);
                        if (!$all) {
                            
                        } else {
                            foreach ($all as $item) {
                                $quarryOne = "SELECT * FROM `user` WHERE `user`.`id`='$item[1]'";
                                $one = mysqli_query($db, $quarryOne);
                                $one = mysqli_fetch_assoc($one);
                                ?>
                                <div class="comments">
                                    <div>
                                        <a href="user.php?id=<?=$one["id"]?>"><img class="comments_avatar" src="<?=$one["avatar"]?>" alt="photo"></a>
                                    </div>
                                    <div class="commentss">
                                        <p><?= $item[3] ?></p>
                                    </div>
                                    <?php
                                        if ($item[1] == $user_id) {
                                            ?>
                                            <div class="del">
                                                <a href="lib/del_comments.php?id=<?=$item[0]?>">Удалить</a>
                                            </div>
                                            <?php
                                        } else {

                                        }
                                    ?>
                                </div>
                                <?php
                            }
                        }
                        

                    ?>
                </section>
            </div>
        <?php
        } else {
            echo '<h1>Вы ещё не зарегались!!!</h1>';
        }
        ?>
    </main>
</body>
</html>    

