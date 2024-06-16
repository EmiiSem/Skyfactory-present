<?php
    // инициализация сессии
    session_start();

    if($_SESSION['user']['role'] == '1') {
        header("Location: ../pages/Quastion_all.php?message=Отказ в доступе");
    } else {
        // подключение к БД
        include "connect.php";
    
        // Получение данных из формы
        $name = htmlspecialchars($_POST['name']);
        $description = nl2br($_POST['description']); // nl2br служит для того, чтобы переносить текст на другую строку
    
        $path = "../assest/img/Quastions/" . time() . "_" . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $path);
    
        if(empty($name) || empty($description)) {
            $_SESSION['message'] = "Заполните все поля!";
            $_SESSION['highlight_fields'] = [];
            if (empty($name)) {
                $_SESSION['highlight_fields'][] = 'name';
            }
            if (empty($description)) {
                $_SESSION['highlight_fields'][] = 'description';
            }
            header("Location: ../pages/Quastion_add_page.php");
        } else {
            $db->query("INSERT INTO `questions`(`name`, `quastion_info`, `path`) VALUES('$name', '$description', '$path')");
            header("Location: ../pages/Quastion_all.php?message=Статья добавлена");
        }
    }

?>