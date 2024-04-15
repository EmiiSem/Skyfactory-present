<?php
    session_start();

    require "../include/connect.php";

    // $products = mysqli_query($db, "SELECT * FROM `products` JOIN `categories` WHERE `products`.category = `categories`.category_id");
    // SELECT * FROM `reviews` JOIN `users` WHERE `reviews`.user_id = `users`.id

    $reviews = mysqli_query($db, "SELECT * FROM `reviews` JOIN `users` WHERE `reviews`.user_id = `users`.id");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отзывы сайта SkyFactory</title>
    <meta name="robots" content="nofollow">
    <meta name="description" content="Интернет-магазин телескопов. Отзывы пользователей о магазине и о телескопах.">
    <link rel="stylesheet" href="../assest/CSS/reviews_page.css">
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
                    <li><a href="#" title="Отзывы об магазине" class="last__nav">
                        <span>Отзывы об магазине</span>
                    </a></li>
                </ul>
            </div>
            <!-- ./subpage_nav -->

            <h1 class="page__title">Отзывы о магазине</h1>

            <div class="store-reviews container">
                <form action="../include/reviews.php" method="POST">
                    <div class="reviews-list__item reviews-list__item--button">
                        <button class="btn-lg btn-addon btn-base-brand-1 reviews-list__button-add">
                            Написать отзыв
                        </button>
                    </div>
                    <!-- ./reviews-list__item -->
                </form>

                <div class="reviews-list">
                    <? while ($review = mysqli_fetch_assoc($reviews)) { ?>
                        <ul class="reviews-list ">
                            <li class="reviews-list__item">
                                <div class="reviews-avatar"></div>
                                <div class="reviews-content">
                                    <div class="reviews-details">

                                        <div class="reviews-list__author-name">
                                            <span><?= $review['fio']; ?></span>
                                        </div>

                                        <div class="reviews-list__rating rating">
                                            <div class="product-card__rating-wrap rating__wrap star-rating disabled" title="5/5" style="width: 90px; height: 18px; background-size: 18px;">
                                                <div class="star-value" style="background-size: 18px; width: 100%;"></div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- ./details -->

                                    <div class="reviews-list__text">
                                        <div class="reviews-list__body">
                                            <div class="reviews-list__body-title">Преимущества</div>
                                            <div class="reviews-list__body-text"><?= $review['advantage']; ?></div>
                                        </div>

                                        <div class="reviews-list__body">
                                            <div class="reviews-list__body-title">Недостатки</div>
                                            <div class="reviews-list__body-text"><?= $review['disadvantage']; ?></div>
                                        </div>
                                    
                                        <div class="reviews-list__body">
                                            <div class="reviews-list__body-title">Комментарий</div>
                                            <div class="reviews-list__body-text">
                                                <span><?= $review['comment']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./reviews-list__text -->

                                </div>
                            </li>
                        </ul>
                    <? } ?>
                    <!-- Первый отзыв -->

                </div>
                <!-- ./reviews-list -->
            </div>
            <!-- ./store-reviews -->
        </div>
        <!-- ./page container -->
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