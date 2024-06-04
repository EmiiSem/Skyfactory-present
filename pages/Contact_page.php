<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакты интернет-магазина телескопов</title>
    <meta name="robots" content="">
    <meta name="description" content="Контакты, номера телефона с разных городов интернет-магазина телескопов SkyFactory.">
    <link rel="stylesheet" href="../assest/CSS/contact_page.css">
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
                    <li><a href="../index.php" title="Главная">
                        <span>Главная</span>
                    </a></li>
                    <li><a href="#" title="Контакты интернет-магазина" class="last__nav">
                        <span>Контакты</span>
                    </a></li>
                </ul>
            </div>
            <!-- ./subpage_nav -->

            <div class="container">
                <h1 class="page__title">Контакты</h1>
            </div>

            <div class="static-text static-text-lg">
                <div>
                    <li>Москва +7 (555) 555 55 55</li>
                    <li>Санкт-Петербург +7 (666) 666 66 66</li>
                    <li>Волгоград +7 (777) 777 77 77</li>
                    <li>Екатеринбург +7 (888) 888 88 88</li>
                    <li>Самара +7 (999) 999 99 99</li>
                </div>
            </div>

            <div class="container form__contact">
                <form action="../include/feedback_contact.php" method="POST">
                    <div class="contact">
                        <p class="contact_name">Имя</p>
                        <input type="text" name="name" class="input-name" placeholder="Имя">
                    </div>

                    <div class="contact">
                        <p class="contact_email">E-mail адрес</p>
                        <input type="email" name="email" class="input-email" placeholder="E-mail адрес">
                    </div>

                    <div class="contact">
                        <p>Сообщение</p>
                        <textarea name="message" rows="3" placeholder="Введите Ваше сообщение" class="message-text"></textarea>
                    </div>
                    <br>
                    <div class="button">
                        <input type="submit" value="Отправка сообщения" class="btn__item form__btn">
                        <img src="../assest/img/tel.svg" alt="Отправка сообщения" class="tel_btn form__btn" style="padding-top: 5px">
                    </div>
                </form>
            </div>
            <!-- ./form__contact -->
        </div>
        <!-- ./page container -->
    </div>

    <!--
        Подвал сайта
    -->
    <?php
        include "../include/footer.php";
    ?>
</body>
</html>