<?php
    session_start();

    if(!isset($_SESSION['user']['id'])) {
        $_SESSION['message'] = "Вы не авторизированы";
        header("Location: ../pages//Login_page.php");
    }

    require "connect.php";

    $sql = sprintf("SELECT SUM(`count`), `product_id` FROM `orders` WHERE `user_id`='%s'
    AND `number` IS NULL", $_SESSION["user"]['id']);

    $count = $db->query($sql)->fetch_array()[0];

    $product = $db->query($sql)->fetch_assoc();

    $db->query(sprintf("INSERT INTO `orders`(`product_id`, `user_id`, `number`, `count`, `status`) 
    VALUES('%s', '%s', '%s', '%s', 'Новый')", $product['product_id'] , $_SESSION["user"]['id'], rand(1000000000,2000000000), $count));
    // $db->query(sprintf("UPDATE `orders` SET `product_id`='%s', `user_id`='%s', `number`='%s', `count`='%s', `status`='Новый'", $product['product_id'], $_SESSION["user"]['id'], rand(1000000000,2000000000), $count));

    if($db->affected_rows > 0) {
        $db->query(sprintf("DELETE FROM `orders` WHERE `user_id`='%s' AND `number` IS NULL",
        $_SESSION["user"]['id']));
    }

    return header("Location: ../pages/Personal_shoplist_page.php?message=Заказ оформлен");

?>