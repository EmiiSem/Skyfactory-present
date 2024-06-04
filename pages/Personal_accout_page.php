<?php
    session_start();

    include "../include/connect.php";

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
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <meta name="robots" content="noindex">
    <meta name="description" content="Личный кабинет Интернет магазина SkyFactory.">
    <link rel="stylesheet" href="../assest/CSS/personal_account_page.css">
    <link rel="stylesheet" href="../assest/CSS/header.css">
    <link rel="stylesheet" href="../assest/CSS/footer.css">
    <link rel="stylesheet" href="../assest/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../assest/CSS/personal_page.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-EYBT52RKD1"></script>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(96215086, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true,
                webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/96215086" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <link rel="icon" href="../assest/img/favicon.ico" sizes="32x32" type="image/x-icon">
</head>
<body>
    <!--
        Шапка сайта
    -->
    <?php
        include "../include/header.php";
    ?>

    <!--
        Основной раздел сайта
    -->
    <div class="main">
        <div class="page container">

            <div class="subpage_nav">
                <ul class="breadcrumb-nav">
                    <li><a href="../index.php" title="Главная">
                        <span>Главная</span>
                    </a></li>
                    <li><a href="#" title="Персональный раздел" class="last__nav">
                        <span>Персональный раздел</span>
                    </a></li>
                </ul>
            </div>
            <!-- ./subpage_nav -->

            <h1 class="page__title">Личный кабинет</h1>

            <div class="container personal-lk">
                <div class="content-right">
                    <div class="menu">
                        <ul class="menu__list list">

                            <li class="menu__item">
                                <a href="Personal_accout_page.php" class="menu__link">Общая информация</a>
                            </li>

                            <li class="menu__item">
                                <a href="Personal_accout_page_dop.php" class="menu__link link-sub-1">Персональная информация</a>
                            </li>

                            <li class="menu__item">
                                <a href="Personal_shoplist_page.php" class="menu__link link-sub-1">Список заказов</a>
                            </li>

                            <li class="menu__item menu__item-unlock">
                                <a href="../include/logout.php">Выйти</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- ./right -->

                <div class="content_left">
                    <h1 class="personal-lk__name">Общая информация</h1>

                    <div class="personal-lk__tool">
                        Вы можете менять свои личные данные, почту, управлять
                        <br>
                        аккаунтом в разделе
                        <a class="link link-sub-1" href="Personal_accout_page_dop.php">персональной информации</a>
                    </div>
                    <!-- ./tool -->

                    <div class="general-info">
                        <p>
                            <strong>Логин</strong>
                            <span><?= $login; ?></span>
                        </p>
                        <p>
                            <strong>ФИО</strong>
                            <span><?= $fio; ?></span>
                        </p>
                        <p>
                            <strong>Адрес</strong>
                            <span>Проспект Мира, 40</span>
                        </p>
                        <p>
                            <strong>E-mail</strong>
                            <span><?= $email; ?></span>
                        </p>
                    </div>

                </div>
            </div>
            <!-- ./personal-lk -->
        </div>
    </div>
    <!-- ./main -->

    <?php
        require '../include/footer.php';
    ?>
</body>
</html>