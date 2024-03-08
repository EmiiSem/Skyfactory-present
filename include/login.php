<?php
    session_start();

    include "connect.php";

    $login = $_POST['login'];
    $password = $_POST['password'];

    $checkUser = mysqli_query($db, "SELECT * FROM `users` WHERE `login` = '$login'");

    if(mysqli_num_rows($checkUser) > 0) {
        $user = mysqli_fetch_assoc($checkUser);
        if(password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' =>  $user['id'],
                'fio' =>  $user['fio'],
                'login' => $user['login'],
                'email' => $user['email'],
                'role' => $user['role'],
            ];
            $_SESSION['message'] = 'Авторизация успешна!';
            header('Location: ../index.php');
        } else {
            $_SESSION['message'] = 'Пароль указан неверно!';
            header('Location: ../Login_page.php');
        }   
    } else {
        $_SESSION['message'] = 'Такого пользователя не существует';
        header('Location: ../Login_page.php');
    }

    // Закрытие соединения с базой данных
    mysqli_close($db);
?>