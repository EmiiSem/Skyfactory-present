<?php
    session_start();

    // print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница SkyFactory</title>
    <meta name="robots" content="">
    <meta name="description" content="Телескопы, монтировки, окуляры, астрономические фильтры, в магазине телескопов Интернет магазин SkyFactory.">
    <link rel="stylesheet" href="./assest/CSS/home_page.css">
    <link rel="stylesheet" href="./assest/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="./assest/CSS/personal_page.css">
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
        Основной раздел
    -->
    <div class="main">
        <div class="page container">
            <!-- 
                Слайдер баннеров главной страницы
            -->
            <div class="banner__img"></div>
            <div class="text__banner one1">
                <p class="bold bold1">Телескоп SKY-
                    WATHER BK
                    707AZ2
                </p>
                <p class="size">Телескоп Sky-Watcher BK 707AZ2 от
                    компании Sky-Watcher представляет
                    собой ахроматический рефрактор
                    начального уровня. Данная...
                </p>
                <img src="assest/img/main_telecope.png" alt="Баннерный телескоп" class="telescope__item-banner">
            </div>
            <div class="carousel">
                    <div class="carousel-window">
                        <div class="carousel-slides">
                            <div class="carousel-item">
                                <img src="assest/img/banner.png" alt="Баннер-слайдер" title="Баннер телескопа">
                                <div class="text__banner">
                                    <p class="bold">Телескоп SKY-WATHER BK 707AZ2</p>
                                    <p class="size">Телескоп Sky-Watcher BK 707AZ2 от
                                        компании Sky-Watcher представляет
                                        собой ахроматический рефрактор
                                        начального уровня. Данная...</p>
                                    <button class="button__item">Подробнее</button>
                                    <img src="assest/img/main_telecope.png" alt="Баннерный телескоп" title="Sky-Watcher BK 707AZ2" class="telescope__item-banner">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="assest/img/banner2.png" alt="Баннер-слайдер" title="Баннер скидок">
                            </div>
                        </div>
                    </div>
                    <a href="#" class="carousel-prev">
                        <span class="carousel-prev-icon">&lt;</span>
                    </a>
                    <a href="#" class="carousel-next">
                        <span class="carousel-next-icon">&gt;</span>
                    </a>
            </div>
            <!-- /.slider -->
        </div>
        
        <div class="popular__telescopes">
            <div class="item-block"></div>
            <div class="item-block"></div>
            <h1 class="text_popular">Популярные телескопы ТОП-15</h1>
        </div>

        <div class="cards">
            <div class="card">
                <div class="card__top">
                    <a href="Cart_page.html" class="card__image">
                        <img src="assest/img/Products/cart1.png" alt="Телескоп Veber 360/50 рефрактор в кейсе" title="Телескоп Veber 360/50 рефрактор в кейсе" />
                    </a>
                    <div class="card__label">-6%</div>
                </div>
                <div class="card__bottom">
                    <div class="card__prices">
                        <div class="card__price card__price--discount">3 840.0</div>
                        <div class="card__price card__price--common">4 339.0</div>
                    </div>
                    <a href="#" class="card__title">Телескоп Veber 360/50 рефрактор в кейсе</a>
                    <button class="card__add">
                        В корзину
                        <i class="simbol"></i>
                    </button>
                </div>
            </div>
            <!-- Первый товар -->
            
            <div class="card">
                <div class="card__top">
                    <a href="Cart_page.html" class="card__image">
                        <img src="assest/img/Products/cart2.png" alt="Телескоп SVBONY SV502" title="Телескоп SVBONY SV502" />
                    </a>
                    <div class="card__label">-5%</div>
                </div>
                <div class="card__bottom">
                    <div class="card__prices">
                        <div class="card__price card__price--discount">4 650.0</div>
                        <div class="card__price card__price--common">5 550.0</div>
                    </div>
                    <a href="#" class="card__title">Телескоп SVBONY <br> SV502</a>
                    <button class="card__add">
                        В корзину
                        <i class="simbol"></i>
                    </button>
                </div>
            </div>
            <!-- Второй товар -->

            <div class="card">
                <div class="card__top">
                    <a href="Cart_page.html" class="card__image">
                        <img src="assest/img/Products/cart3.jpg" alt="Телескоп Veber 350x60 Аз рефрактор" title="Телескоп Veber 350x60 Аз рефрактор" />
                    </a>
                    <div class="card__label">-17%</div>
                </div>
                <div class="card__bottom">
                    <div class="card__prices">
                        <div class="card__price card__price--discount">6 030.0</div>
                        <div class="card__price card__price--common">7 296.0</div>
                    </div>
                    <a href="#" class="card__title">Телескоп Veber 350x60 Аз рефрактор</a>
                    <button class="card__add">
                        В корзину
                        <i class="simbol"></i>
                    </button>
                </div>
            </div>
            <!-- Третий товар -->

            <div class="card">
                <div class="card__top">
                    <a href="Cart_page.html" class="card__image">
                        <img src="assest/img/Products/cart4.jpg" alt="Телескоп Veber УМКА 76/300 рефлектор" title="Телескоп Veber УМКА 76/300 рефлектор" />
                    </a>
                    <div class="card__label">-14%</div>
                </div>
                <div class="card__bottom">
                    <div class="card__prices">
                        <div class="card__price card__price--discount">6 560.0</div>
                        <div class="card__price card__price--common">7 610.0</div>
                    </div>
                    <a href="#" class="card__title">Телескоп Veber УМКА 76/300 рефлектор</a>
                    <button class="card__add">
                        В корзину
                        <i class="simbol"></i>
                    </button>
                </div>
            </div>
            <!-- Четвёртый товар -->
        </div>
        <!-- ./cards -->

        <div class="quastions">
            <div class="blocks">
                <div class="item-block"></div>
                <div class="item-block"></div>
                <h1 class="text_quastion">Часто задаваемые вопросы</h1>
            </div>

            <div class="quastion__items">
                <div class="quastion_item ">
                    <img src="assest/img/Quastions/qustion1.png" alt="">
                    <div class="quastion_item_text">Как выбрать телескоп?</div>
                </div>

                <div class="quastion_item ">
                    <img src="assest/img/Quastions/qustion2.png" alt="">
                    <div class="quastion_item_text">Что можно наблюдать?</div>
                </div>

                <div class="quastion_item ">
                    <img src="assest/img/Quastions/qustion3.png" alt="">
                    <div class="quastion_item_text">Как пользоваться телескопом?</div>
                </div>

                <div class="quastion_item ">
                    <img src="assest/img/Quastions/quastion4.png" alt="">
                    <div class="quastion_item_text">Как не ошибиться в выборе телескопа?</div>
            </div>
        </div>
        <!-- ./quastion__items -->

        <div class="about__magazine">
            <h1 class="text_magazine">Магазн телескопов "SkyFactory"</h1>
            <div class="text_about">
                Мы рады приветствовать Вас в нашем специализированном магазине телескопов и аксессуарам к ним.
                Здесь Вы найдете широчайший выбор телескопов, и принадлежностей к ним, литературы и других сопутствующих товаров, а также получите
                исчерпывающие и авторитетные консультации по любым вопросам, связанным с астрономией, которые дадут
                Вам наши консультанты, каждый из которых имеет солидный опыт занятий астрономией.
                <br><br>

                Интерес к звёздам и к созерцанию неба обычно приводит человека к желанию купить телескоп, который позволит ему увидеть своими глазами все
                далекие сокровища космоса, так красочно описываемые в книгах. В телескоп вашему взору откроются Луна, планеты, кометы, многочисленные звёздные скопления,
                туманности и галактики, которые с давних времен привлекали к себе внимание.
            </div>
        </div>
        <!-- ./about__magazine -->
    </div>
</div>

    <?php
        require 'include/footer.php';
    ?>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Slider(document.querySelector('.carousel'));
        });
    </script>
    <script src="assest/JS/sliders.js"></script>
</body>
</html>