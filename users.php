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
    <link rel="stylesheet" href="css/users.css">
    <title>Users</title>
</head>
<body>
    <?php
        require "header.php";
    ?>
    <main>
        <?php
            if (isset($_SESSION['user'])) {
                ?>
                
                <?php
                if ($_SESSION['user']['role'] == 'user') {
                    ?>

                        <h1>У вас нет доступа!!!</h1>

                    <?php
                } else if ($_SESSION['user']['role'] == 'admin') {
                    ?>
                    
                    <table>
                        <tr>
                            <th>id</th>
                            <th>email</th>
                            <th>pass</th>
                        </tr>
                        <?php
                            require "lib/db.php";
                            $quaryAll = "SELECT * FROM `user`";
                            $all = mysqli_query($db,$quaryAll);
                            $all = mysqli_fetch_all($all);
                            foreach ($all as $item){        
                        ?>
                            <tr>
                                <td><?=$item[0]?></td>
                                <td><?=$item[1]?></td>
                                <td><?=$item[2]?></td>
                                <td><a class="ban" href="lib/ban.php?id=<?=$item[0]?>">Забанить</td>
                            </tr>
                        <?php
                            }
                        ?>
                    </table>

                    <?php
                }
            } else {
                echo '<h1>Вы ещё не зарегались!!!</h1>';
            }
        ?>
    </main>
</body>
</html>