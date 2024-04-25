<?php
    session_start();
    if($_SESSION['user']['role'] != "2") {
        header("Location: ../../../index.php?message=Отказано в доступе.");
    }
    require "../../../include/connect.php";

    $sql = "SELECT * FROM `orders` INNER JOIN users ON orders.user_id = users.id WHERE `status` IS NOT NULL ORDER BY `created_at` DESC";
    $result = $db->query($sql);
    $orders = "";
    
    while($row = $result->fetch_assoc()) {
        $adv = ($row['status'] == "Новый") ? '
        <form action="include/confirm_order.php" method="POST">
            <input type="hidden" value="' .$row['order_id'] . '" name="id">
            <button class="btn__confirm">Подтвердить заказ</button>
        </form>

        <form action="include/cancel_order.php" method="POST">
            <input type="hidden" value="' . $row['order_id'] . '" name="id">
            <textarea class="cancel_text" placeholder="Причина отмены" name="reason" required></textarea>
            <button class="btn__cancel">Отменить заказ</button>
        </form>
        ' : '';
        $adv = ($row['status'] == "Отменённый") ? '
            <p style="font-size: 18px; color: red;">Причина отмены: <b>' . $row['reason'] . '</b></p>
        ' : $adv;

        $orders .= sprintf('
        <div class="card_order">
            <h6><b>Заказ от <br> %s</b></h6>
            <p>Номер заказа: <b>%s</b></p>
            <p>Заказчик: <b>%s</b></p>
            <hr class="my-2">
            <p>Количество товаров: <b>%s</b></p>
            <p>Статус: <b>%s</b></p>
            %s
        </div>', $row['created_at'], $row['number'], $row['fio'], $row['count'], $row['status'], $adv);
    }

    if(!$orders) {
        $orders = '<h4 class="not_application">Заказы отсутствуют</h4>';
    }

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление категории телескопов SkyFactory</title>
    <meta name="robots" content="noindex">
    <meta name="description" content="Панель администратора интернет-магазина телескопов SkyFactory - добавление категории">
    <link rel="stylesheet" href="../../../assest/CSS/admin_page.css">
    <link rel="stylesheet" href="../../../assest/CSS/header.css">
    <link rel="stylesheet" href="../../../assest/CSS/footer.css">
    <link rel="stylesheet" href="../../../assest/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assest/CSS/personal_page.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <!--
        Шапка сайта
    -->
    <?php
        include "header.php";
    ?>

    <div class="main">
        <div class="page container">
            <div class="subpage_nav">
                <ul class="breadcrumb-nav">
                    <li><a href="../../../index.php" title="Главная">
                        <span>Главная</span>
                    </a></li>
                    <li><a href="../../../pages/Admin_page.php" title="Панель админа">
                        <span>Панель админа</span>
                    </a></li>
                    <li><a href="#" title="Страница заказов" class="last__nav">
                        <span>Страница заказов</span>
                    </a></li>
                </ul>
            </div>
            <!-- ./subpage_nav -->

            <div class="page__top container">
                <h1 class="page__title">Заказы пользователей</h1>
            </div>

            <div class="page__middle">
                <h3 class="page__application">Заявки</h3>
                <div class="applications">
                    <div class="shopping-list">
                        <?= $orders ?>
                    </div>
            </div>

        </div>
    </div>

    <!--
        Подвал сайта
    -->
    <?php
        include "footer.php";
    ?>
</body>
</html>