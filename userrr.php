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
                                    $user_id = $_SESSION['user']['id'];
                                    $quarryFriend="SELECT * FROM `friend` where `friend`.`user_id`='$user_id'";
                                    $friend=mysqli_query($db,$quarryFriend);
                                    $friend=mysqli_fetch_all($friend);
                                    if(!$friend)
                                    {
                                        ?>
                                            <h1 class="add_friends"><a href="lib/add_friend.php?id=<?=$id?>">Добавить в друзья</a></h1>
                                        <?php
                                    } else {
                                        foreach ($friend as $item) {
                                            if ($item[2] == $id) {
                                                ?>
                                                    <h1 class="add_friends">ожидание ответа</h1>
                                                <?php
                                            } else {
                                                ?>
                                                    <h1 class="add_friends"><a href="lib/add_friend.php?id=<?=$id?>">Добавить в друзья</a></h1>
                                                <?php
                                            }
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