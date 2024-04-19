<?php
    if($_SESSION['user']['role'] != "2") {
        header("Location: ../../../../index.php?message=Отказано в доступе.");
    }
    require "../../../../include/connect.php";
    
    $category = htmlspecialchars($_POST['category']);

    $db->query(sprintf("INSERT INTO `categories`(category) VALUE('%s')", $category));

    return header("Location: ../Category_page.php?message=Категория_добавлена");
?>