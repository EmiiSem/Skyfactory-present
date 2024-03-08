<?php
    session_start();

    require "connect.php";

    if(!empty($_POST['advantage']) && !empty($_POST['disadvantage']) && !empty($_POST['comment'])) {
        // Получение данных пользователя
        $user_id = $_SESSION['user']['id'];

        // Получение данных отзыва
        $advantage = $db->real_escape_string($_POST['advantage']);
        $disadvantage = $db->real_escape_string($_POST['disadvantage']);
        $comment = $db->real_escape_string($_POST['comment']);


        $sql = sprintf("INSERT INTO `reviews` (`advantage`, `disadvantage`, `comment`, `user_id`)
            VALUES ('%s', '%s', '%s', '%s')", $advantage, $disadvantage, $comment, $user_id);
        
        if($db->query($sql)) {
            $_SESSION['message2'] = "Ваш отзыв добавлен!";
            header("Location: ../Reviews_add.php");
        } else {
            $_SESSION['message2'] = "Ошибка добавления данных: " . $sql . "<br>" . $db->error;
            header("Location: ../Reviews_add.php");
        }
    } else {
        $_SESSION['message2'] = "Заполните все поля!";
        header("Location: ../Reviews_add.php");
    }

    $db->close();

?>