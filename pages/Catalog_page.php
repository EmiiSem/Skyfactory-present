<?php
    session_start();

    include "../include/connect.php";

    $products = mysqli_query($db, "SELECT * FROM `products` JOIN `categories` WHERE `products`.category = `categories`.category_id");

    // Функция для разбивки контента на странице
    function get_products($db, $start, $products_per_page) {
        $query = "SELECT * FROM `products` JOIN `categories` WHERE `products`.category = `categories`.category_id
        LIMIT $start, $products_per_page";
        $products = mysqli_query($db, $query);

        return $products;
    }

    // Определение кол-ва продуктов на одной странице и текущую страницу
    $products_per_page = 8; // кол-во записей на странице

    // использование функции intval нужно для преобразования значения к целочисленному типу
    $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $start = ($current_page - 1) * $products_per_page;

    // Изменение запроса к БД, чтобы использовать функцию и параметры пагинации
    $products = get_products($db, $start, $products_per_page);

    $total_products = 18; // код для получения общего количества продуктов из базы данных;

    $total_pages = ceil($total_products / $products_per_page);

    $pagination = "";
    for ($i = 1; $i <= $total_pages; $i++) {
        // Условие, если текущая страница равна выбранной, то подсветить её
        if($current_page == $i) {
            $pagination .= "
                <li class='page-nav__item--active'>
                    <a class='page-nav__link' href='Catalog_page.php?page=$i'>$i</a>
                </li>
            ";
        } else {
            $pagination .= "
                <li class='page-nav__item'>
                    <a class='page-nav__link' href='Catalog_page.php?page=$i'>$i</a>
                </li>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог телескопов SkyFactory</title>
    <meta name="robots" content="">
    <meta name="description" content="Телескопы, имеющие низкие цены на Телескопы на рынке России. Сравните технические характеристики на Телескопы. Телескопы для начинающих и детей.
    Быстрый и удобный поиск из товаров популярных брендов: Sky-Watcher, Celestron, Levenhuk, Veber и другие.">
    <link rel="stylesheet" href="../assest/CSS/header.css">
    <link rel="stylesheet" href="../assest/CSS/footer.css">
    <link rel="stylesheet" href="../assest/CSS/catalog_page.css">
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

    <!--
        Основной раздел сайта (каталог товаров)
    -->
    <div class="main">
        <div class="page container">
            <div class="f1">
                <div class="subpage_nav">
                    <ul class="breadcrumb-nav">
                        <li><a href="../index.php" title="Главная">
                            <span>Главная</span>
                        </a></li>
                        <li><a href="#" title="Каталог телескопов" class="last__nav">
                            <span>Каталог телескопов</span>
                        </a></li>
                    </ul>
                </div>

                <div class="main__catalog">
                    <h1 class="name-category">Телескопы</h1>
                    <div class="content">
                        <div id="product-list">
                            <div class="sorting-view">
                                <!-- Сортировка -->
                                <div class="product-sorting">
                                    Сортировать: 
                                    <div class="btn-group">
                                        <select class="dropdown-menu btn btn-default dropdown-toggle" id="dropdown-menu">
                                            <option value="default">По умолчанию</option>
                                            <option value="asc">По возрастанию</option>
                                            <option value="desc">По убыванию</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <div class="product-count">
                                        Выводить по: 
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle">
                                                Все
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#" data-number="8" rel="nofollow">8</a></li>
                                                <li><a href="#" data-number="16" rel="nofollow">16</a></li>
                                                <li class="active"><a href="Catalog_page.php" rel="nofollow">Все</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- ./pull-right -->
                            </div>
                            <!-- ./sorting-view -->
                            
                            <div class="cart-items cart-list thumbs">
                                <div>
                                <div class="cards" id="cards">
                                <? while ($product = mysqli_fetch_assoc($products)) { ?>
                                    <div class="card">
                                        <div class="card__top">
                                            <a href="Cart_page.php?id=<?= $product['product_id'] ?>" class="card__image">
                                                <img src="<?= $product['path']; ?>" alt="<?= $product['name']; ?>" title="<?= $product['name']; ?>" />
                                            </a>
                                        </div>
                                        <div class="card__bottom">
                                            <div class="card__prices">
                                                <div class="card__price card__price--discount"><?= $product['price'] ?></div>
                                            </div>
                                            <a href="Cart_page.php?id=<?= $product['product_id'] ?>" class="card__title"><?= $product['name'] ?></a>
                                            <? if (!isset($_SESSION['user'])) { ?>
                                            <? } elseif ($_SESSION['user']['role'] == '2') { ?>
                                                <div>
                                                <a onclick="return confirm('Вы действительно хотите удалить этот товар?')" class="card__delete" href="../include/deleteCart.php?id=<?= $product['product_id'] ?>" class="card__title"><button class="card__remove">Удалить<i class="simbol"></i></button></a>
                                                <a href="admin/Update/UpdateCart_page.php?id=<?= $product['product_id'] ?>"><button class="card__add" style="margin-top:10px;">Редактировать<i class="simbol"></i></button></a>
                                        </div>
                                        <? } ?>
                                        <? if ($_SESSION['user']['role'] == '1') { ?>
                                            <a href="../include/addCart.php?id=<?= $product['product_id'] ?>"><button class="card__add">В корзину<i class="simbol"></i></button></a>
                                        <? } ?>
                                    </div>
                                    <!-- Товар -->
                                    
                                </div>
                            <?php } ?>
                                <!-- ./cards --> 
                            </div>
                            </div>
                            <!-- ./ul -->
                        </div>

                        <!--
                            Навигация на другие страницы каталога
                        -->
                        <div class="page-nav items_pager">
                            <ul class="page-nav__list">
                                <?= $pagination; ?>
                            </ul>
                        </div>
                        <!-- ./page-nav items_pager -->
                    </div>
                </div>
            </div>
            <!-- ./sidebar -->
        </div>
    </div>
    <!-- /.main -->

    <?php
        include "../include/footer.php";
    ?>
    <!-- ./footer -->
    <script defer src="../assest/JS/sort.js"></script>
</body>
</html>