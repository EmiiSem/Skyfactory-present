<?php
    session_start();

    // подключение БД
    require "../include/connect.php";

    // переменная с запросом всех полей
    $sql = "SELECT * FROM `questions`";

    // выполнение запроса
    $result = $db->query($sql);

    $quastions = "";

    while($row = $result->fetch_assoc()) {
        $quastions .= sprintf('
        <div class="quastion__item">
            <a href="QuastionCart_page.php?id=%s">
                <div class="quastion_item">
                    <img src="%s" alt="%s" title="%s">
                    <div class="quastion_item_text">%s</div>
                </div>
            </a>
        </div>
        ', $row['quation_id'], $row['path'], $row['name'], $row['name'], $row['name']);
    }

    if($quastions == "") {
        $quastions = "<h3>Статьи не найдены</h3>";
    }


?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Часто задаваемые вопросы</title>
    <meta name="robots" content="">
    <meta name="description" content="Полезные статьи по телескопам и их использовании. Помощь с выбором и ответы на интерисующиеся вопросы, касаемо
    телескопов.">
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
                    <li><a href="#" title="Полезные статьи" class="last__nav">
                        <span>Полезные статьи</span>
                    </a></li>
                </ul>
            </div>
            <!-- ./subpage_nav -->

            <h1 class="page__title">Все частые вопросы (статьи про телескопы)</h1>

            <? if($_SESSION['user']['role'] == "2") { ?>
                <div class="addQuastion">
                    <a href="Quastion_add_page.php" class="btn__quastion">Добавить статью</a>
                </div>
            <? } ?>

            <div class="content__telescopes">
                <div class="quastion__items">
                    <?= $quastions; ?>
                </div>
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