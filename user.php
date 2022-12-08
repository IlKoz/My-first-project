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
                echo '<h1>Вы ещё не зарегались!!!</h1>';
            }
        ?>
    </main>
</body>
</html>