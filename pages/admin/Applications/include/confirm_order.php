<?php
    if($_SESSION['user']['role'] != "2") {
        header("Location: ../../../../index.php?message=Отказано в доступе.");
    }
    require "../../../../include/connect.php";
    
    $db->query("UPDATE `orders` SET `status`='Подтвержденный' WHERE `order_id`=".$_POST['id']);

    return header("Location: ../Applications_page.php?message=Статус заказа изменён на \"Подтвержденный\"");
?>