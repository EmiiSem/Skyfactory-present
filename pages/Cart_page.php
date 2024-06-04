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
                                <div class="product-card__characteristics-value"><?= $product['type'] ?></div>
                            </div>

                            <div class="product-card__characteristics-row">
                                <div class="product-card__characteristics-key">
                                    <div class="product-card__characteristics-name">Монтировка</div>
                                    <div class="product-card__characteristics-dots"></div>
                                </div>
                                <div class="product-card__characteristics-value"><?= $product['mounting_plate'] ?></div>
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
                                    <a href="admin/Update/UpdateCart_page.php?id=<?= $product['product_id'] ?>">
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
                            <h2><?= $product['title'] ?></h2>
                            <p>
                                <?= $product['description'] ?>
                            </p>
                            <!-- <img src="../assest/img/img_card/img_card1.jpg" alt="Телескоп" title="<?= $product['name'] ?>" class="img__card-tabs"> -->
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