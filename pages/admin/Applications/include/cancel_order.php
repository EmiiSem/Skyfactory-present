<?php
    if($_SESSION['user']['role'] != "2") {
        header("Location: ../../../../index.php?message=Отказано в доступе.");
    }
    require "../../../../include/connect.php";

    $reason = sqlite_escape_string($_POST['reason']);
    $id = $_POST['id'];
    
    $db->query("UPDATE `orders` SET `status`='Отменённый', `reason`='%s' WHERE `order_id`='%s'", $reason, $id);

    return header("Location: ../Applications_page.php?message=Статус заказа изменён на \"Отменённый\"");
?>