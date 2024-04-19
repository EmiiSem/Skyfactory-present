<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление отзыва об интернет-магазине телескопов</title>
    <link rel="stylesheet" href="../assest/CSS/reviews_add.css">
    <link rel="stylesheet" href="../assest/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../assest/CSS/header.css">
    <link rel="stylesheet" href="../assest/CSS/footer.css">
    <link rel="stylesheet" href="../assest/CSS/dropdown.css">
    <link rel="stylesheet" href="../assest/CSS/personal_page.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
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
                    <li><a href="Reviews_page.php" title="Отзывы об магазине">
                        <span>Отзывы об магазине</span>
                    </a></li>
                    <li><a href="#" title="Добавление отзыва" class="last__nav">
                        <span>Добавление отзыва</span>
                    </a></li>
                </ul>
            </div>
            <!-- ./subpage_nav -->

            <h1 class="page__title">Добавить отзыв об интернет-магазине телескопов</h1>

            <form action="../include/addRewiews.php" method="POST" class="form_rew">
                <div class="rew">
                    <p class="rew__subtext">Преимущества</p>
                    <input type="text" name="advantage" placeholder="Введите преимущества" class="rew-input">
                </div>
                <div class="rew">
                    <p class="rew__subtext">Недостатки</p>
                    <input type="text" name="disadvantage" placeholder="Введите недостаток" class="rew-input">
                </div>
                <div class="rew">
                    <p class="rew__subtext">Комментарий</p>
                    <textarea name="comment" rows="10" placeholder="Введите комментарий" class="rew-input rew-text"></textarea>
                </div>

                <button class="btn__rew">Отправить отзыв</button>

                <div class="message">
                    <?= @$_SESSION['message2']; unset($_SESSION['message2']) ?>
                </div>
            </form>

        </div>
    </div>

    <!--
        Подвал сайта
    -->
    <?php
        include "../include/footer.php";
    ?>
</body>
</html>