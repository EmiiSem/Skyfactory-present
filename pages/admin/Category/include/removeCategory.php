<?php
    if($_SESSION['user']['role'] != "2") {
        header("Location: ../../../../index.php?message=Отказано в доступе.");
    }
    require "../../../../include/connect.php";
    
    $category = $_POST['category-list'];

    $db->query(sprintf("DELETE FROM `categories` WHERE `category`='%s'", $category));

    return header("Location: ../Category_page.php?message=Категория_удалена");
?>