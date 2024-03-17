<?php
    session_start();

    if(!isset($_SESSION['user']['id'])) {
        $_SESSION['message'] = "Вы не авторизированы";
        header("Location: ../index.php");
    }

    require "connect.php";

    $id = $_GET['id'];

    $order = $db->query("SELECT * FROM `orders` WHERE `user_id`='".$_SESSION['user']['id']."' AND `order_id`=".$id)->fetch_assoc();

    if($order['status'] != "Новый") {
        return header("Location: ../Personal_shoplist_page.php?message=Удалить можно только заказы со статусом \"Новый\"");
    } else {
        $db->query("DELETE FROM `orders` WHERE `order_id`=".$order['order_id']);
        header("Location: ../Personal_shoplist_page.php?message=Заказ был удалён");
    }

?>