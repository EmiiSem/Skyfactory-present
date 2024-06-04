<?php
    session_start();

    require "../include/connect.php";

    if(!isset($_SESSION['user']['id'])) {
        return header("Location: ../index.php?message=Вы не авторизированы");
    }

    $sql = sprintf("SELECT `order_id`, `product_id`, `orders`.`count`, `name`, `price`, `path` FROM `orders`
    INNER JOIN `products` USING(`product_id`) WHERE `status` IS NULL AND `user_id`='%s'", $_SESSION['user']['id']);
    $result = $db->query($sql);

    if($result == false) {
        die("Ошибка выполнения запроса: " . $db->error);
    }

    $products = "";
    $totalPrice = 0;
    $totalCount = 0;

    while($row = $result->fetch_assoc()) {
        $name = $row["name"];
        $count = $row["count"];
        $price = $row["price"];

        $subtotal = $count * $price;
        $totalCount += $count;
        $totalPrice += $subtotal;

        $products .= sprintf('
        <div class="block__info-cart">
            <div class="block_cart-inner">
                <a href="" class="img_cart">
                    <img src="%s" class="img__cart" alt="%s" title="%s">
                </a>
                <a href="" class="title_link-cart">
                    <p class="title_cart">%s</p>
                </a>
                <!-- блок изменения кол-ва товаров -->
                <div class="block_change-count">
                    <a href="../include/delete_cart.php?id=%s" class="btn2">
                        <i class="fa fa-minus" aria-hidden="true"></i>
                    </a>
                    <p class="mt-2 ml-1 mr-1">%s</p>
                    <a href="../include/addCart.php?id=%s" class="btn2">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </a>
                </div>
                <!-- конец блока изменения -->

                <div class="block_delete">
                    <a href="" class="delete_cart">Удалить</a>
                </div>
                
                <div class="block_price-cart">
                    <p class="title-price">%s руб.</p>
                </div>
            </div>
        </div>', $row['path'], $row['name'], $row['name'], $row['name'], $row['product_id'], $row['count'], $row['product_id'], $row['price']);

        $pricing .= sprintf('
        <div class="block-inner-price">
            <p class="price-total_title">Итого</p>
            <p class="price-total">%s руб.</p>
        </div>', $row['price']);
    }

    $countValueStr .= sprintf('
    <p class="cart_sub">%s товаров</p>
    ', $totalCount);

    if($products == "") {
        $products = '<h1 class="products_none">Товары отсутствуют</h1>';
    }

    if($pricing == "") {
        $pricing = '
        <div class="block-inner-price">
            <p class="price-total_title">Итого</p>
            <p class="price-total">0 руб.</p>
        </div>';
    }

    if($countValueStr == "") {
        $countValueStr = '<p class="cart_sub">0 товаров</p>';
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина товаров интернет-магазина телескопов</title>
    <meta name="robots" content="noindex">
    <meta name="description" content="Корзина товаров интернет-магазина телескопов SkyFactory. Покупка телескопов">
    <link rel="stylesheet" href="../assest/CSS/cart.css">
    <link rel="stylesheet" href="../assest/CSS/header.css">
    <link rel="stylesheet" href="../assest/CSS/footer.css">
    <link rel="stylesheet" href="../assest/CSS/bootstrap.min.css">
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
        <div class="container">

            <div class="subpage_nav">
                <ul class="breadcrumb-nav">
                    <li><a href="../index.php" title="Главная">
                        <span>Главная</span>
                    </a></li>
                    <li><a href="#" title="Корзина" class="last__nav">
                        <span>Корзина</span>
                    </a></li>
                </ul>
            </div>
            <!-- ./subpage_nav -->

            <h1 class="page__title">Корзина</h1>

            <div class="cart__mine-info">
                <?= $countValueStr ?>
                <p class="clear_sub">Очистить всё</p>
            </div>

            <!-- Основной блок товара -->
            <div class="block__main-cart">
                <!-- начало левого блока -->
                <div>
                    <?= $products; ?>
                </div>
                <!-- конец левого блока -->

                <!-- Начало правого блока -->
                <div class="block__total_price-cart">
                    <div class="block-inner-price">
                        <p class="price-total_title">Итого</p>
                        <p class="price-total"><?= $totalPrice ?> руб.</p>
                    </div>
                    <div class="block-inner-btn">
                        <a href="../include/checkout.php" class="btn__add-cart">
                            <button class="btn__add">Перейти к оформлению</button>
                        </a>
                    </div>
                </div>
                <!-- Конец правого блока -->

            </div>
            <!-- конец основного блока товара -->

        </div>
    </div>

    <?php
        include "../include/footer.php";
    ?>
</body>
</html>