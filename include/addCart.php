<?php
    session_start();

    if(!isset($_SESSION['user']['id'])) {
        header("Location: ../pages/Login_page.php");
        $_SESSION['message'] = "Вы не авторизированы";
    }

    include "connect.php";

    $id = $_GET['id'];

    $sql = "SELECT * FROM `products` WHERE `product_id`=".$id;

    $product = $db->query($sql)->fetch_assoc();

    if($product['count'] == 0) {
        return header("Location: ../pages/Basket.php?message=Товар отсутствует");
    }

    $sql = sprintf("SELECT * FROM `orders` WHERE `user_id`='%s' AND `product_id`='%s'",
    $_SESSION['user']['id'], $id);

    if($order = $db->query($sql)->fetch_assoc()) {
        $db->query(sprintf("UPDATE `orders` SET `count`='%s' WHERE `product_id`='%s'",
        ++$order['count'], $order['product_id']));
    } else {
        $db->query(sprintf("INSERT INTO `orders` (`product_id`, `user_id`, `count`) VALUES ('%s', '%s', '%s')", $product['product_id'], $_SESSION['user']['id'], 1));
    }

    $db->query(sprintf("UPDATE `products` SET `count`='%s' WHERE `product_id`='%s'",
    --$product['count'], $product['product_id']));

    return header("Location: ../pages/Basket.php");

    
?>