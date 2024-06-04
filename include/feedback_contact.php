<?php
    // Получение параметров из формы и защита их от внедрения JS-кода
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Подключение к базе данных
    require "connect.php";

    // Создание запроса на добавление данных в БД с условием, если поля не пусты
    if(!empty($name) && !empty($email) && !empty($message)) {
        $sql = mysqli_query($db, "INSERT INTO `feedback`(`name`, `email`, `message`) VALUES ('$name', '$email', '$message')");
        header("Location: ../pages/Contact_page.php?message=Ваше сообщение получено");
    } else {
        header("Location: ../pages/Contact_page.php?message=Заполните все поля");
    }

?>