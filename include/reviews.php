<?php
    session_start();

    require "connect.php";

    if($_SESSION['user']['role'] == '1') {
        header("Location: ../pages/Reviews_add.php");
    } else {
        $_SESSION['message'] = "Пожалуйста, авторизируйтесь, чтобы добавить отзыв!";
        header("Location: ../pages/Login_page.php");
    }
?>