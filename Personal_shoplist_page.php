<?php
    session_start();

    include "./include/connect.php";

    $userId = $_SESSION['user']['id'];

    $sql = sprintf("SELECT `id`, `fio`, `email`, `login` FROM `users` WHERE `id`='%s'", $userId);
    $result = $db->query($sql);

    // Проверка наличия данных и вывод информации
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $fio = $row["fio"];
            $login = $row["login"];
            $email = $row["email"];
        }
    } else {
        $_SESSION['message'] = 'Вы не авторизированы!';
        return header("Location: Login_page.php");
    }

    // Получение данных заказанных товаров
    $sql = sprintf("SELECT * FROM `orders` WHERE `user_id`='%s' AND `number` IS NOT NULL AND `product_id`=0 ORDER BY `created_at` DESC", $_SESSION['user']['id']);
    $result = $db->query($sql);

    $orders = "";
    while($row = $result->fetch_assoc()) {
        $del = ($row['status'] == "Новый") ? '<p><a onclick="return confirm(\'Вы действительно хотите удалить этот заказ?\')" href="include/deleteOrder.php?id='.$row['order_id'].'">Удалить заказ</a></p>' : '';
        $reason = ($row['reason'] ==! "") ? '<p>Причина отмены: <b>'.$row['reason'].'</b></p>' : '';
        $orders .= sprintf('
        <div class="shopping-list">
            <div class="card_order">
                <h6><b>Заказ от %</b></h6>
                <p>%s</p>
                <hr class="my-2">
                %s
                <p>Статус: <b>%s</b></p>
                %s
                <p>Количество товаров: <b>%s</b></p>
            </div>
        </div>
        ', $row['created_at'], $row['number'], $del, $row['status'], $reason, $row['count']);
    }

    if($orders = "") {
        $orders = '<h4>Список заказов пуст</h4>';
    }


?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет - список заказов телескопов</title>
    <meta name="robots" content="noindex">
    <meta name="description" content="Личный кабинет, страница личного кабинета интернет магазина телескопов SkyFactory, список заказанных телескопов">
    <link rel="stylesheet" href="assest/CSS/personal_account_page.css">
    <link rel="stylesheet" href="assest/CSS/header.css">
    <link rel="stylesheet" href="assest/CSS/footer.css">
    <link rel="stylesheet" href="assest/CSS/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assest/CSS/personal_page.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <!--
        Шапка сайта
    -->
    <?php
        include "./include/header.php";
    ?>

     <!--
        Основной раздел сайта
    -->
    <div class="main">
        <div class="page container">

        <div class="subpage_nav">
                <ul class="breadcrumb-nav">
                    <li><a href="./index.php" title="Главная">
                        <span>Главная</span>
                    </a></li>
                    <li><a href="./Personal_accout_page.php" title="Персональный раздел">
                        <span>Персональный раздел</span>
                    </a></li>
                    <li><a href="#" title="Список заказов" class="last__nav">
                        <span>Список заказов</span>
                    </a></li>
                </ul>
            </div>
            <!-- ./subpage_nav -->

            <h1 class="page__title">Список заказанных телескопов</h1>

            <div class="container personal-lk">
                <div class="content-right">
                    <div class="menu">
                        <ul class="menu__list list">

                            <li class="menu__item menu__item-first">
                                <a href="Personal_accout_page.php" class="menu__link link-sub-1">Общая информация</a>
                            </li>

                            <li class="menu__item">
                                <a href="Personal_accout_page_dop.php" class="menu__link link-sub-1">Персональная информация</a>
                            </li>

                            <li class="menu__item">
                                <a href="Personal_shoplist_page.php" class="menu__link link-sub-1">Список заказов</a>
                            </li>

                            <li class="menu__item menu__item-unlock">
                                <a href="./include/logout.php">Выйти</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- ./right -->

                <div class="content_left">
                    <h1 class="personal-lk__name">Ваш список заказов - <?= $fio ?></h1>

                    <!-- Список товаров заказанных пользователем -->
                    <?= $orders ?>



                </div>


            </div>
        </div>
    </div>

    <?php
        include "./include/footer.php";
    ?>
</body>
</html>