<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О компании ООО "SkyFactory"</title>
    <meta name="robots" content="">
    <meta name="description" content="О компании интернет-магазина телескопов ООО SkyFactory.">
    <link rel="stylesheet" href="../assest/CSS/about_page.css">
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

    <div class="main">
        <div class="page container">
            <div class="subpage_nav">
                <ul class="breadcrumb-nav">
                    <li><a href="./index.php" title="Главная">
                        <span>Главная</span>
                    </a></li>
                    <li><a href="#" title="О компании" class="last__nav">
                        <span>О компании</span>
                    </a></li>
                </ul>
            </div>
            <!-- ./subpage_nav -->

            <div class="page__top container">
                <h1 class="page__title">О «SkyFactory»</h1>
            </div>

            <div class="company__content">
                <h1 class="company-title">О нашей компании ООО «SkyFactory»</h1>
            </div>
            <div class="content__text">
                Мы рады приветствовать Вас в нашем специализированном магазине телескопов и других астрономических товаров.<br>Здесь Вы найдете широчайший выбор телескопов, и принадлежностей к ним, литературы и других сопутствующих товаров, а также получите исчерпывающие и авторитетные консультации по любым вопросам, связанным с астрономией, которые дадут Вам наши консультанты, каждый из которых имеет солидный опыт занятий астрономией.<br><br>

                Интерес к звёздам и к созерцанию неба обычно приводит человека к желанию купить телескоп, который позволит ему увидеть своими глазами все далекие сокровища космоса, так красочно описываемые в книгах. В телескоп вашему взору откроются Луна, планеты, кометы, многочисленные звёздные скопления, туманности и галактики, которые с давних времен привлекали к себе внимание. <br><br>

                Наш магазин предлагает широкий выбор телескопов различного уровня только от самых известных и проверенных производителей: Celestron, Synta, Meade, Sky-Watcher, Levenhuk, Vixen. У нас можно приобрести телескоп любого уровня, на любой вкус и кошелек – от моделей для начинающих, до самых больших и «профессиональных». В нашем интернет-магазине Вам помогут подобрать и купить не только сам телескоп, но и окуляры, линзы Барлоу, диагональные призмы, искатели, моторы, фокусеры, ПЗС-камеры и другие оптические приборы для наблюдений.
            </div>
            <!-- ./content__text -->
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