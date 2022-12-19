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
    <link rel="stylesheet" href="css/buy_vip.css">
    <title>buy_vip</title>
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
                <a class="buy" href="lib/buy_vip.php">Купить VIP за 99 руб</a>
            </div>
        </section>
        <?php
        } else {
            echo '<h1>Вы ещё не зарегались!!!</h1>';
        }
        ?>
</body>
</html>