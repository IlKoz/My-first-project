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
    <link rel="stylesheet" href="css/change_color.css">
    <title>change_color</title>
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
        <section>
            <div class="div1">
                <div class="div2">
                    <h1>Сменить цвет ника</h1><br>
                </div>
                <div class="div2">
                    <form action="lib/change_color.php" method="post">
                        <input type="color" name="color" value="<?=$_SESSION['user']['color']?>"><br><br>
                        <input type="submit" value="Сменить">
                    </form>
                </div>
            </div>
        </section>
        <?php
        } else {
            echo '<h1>Вы ещё не зарегались!!!</h1>';
        }
        ?>
</body>
</html>