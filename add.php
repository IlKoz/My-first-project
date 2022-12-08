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
    <link rel="stylesheet" href="css/add.css">
    <title>add</title>
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
                    
                    <div>
                        <form class="box" action="lib/add.php" method="post" enctype="multipart/form-data">
                            <h1>Add a product</h1>
                            <input type="text" name="info" placeholder="info"><br>
                            <input type="text" name="tooinfo" placeholder="tooinfo"><br>
                            <input class="input_file" id="input_file" type="file" name="photo"><br>
                            <label for="input_file">Выберите картинку</label><br>
                            <input type="submit" value="Add">
                            <?php
                                if (isset($_SESSION['message'])) {
                                    echo '<p>' . $_SESSION['message'] . '</p>';
                                }
                                unset($_SESSION['message']);
                            ?>
                        </form>
                    </div>
                    <div>
                        <table>
                            <tr>
                                <th>id</th>
                                <th>photo</th>
                                <th>info</th>
                                <th>tooinfo</th>
                            </tr>
                            <?php
                                require "lib/db.php";
                                $quaryAll = "SELECT * FROM `info`";
                                $all = mysqli_query($db,$quaryAll);
                                $all = mysqli_fetch_all($all);
                                foreach ($all as $item){        
                            ?>
                                <tr>
                                    <td><?=$item[0]?></td>
                                    <td><img class="photo" src="<?=$item[3]?>" alt="photo"></td>
                                    <td><?=$item[1]?></td>
                                    <td><?=$item[2]?></td>
                                    <td><a class="one" href="one.php?id=<?=$item[0]?>">open one</a></td>
                                    <td><a class="redact" href="redact.php?id=<?=$item[0]?>">redact</a></td>
                                    <td><a class="delete" href="delete.php?id=<?=$item[0]?>">delete</td>
                                </tr>
                            <?php
                                }
                            ?>
                        </table>
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