<?php
    session_start();

    include "../include/connect.php";

    $id = @$_GET['id'];

    $products = mysqli_query($db, "SELECT * FROM `products` WHERE `product_id` = '$id'");
    $product = mysqli_fetch_assoc($products);

    $products2 = mysqli_query($db, "SELECT * FROM `products` JOIN `categories` WHERE `products`.category = `categories`.category_id");
    $product2 = mysqli_fetch_assoc($products2);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product['name'] ?></title>
    <meta name="robots" content="">
    <meta name="description" content="В магазине SkyFactory можно купить телескоп Sky-Watcher BK 707AZ2 за 29 797 руб. Качественный и профессиональный телескоп. Доставка по России.">
    <link rel="stylesheet" href="../assest/CSS/cart_page.css">
    <link rel="stylesheet" href="../assest/CSS/header.css">
    <link rel="stylesheet" href="../assest/CSS/footer.css">
    <link rel="stylesheet" href="../assest/CSS/bootstrap.min.css">
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

<div class="main">
        <div class="page container">
            <div class="f1">
                <div class="subpage_nav">
                    <ul class="breadcrumb-nav">
                        <li><a href="../index.php" title="Главная">
                            <span>Главная</span>
                        </a></li>
                        <li><a href="Catalog_page.php" title="Каталог товаров">
                            <span>Каталог товаров</span>
                        </a></li>
                        <li><a href="Catalog_page.php" title="Телескопы">
                            <span>Телескопы</span>
                        </a></li>
                        <li><a href="#" title="<?= $product['name']; ?>" class="last__nav">
                            <span><?= $product['name'] ?></span>
                        </a></li>
                    </ul>
                </div>
                <!-- ./subpage_nav -->

                <!--
                    Основной раздел сайта с товаром
                -->
                <div class="page__top container">
                    <h1 class="page__title"><?= $product['name'] ?></h1>
                </div>
                <div class="product-card container">
                    <div class="product-card__image-main">
                        <a class="link_toCard_one product-card__image-main-link">
                            <img src="<?= $product['path'] ?>" alt="<?= $product['name'] ?>" title="<?= $product['name'] ?>" class="product-card__image-main-img">
                        </a>
                        <ul class="product-card__image-list">
                            <li class="product-card__image-item">
                                <a href="#" class="link_toCard product-card__image-link">
                                    <!-- <img src="" alt="<?= $product['name'] ?>" title="<?= $product['name'] ?>" class="product-card__image"> -->
                                </a>
                            </li>
                            <li class="product-card__image-item">
                                <a href="#" class="link_toCard product-card__image-link">
                                    <!-- <img src="" alt="<?= $product['name'] ?>" title="<?= $product['name'] ?>" class="product-card__image"> -->
                                </a>
                            </li>
                            <li class="product-card__image-item">
                                <a href="#" class="link_toCard product-card__image-link">
                                    <!-- <img src="" alt="<?= $product['name'] ?>" title="<?= $product['name'] ?>" class="product-card__image"> -->
                                </a>
                            </li>
                        </ul>
                        <!-- ./ul-item__card -->
                    </div>
                    <!-- ./product-card__image-main -->

                    <div class="product-card__middle">
                        <div class="warranty product-card__warranty icon icon-warranty">Гарантия производителя 3 года</div>
                        <div class="product__characterlist">
                            <div class="product-card__characteristics-row">
                                <div class="product-card__characteristics-key">
                                    <div class="product-card__characteristics-name">Тип телескопа</div>
                                    <div class="product-card__characteristics-dots"></div>
                                </div>
                                <div class="product-card__characteristics-value">рефрактор</div>
                            </div>

                            <div class="product-card__characteristics-row">
                                <div class="product-card__characteristics-key">
                                    <div class="product-card__characteristics-name">Монтировка</div>
                                    <div class="product-card__characteristics-dots"></div>
                                </div>
                                <div class="product-card__characteristics-value">азимутальная</div>
                            </div>

                            <div class="product-card__characteristics-row">
                                <div class="product-card__characteristics-key">
                                    <div class="product-card__characteristics-name">В наличии</div>
                                    <div class="product-card__characteristics-dots"></div>
                                </div>
                                <div class="product-card__characteristics-value"><?= $product['count'] ?> шт.</div>
                            </div>

                            <div class="product-card__characteristics-row">
                                <div class="product-card__characteristics-key">
                                    <div class="product-card__characteristics-name">Категория</div>
                                    <div class="product-card__characteristics-dots"></div>
                                </div>
                                <div class="product-card__characteristics-value value__two"><?= $product2['category']; ?></div>
                            </div>

                            <div class="product-card__characteristics-row">
                                <div class="product-card__characteristics-key">
                                    <div class="product-card__characteristics-name">Модель</div>
                                    <div class="product-card__characteristics-dots"></div>
                                </div>
                                <div class="product-card__characteristics-value"><?= $product['model']; ?></div>
                            </div>
                        </div>
                        <!-- ./characterlist -->

                        <div class="product-card__disclamer">
                            Внешний вид и цвет товара может отличаться
                            от представленного на фотографии.
                        </div>

                        <div class="product-card__specifications">
                            <div class="product-card__specifications-item">
                                <a class="product-card__specifications-link" href="#characters" target="_blank">Все характеристики</a>
                            </div>
                            <div class="product-card__specifications-item">
                                <a class="product-card__specifications-link" href="#full_description" target="_blank">Описание</a>
                            </div>
                            <div class="product-card__specifications-item">
                                <a class="product-card__specifications-link" href="#insturstions" target="_blank">Инструкция</a>
                            </div>
                        </div>
                        <!-- ./specifications -->
                        &nbsp;
                    </div>
                    <!-- ./product-card__middle -->

                    <div class="product-card__description">
                        <div class="product-card__price">
                            <div class="product-card__price-wrap">
                                <div class="product-card__prices">

                                    <div class="product-card__prices-wrap">
                                        <div class="product-card__price">
                                            <?= $product['price'] ?> ₽
                                        </div>
                                    </div>
                                    <!-- ./product-card__prices -->

                                    <div class="product-card__city-wrap">
                                        <span class="product-card__city icon icon-map-marker">Выберите город</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- ./product-card__price -->

                        <div class="product-card__buys">
                            <?php if(!isset($_SESSION['user'])) { ?>

                                <?php } elseif($_SESSION['user']['role'] == 2) { ?>
                                    <a href="../include/updateForm.php?id=<?= $product['product_id'] ?>">
                                        <button class="product-card__button btn-lg btn-addon btn-base-brand-1">
                                            Редактировать
                                        </button>
                                    </a>
                                    <a href="../include/deleteCart.php?id=<?= $product['product_id'] ?>">
                                        <button class="product-card__button btn-lg btn-addon btn-base-brand-1 button__delete">
                                            Удалить
                                        </button>
                                    </a>
                                    <?php } else { ?>
                                        <a href="../include/addCart.php?id=<?= $product['product_id'] ?>">
                                            <button class="product-card__button btn-lg btn-addon btn-base-brand-1 icon icon-add-basket">
                                                Добавить в корзину
                                            </button>
                                        </a>
                                <?php } ?>

                        </div>
                    </div>
                    <!-- ./product-card__description -->
                </div>
                <!-- ./product-card -->
            </div>
            <div class="tabs-nav">
                <ul class="tabs-nav__list">
                    <li class="tabs-nav__item tabs-nav__item--active">
                        <a class="tabs-nav__link" href="#full_description">Описание</a>
                    </li>

                    <li class="tabs-nav__item">
                        <a class="tabs-nav__link" href="#specifications">Характеристики</a>
                    </li>

                    <li class="tabs-nav__item">
                        <a class="tabs-nav__link" href="#reviews">Отзывы</a>
                    </li>
                </ul>
                <!-- ./ul-tabs-nav__list -->

                <div class="tab-container product-tab">
                    <div class="tabs-content__item">
                        <div class="static-text static-text-lg">
                            <h2><?= $product['name'] ?> – прекрасный подарок для начинающих астрономов</h2>
                            <p>
                                Прибор станет полезным и удобным проводников по космическим просторам для тех, кто делает свои первые шаги в изучении небесных светил. С его помощью можно рассматривать кратеры на Луне, различить многочисленные спутники Юпитера, насладиться незабываемым видом колец Сатурна. Модель представляет собой ахроматический рефлектор. Он предназначен для изучения основ астрономии на начальном уровне и вызывает восторг и увлечение у детей. Благодаря своей доступной цене рефлектор относится к бюджетному сегменту, но его нельзя считать просто игрушкой для наблюдений за звездным небом.
                            </p>
                            <img src="../assest/img/img_card/img_card1.jpg" alt="Телескоп" title="<?= $product['name'] ?>" class="img__card-tabs">

                            <h2>Улучшенная оптика телескопа <?= $product['name'] ?></h2>
                            <p>
                                В комплект оптики входят два просветленных окуляра Super на 10 и 25 мм. Они позволяют добиться 28 кратного и 70-ти кратного увеличения соответственно. А применение линзы Барлоу дает возможность увеличить эти значения в два раза. При использовании диагонального зеркала эта линза может быть установлена перед ним, и тогда увеличение телескопа возрастет в 3 раза. Достигается высокая детализация изображения, так как хроматические аберрации минимальные. Объектив диаметром 7 см собирает света на 36 % больше чем аналог, имеющий объектив 60 мм. На линзах имеется просветляющее покрытие, состоящее из нескольких слоев.
                           </p>
                        </div>
                    </div>
                </div>
                <!-- ./tab-container -->
            </div>
        </div>
    </div>

    <!--
        Подвал сайта
    -->
    <?php
        include "../include/footer.php";
    ?>

    <script src="../assest/JS/photos.js"></script>
</body>
</html>