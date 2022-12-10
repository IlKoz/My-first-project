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
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
    <header>
        <div class="header_section">
            <div class="header_item logo_div">
                <a href="index.php"><img class="logo" src="img/logo.png" alt="logo"></a>
            </div>
        </div>
        <div class="header_section">
            <div class="header_item basket">
            <a href="basket.php">
                    <span class="icon"><ion-icon name="basket-outline"></ion-icon></ion-icon></span>
                    <span class="text">Корзина</span>
                </a>
            </div>
            <?php
                if (isset($_SESSION['user'])) {
                    ?>

                    <div class="header_item login">
                        <a href="user.php?id=<?=$_SESSION['user']['id']?>">
                            <img class="avatar_header" src=" <?=$_SESSION['user']['avatar']?> " alt="gg">
                        </a>
                    </div>

                    <?php
                } else {
                    ?>

                    <div class="header_item login">
                    <a href="auth.php">
                        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                        <span class="text">Войти</span>
                    </a>
                    </div>

                    <?php
                }
            ?>
        </div>
    </header>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>