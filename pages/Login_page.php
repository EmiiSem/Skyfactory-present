<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница входа SkyFactory</title>
    <meta name="robots" content="noindex">
    <meta name="description" content="Авторизация в интернет-магазине телескопов SkyFactory">
    <link rel="stylesheet" href="../assest/CSS/register_login.css">
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

    <div class="main main2">
        <div class="page container">
            <div class="subpage_nav">
                <ul class="breadcrumb-nav">
                    <li><a href="../index.php" title="Главная">
                        <span>Главная</span>
                    </a></li>
                    <li><a href="#" title="Авторизация" class="last__nav">
                        <span>Авторизация</span>
                    </a></li>
                </ul>
            </div>
            <!-- ./subpage_nav -->

            <h1 class="page__title">Страница авторизации</h1>
            <p class="subtitle">Если вы не зарегистрированы, то <a href="Register_page.php">зарегистрируйтесь</a></p>

            <div class="center__block">

                <div class="left">
                    <form action="../include/login.php" method="POST" id="form-login">
                        <div class="errors-block errors-validation-block disp-none mb-4"></div>

                        <div class="inp-wrapper">
                            <input type="text" class="inp-field" name="login" placeholder="Логин">
                        </div>

                        <div class="inp-wrapper">
                            <input type="password" class="inp-field" name="password" placeholder="Введите пароль">
                        </div>

                        <button class="btn1 btn-md btn-base-brand-1 btn2">Авторизироваться</button>

                        <div class="message">
                            <?= @$_SESSION['message']; unset($_SESSION['message']) ?>
                        </div>
                    </form>
                </div>

                <div class="right">
                    <img src="../assest/img/form_auth.png" alt="Телескопы" title="Телескопы" class="right_img">
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

    <script src="../assest/JS/validation_login.js"></script>
</body>
</html>