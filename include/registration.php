<?php
    session_start();

    include "connect.php";

    $fio = $_POST['fio'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = sprintf("INSERT INTO `users`(`fio`, `login`, `email`, `password`, `role`) VALUES
    ('%s', '%s', '%s', '%s', '1')", $fio, $login, $email, $password);

    if (!$db->query($sql)) {
        $_SESSION['message'] = "Ошибка добавления данных: " . $db->error;
        header("Location: ../Register_page.php");
    } else {
        $_SESSION['message'] = "Вы зарегистрировались!";
        header("Location:../Login_page.php");
    }


?>