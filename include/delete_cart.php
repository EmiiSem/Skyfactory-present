<?php
    session_start();

    require "connect.php";

    $id = $_GET['id'];

    $sql = sprintf("SELECT `order_id`, `product_id`, `number`, `orders`.`count` as `ocount`, `name`, `products`.`count` as `pcount` FROM `orders` INNER JOIN `products` USING(`product_id`) WHERE `user_id`='%s' AND `product_id`='%s'", $_SESSION["user"]["id"], $id);

    $order = $db->query($sql)->fetch_assoc();

    if($order['ocount'] > 1) {
        $db->query(sprintf("UPDATE `orders` SET `count`='%s' WHERE `product_id`='%s'",
        --$order['ocount'], $order['product_id']));
    } else {
        $db->query(sprintf("DELETE FROM `orders` WHERE `user_id`='%s' AND `product_id`='%s'",
        $_SESSION['user']['id'], $order['product_id']));
    }

    $db->query(sprintf("UPDATE `products` SET `count`='%s' WHERE `product_id`='%s'",
    ++$order['pcount'], $order['product_id']));

    return header("Location: ../pages/Basket.php");

?>