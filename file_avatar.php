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
    <link rel="stylesheet" href="css/file_avatar.css">
    <title>File_avatar</title>
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
                    <form action="lib/uploads_avatar.php" method="post" enctype="multipart/form-data">
                        <input class="input_file" id="input_file" type="file" name="file"><br>
                        <label for="input_file">Выберите файл</label><br>
                        <input type="submit" value="Сменить">
                        <?php
                            if (isset($_SESSION['message'])) {
                                echo '<p>' . $_SESSION['message'] . '</p>';
                            }
                            unset($_SESSION['message']);
                        ?>
                    </form>
                </div>
                <?php
            } else {
                echo '<h1>Вы ещё не зарегались!!!</h1>';
            }
        ?>
    </main>
</body>
</html>