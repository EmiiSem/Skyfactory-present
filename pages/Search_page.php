<?php
    session_start();
    require "../include/connect.php";

    $role = (isset($_SESSION['user']['role'])) ? $_SESSION['user']['role'] : "guest";

    $query = $_POST['search'];

    // Формирование SQL-запроса для поиска товаров
    $sql = "SELECT * FROM  `products` WHERE `name` LIKE '%$query%'";

    $sort = $_GET['sort'];
    // Формирование SQL-запроса с сортировкой
    if ($sort === 'price') {
        $sql .= "ORDER BY `price` ASC";
    } elseif ($sort === 'name') {
        $sql .= "ORDER BY `name` ASC";
    }

    // Выполнение SQL-запроса
    $result = mysqli_query($db, $sql);

    $data = "";

    if($result->num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $data .= sprintf('
            <div class="card">
                <div class="card__top">
                    <a href="Cart_page.php?id=%s" class="card__image">
                        <img src="%s" alt="%s" title="%s">
                    </a>
                </div>
                <div class="card__bottom">
                    <div class="card__prices">
                        <div class="card__price card__price--discount">%s</div>
                    </div>
                    <a href="Cart_page.php?id=%s" class="card__title">%s</a>
                    %s
                    %s
                </div>
            </div>
            ', $row['product_id'], $row['path'], $row['name'], $row['name'], $row['price'], $row['product_id'], $row['name'],
        ($role == "2") ? '
            <a onclick="return confirm(\'Вы действительно хотите удалить этот товар?\')" class="card__delete" href="../include/deleteCart.php?id='. $row['product_id']. '" class="card__title"><button class="card__remove">Удалить<i class="simbol"></i></button></a>' : '',
        ($role == "1") ? '
            <a href="../include/addCart.php?id='. $row['product_id'] .'"><button class="card__add">В корзину<i class="simbol"></i></button></a>' : '');
        }
    } else {
        $data = '<h3 class="empty_none">По вашему поиску ничего не найдено</h3>';
    }

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог товаров SkyFactory</title>
    <meta name="robots" content="">
    <meta name="description" content="SkyFactory, интернет-магазин телескопов, доставкой по всей России и СНГ">
    <link rel="stylesheet" href="../assest/CSS/search_page.css">
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
                    <li><a href="Catalog_page.php" title="Каталог телескопов">
                        <span>Каталог телескопов</span>
                    </a></li>
                    <li><a href="#" title="Результат поиска" class="last__nav">
                        <span>Результат поиска</span>
                    </a></li>
                </ul>
            </div>
            <!-- ./subpage_nav -->

            <h1 class="page__title">Результаты поиска "<?= $query ?>"</h1>

            <div class="sort">
                <a class="btn__sort" href="Search_page.php?query=<?= $query ?>&sort=price">Сортировать по цене</a>
                <a class="btn__sort" href="Search_page.php?query=<?= $query ?>&sort=name">Сортировать по названию</a>
            </div>

            <div class="cards">
                <?= $data; ?>
            </div>
        </div>
    </div>


    <?php
        require '../include/footer.php';
    ?>
</body>
</html>