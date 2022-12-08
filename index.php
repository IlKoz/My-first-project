<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/index.css">
    <title>index</title>
</head>
<body>
    <?php
        require "header.php";
    ?>
    <main>
        <?php
            require "lib/db.php";
            $quaryAll = "SELECT * FROM `info`";
            $all = mysqli_query($db,$quaryAll);
            $all = mysqli_fetch_all($all);
            foreach ($all as $item){        
        ?>
            <div class="card">
                <div class="card_image">
                    <img src="<?=$item[3]?>" alt="photo">
                </div>
                <div class="card_content">
                    <h1><?=$item[1]?></h1>
                    <h1><?=$item[2]?> руб</h1>
                    <div class="card_buy">
                        <img class="buy" src="img/buy.png" alt="buy">
                    </div>
                </div>
            </div>
        <?php
            }
        ?>
    </main>

</body>
</html>