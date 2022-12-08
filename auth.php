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
    <link rel="stylesheet" href="css/auth.css">
    <title>auth</title>
</head>
<body>
    <?php
        require "header.php";
    ?>
    <main>
        <form action="lib/login.php" method="post">
            <h1>Sign in</h1><br>
            <input type="text" name="email" placeholder="email" autocomplete="off"><br>
            <input type="text" name="pass" placeholder="pass" autocomplete="off"><br>
            <input type="submit" value="Sign in">
            <?php
                if (isset($_SESSION['message'])) {
                    echo '<p>' . $_SESSION['message'] . '</p>';
                }
                unset($_SESSION['message']);
            ?>
        </form>

        <form action="lib/reg.php" method="post">
            <h1>Register</h1><br>
            <input type="text" name="email" placeholder="email" autocomplete="off" minlength="3"><br>
            <input type="text" name="pass" placeholder="pass" autocomplete="off" minlength="3"><br>
            <input type="text" name="confirm" placeholder="confirm" autocomplete="off" minlength="3"><br>
            <input type="submit" value="Reg">
            <?php
                if (isset($_SESSION['message2'])) {
                    echo '<p>' . $_SESSION['message2'] . '</p>';
                }
                unset($_SESSION['message2']);
            ?>
        </form>
    </main>
</body>
</html>