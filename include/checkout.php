<?php
    require "connect.php";

    $sql = sprintf("SELECT SUM(orders.`count`) FROM `orders` WHERE `user_id`='%s' AND `number` IS NULL", $_SESSION['user']['id']);

    // $sql2 = sprintf("SELECT `product_id` FROM `orders` INNER JOIN `products` USING(`product_id`) WHERE `user_id`='%s'", $_SESSION['user']['id']);
    // $result = $db->query($sql2);

    // $row = $result->fetch_assoc();
    // $product = $row['product_id'];

    // if($result == false) {
    //     die("Ошибка выполнения запроса: " . $db->error);
    // }

    $chars = '0123456789';
    $number = substr(str_shuffle($chars), 0, 5);
    
    $count = $db->query($sql)->fetch_array()[0];

    $db->query(sprintf("INSERT INTO `orders` (`product_id`, `user_id`, `number`, `count`, `status`)
    VALUES ('%s', '%s', '%s', '%s', 'Новый')", $row['product_id'], $_SESSION['user']['id'], $number, $count));

    $db->query(sprintf("DELETE FROM `orders` WHERE `user_id`='%s' AND `number` IS NULL", $_SESSION['user']['id']));

    return header("Location: ../Basket.php?message=Заказ оформлен");

?>