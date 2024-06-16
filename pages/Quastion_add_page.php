<?php
    session_start();

    if($_SESSION['user']['role'] == '1') {
        header("Location: Quastion_all.php?message=Отказ в доступе");
    } 
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление статьи</title>
    <meta name="robots" content="noindex">
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
                    <li><a href="Quastion_all.php" title="Полезные статьи">
                        <span>Полезные статьи</span>
                    </a></li>
                    <li><a href="#" title="Добавление статьи" class="last__nav">
                        <span>Добавление статьи</span>
                    </a></li>
                </ul>
            </div>
            <!-- ./subpage_nav -->

            <h1 class="page__title">Добавление статьи</h1>

            <div class="content__telescopes">
                <form action="../include/addQuastion.php" enctype="multipart/form-data" method="POST">
                    <div class="info_quastion">
                        <label for="name" class="info-title">Название статьи</label>
                        <input type="text" name="name" class="input-quastion" placeholder="Название статьи"
                        <?php if(isset($_SESSION['highlight_fields']) && in_array('name', $_SESSION['highlight_fields'])) { echo 'style="border: 1px solid red;"'; } ?>
                        >
                    </div>
                    <div class="info_quastion">
                        <label for="description" class="info-title">Описание статьи</label>
                        <textarea name="description" placeholder="Описание статьи" class="input-quastion"
                        <?php if(isset($_SESSION['highlight_fields']) && in_array('description', $_SESSION['highlight_fields'])) { echo 'style="border: 1px solid red;"'; } ?>
                        ></textarea>
                    </div>
                    <div class="info_quastion">
                        <label for="name" class="info-title">Изображение статьи (превью)</label>
                        <input type="file" name="file" placeholder="Превью статьи">
                    </div>
                    <div class="info_quastion">
                        <button class="btn__quastion">Добавить статью</button>
                    </div>
                    <div class="warning-session">
                        <?= @$_SESSION['message']; unset($_SESSION['message']) ?>
                    </div>
                </form>
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