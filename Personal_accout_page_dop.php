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
            $email = $row["email"];
        }
    } else {
        $_SESSION['message'] = 'Вы не авторизированы!';
        return header("Location: Login_page.php");
    }

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет - Персональный раздел</title>
    <meta name="robots" content="noindex">
    <meta name="description" content="Дополнительная страница личного кабинета интернет магазина телескопов SkyFactory">
    <link rel="stylesheet" href="assest/CSS/personal_account_page.css">
    <link rel="stylesheet" href="assest/CSS/header.css">
    <link rel="stylesheet" href="assest/CSS/footer.css">
    <link rel="stylesheet" href="assest/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="assest/CSS/personal_page.css">
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
                    <li><a href="#" title="Профиль пользователя" class="last__nav">
                        <span>Профиль пользователя</span>
                    </a></li>
                </ul>
            </div>
            <!-- ./subpage_nav -->

            <h1 class="page__title">Профиль пользователя</h1>

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
                    <h1 class="personal-lk__name">Персональная информация</h1>

                    <div class="personal-lk__tool">
                        Здесь вы можете отредактировать информацию о себе
                        <br>
                        и добавить недостающую
                    </div>
                    <!-- ./tool -->

                    <div class="general-info">
                        <p>
                            <strong>E-mail</strong>
                            <input type="email" name="E-mail" value="<?= $email; ?>">
                        </p>
                        <p>
                            <strong>ФИО</strong>
                            <input type="text" name="fio" value="<?= $fio; ?>">
                        </p>
                    </div>

                    <h1 class="personal-lk__name">Новый пароль</h1>

                    <div class="general-info1">
                        <p>
                            <strong>Пароль</strong>
                            <input type="password" name="password" value="">
                        </p>
                        <p>
                            <strong>Повторите пароль</strong>
                            <input type="password" name="password" value="">
                        </p>
                    </div>

                    <div class="personal-form__grid">
                        <button class="personal-form__button btn-lg btn-base-brand-1" id="#buttonForm" type="submit">Сохранить</button>
                        <a href="#" class="personal-form__button personal-form__cancel">Отменить</a>
                    </div>

                </div>
            </div>
            <!-- ./personal-lk -->
        </div>
    </div>
    <!-- ./main -->

    <?php
        require 'include/footer.php';
    ?>
</body>
</html>