<?php
    if(isset($_SESSION['user']['id'])) {
        require "connect.php";

        $sql = sprintf("SELECT `order_id`, `product_id`, `orders`.`count`, `name`, `price`, `path` FROM `orders` INNER JOIN `products` USING(`product_id`)
        WHERE `status` IS NULL AND `user_id`='%s'", $_SESSION['user']['id']);
        $result = $db->query($sql);

        $totalCount = 0;

        if($row = $result->fetch_assoc()) {
            $count = $row["count"];
            $totalCount += $count;

            $cartNum .= sprintf('
            <div class="cart__num" id="cart_num">%s</div>
            ', $totalCount);
        } elseif($cartNum == "") {
            $cartNum = '<div class="cart__num" id="cart_num">0</div>';
        }
    }
?>

<header class="header col-12">
        <div class="navbar container">
            <a href="../index.php" class="logo-link logo_png">
                <img src="../assest/img/logo.svg" alt="SkyFactory"> <!-- Логотип -->
            </a>
            <nav class="nav">
                <ul class="nav__list">
                    <!--
                        Бургер меню (выпадающее меню)
                    -->
                    <li class="nav__item">
                        <button class="hamburger-menu">
                            <input id="menu__toggle" class="check__box" type="checkbox" />
                            <label class="menu__btn" for="menu__toggle">
                                <p class="text__menu">Меню</p>
                                <span></span>
                            </label>
                            
                            <ul class="menu__box">
                              <li><a class="menu__item" href="../index.php">Главная</a></li>
                              <li><a class="menu__item" href="../pages/Catalog_page.php">Каталог товаров</a></li>
                              <li><a class="menu__item" href="../pages/Reviews_page.php">Отзывы</a></li>
                              <li><a class="menu__item" href="../pages/Quastion_page.php">Часто задаваемые вопросы</a></li>
                              <li><a class="menu__item" href="../pages/Contact_page.php">Контакты</a></li>
                              <li><a class="menu__item" href="../pages/About__page.php">О SkyFactory</a></li>
                            </ul>
                        </button>
                    </li>

                    <li class="nav__item">
                        <a href="#" class="nav__link">
                            <div class="form__search">
                                <form action="../pages/Search_page.php" method="POST">
                                    <input type="search" class="text__search" name="search" placeholder="Поиск товара..." autocomplete="off">
                                </form>
                            </div>
                        </a>
                    </li>

                    <? if (!isset($_SESSION['user'])) { ?>
                        <li class="nav__item lk__mobile">
                            <img src="../assest/img/account.svg" alt="" class="lk_img">
                            <a href="../pages/Register_page.php" class="nav__link lk_link">Личный кабинет</a>
                        </li>
                    <? } elseif ($_SESSION['user']['role'] == '2') { ?>
                        <li class="nav__item admin_link"><a class="nav__link " href="../pages/Admin_page.php">Админ-панель</a></li>
                        <li class="nav__item admin_link"><a class="nav__link " href="../include/logout.php">Выход</a></li>
                    <? } else { ?>
                        <li class="nav__item"><a class="nav__link lk_link" href="../include/logout.php">Выход</a></li>
                        <li class="nav__item"><a class="nav__link lk_link" href="../pages/Personal_accout_page.php">Кабинет</a></li>
                        <li class="nav__item"><a class="nav__link lk_link" href="../pages/Basket.php">
                            <button class="cart" id="cart">
                                <img class="cart__image" src="../assest/img/shopping_cart.svg" alt="Cart" />
                                <?= $cartNum ?>
                            </button>
                        </a></li>
                    <? } ?>
                </ul>
            </nav>
            
        </div>
        <!-- /.navbar -->
    </header>
    <!-- /.header -->