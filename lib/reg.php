<?php

    session_start();
    require "db.php";

    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $confirm = $_POST["confirm"];

    if ($pass!==$confirm){
        $_SESSION['message2'] = "Пароли не совпадают :(";
        header("Location:../auth.php");
        die("Пароли не совпадают :(");
    }   

    $querryAllUsers="SELECT * FROM `user` WHERE `user`.`email`= '$email'";
    $allUsers=mysqli_query($db,$querryAllUsers);
    $allUsers=mysqli_fetch_assoc($allUsers);

    if(!$allUsers){
        $querryAddUsers = "INSERT INTO `user`(`id`,`email`,`pass`,`role`,`avatar`,`color`) VALUES(NULL,'$email','$pass','user','img/profile.png','#000000')";
        $addUser=mysqli_query($db,$querryAddUsers);
        $_SESSION['message2'] = "Вы успешно зарегистрировались :)";
        header("Location:../auth.php");

    } else{
        $_SESSION['message2'] = "Эта почта уже занята :(";
        header("Location:../auth.php");
    }

?>
