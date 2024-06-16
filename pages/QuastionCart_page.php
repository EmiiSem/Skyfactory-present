<?php
    session_start();

    // подключение БД
    require "../include/connect.php";

    // Получение id статьи
    $id = $_GET['id'];

    // переменная с запросом всех полей
    $sql = "SELECT * FROM `questions` WHERE `quation_id`='$id'";

    // выполнение запроса
    $result = $db->query($sql);

    $quastion = "";
    $title = "";
    $bradlink = "";
    if($row = $result->fetch_assoc()) {
        $quastion .= sprintf('
            <div>%s</div>
        ', $row['quastion_info']);
        $title .= sprintf('
            <h1 class="page__title">%s</h1>
        ', $row['name']);
        $bradlink .= sprintf('
        <li><a href="#" title="%s" class="last__nav">
            <span>%s</span>
        </a></li>
        ', $row['name'], $row['name']);

    }

    if($quastion == "") {
        $quastion = "<h3>Статья отсутствует</h3>";
    }


?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Карточка статьи</title>
    <meta name="robots" content="">
    <meta name="description" content="Полезная статья касаемо телескопов. Поиск подходящий телескопов, как выбрать правильный телескоп">
    <link rel="stylesheet" href="../assest/CSS/quastions_page.css">
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
        Основной раздел
    -->
    <div class="main">
        <div class="page container">

            <div class="subpage_nav">
                <ul class="breadcrumb-nav">
                    <li><a href="../index.php" title="Главная">
                        <span>Главная</span>
                    </a></li>
                    <li><a href="Quastion_all.php" title="Полезные статьи" class="">
                        <span>Полезные статьи</span>
                    </a></li>
                    <?= $bradlink; ?>
                </ul>
            </div>
            <!-- ./subpage_nav -->

            <?= $title; ?>

            <div class="content__telescopes">
                <?= $quastion; ?>
            </div>

        </div>
    </div>
    <!-- ./main -->

    <!--
        Подвал сайта
    -->
    <?php
        include "../include/footer.php";
    ?>
</body>
</html>