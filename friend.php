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
    <link rel="stylesheet" href="css/friend.css">
    <title>People</title>
</head>
<body>
    <?php
        require "header.php";
    ?>
    <main>
        <aside>
            <a href="people.php">
                <span class="icon"><ion-icon name="people-outline"></ion-icon></span><br>
                <span class="text">Люди</span>
            </a>
            <a href="friend.php">
                <span class="icon"><ion-icon name="people-circle-outline"></ion-icon></span><br>
                <span class="text">Друзья</span>
            </a>
        </aside>
        <div class="sections">
            <h1 class="section_text">Друзья</h1>
            <section>
                <div class="table">
                    <?php
                        if (isset($_SESSION['user'])) {
                            ?>
                            <table>
                                
                                <?php
                                    require "lib/db.php";
                                    $user_id = $_SESSION['user']['id'];

                                    $quaryAll = "SELECT * FROM `friend` WHERE `friend`.`user_id`='$user_id'";
                                    $all = mysqli_query($db,$quaryAll);
                                    $all = mysqli_fetch_all($all);
                                    foreach ($all as $item){
                                        $quaryAll2 = "SELECT * FROM `friend` WHERE `friend`.`user_id`='$item[2]'";
                                        $all2 = mysqli_query($db,$quaryAll2);
                                        $all2 = mysqli_fetch_all($all2);
                                        foreach ($all2 as $item2) {
                                            if ($item2[1] == $_SESSION['user']['id']) {
                                            ?>
                                                <tr>
                                                    <td><a href="user.php?id=<?= $item[0] ?>"><img class="photo" src="<?= $item[4] ?>" alt="photo"></a></td>
                                                    <td><?= $item[1] ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    }
                                ?>
                            </table>

                            <?php
                        }
                        
                    ?>
                </div>
            </section>

            <h1 class="section_text">Ожидание ответа</h1>
            <section>
                <div class="table">
                    <?php
                        if (isset($_SESSION['user'])) {
                            ?>
                            <table>
                                
                                <?php
                                    require "lib/db.php";
                                    $user_id = $_SESSION['user']['id'];

                                    $quaryAll = "SELECT * FROM `friend` WHERE `friend`.`user_id`='$user_id'";
                                    $all = mysqli_query($db,$quaryAll);
                                    $all = mysqli_fetch_all($all);
                                    foreach ($all as $item){
                                        $quaryAll2 = "SELECT * FROM `friend` WHERE `friend`.`user_id`='$item[2]'";
                                        $all2 = mysqli_query($db,$quaryAll2);
                                        $all2 = mysqli_fetch_all($all2);
                                        foreach ($all2 as $item2){
                                            if ($item2[1] != $_SESSION['user']['id']) {
                                                ?>
                                                <tr>
                                                    <td><a href="user.php?id=<?=$item[0]?>"><img class="photo" src="<?=$item[4]?>" alt="photo"></a></td>
                                                    <td><?=$item[1]?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    }
                                ?>
                            </table>

                            <?php
                        }
                        
                    ?>
                </div>
            </section>
        </div>
    </main>
</body>
</html>