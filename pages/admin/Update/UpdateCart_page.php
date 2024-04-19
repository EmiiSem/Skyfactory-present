<?php
    session_start();
    if($_SESSION['user']['role'] != "2") {
        header("Location: ../../../index.php?message=Отказано в доступе.");
    }
    require "../../../include/connect.php";

    $sql = "SELECT * FROM `categories`";
    $result = $db->query($sql);
    $categories = "";
    while ($row = $result->fetch_assoc()) {
        $selected = ($row["category"] == $row["category"]) ? "selected" : "";
        $categories .= sprintf('<option value="%s" %s>%s</option>', $row['category'], $selected, $row['category']);
    }

    $product_id = $db->real_escape_string($_GET["id"]);
    $sql = "SELECT * FROM `products` WHERE `product_id`='$product_id'";
    $product = $db->query($sql)->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование товаров интернет-магазина</title>
    <meta name="robots" content="noindex">
    <meta name="description" content="Панель администратора интернет-магазина телескопов SkyFactory - редактирование товара">
    <link rel="stylesheet" href="../../../assest/CSS/admin_page.css">
    <link rel="stylesheet" href="../../../assest/CSS/header.css">
    <link rel="stylesheet" href="../../../assest/CSS/footer.css">
    <link rel="stylesheet" href="../../../assest/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assest/CSS/personal_page.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <!--
        Шапка сайта
    -->
    <?php
        include "header.php";
    ?>

    <div class="main">
        <div class="page container">
            <div class="subpage_nav">
                <ul class="breadcrumb-nav">
                    <li><a href="../../../index.php" title="Главная">
                        <span>Главная</span>
                    </a></li>
                    <li><a href="../../../pages/Admin_page.php" title="Панель админа">
                        <span>Панель админа</span>
                    </a></li>
                    <li><a href="#" title="Панель редактирования" class="last__nav">
                        <span>Панель редактирования</span>
                    </a></li>
                </ul>
            </div>
            <!-- ./subpage_nav -->

            <div class="page__top container">
                <h1 class="page__title">Панель редактирования</h1>
            </div>

            <div class="page__middle">
                <h3 class="page__application">Изменить товар</h3>

                <div class="form_update">
                    <form enctype="multipart/form-data" action="include/update_product.php" method="POST">
                        <input type="hidden" name="id" value="<?= $product["product_id"] ?>">
                        <div class="info_update-category">
                            <label for="name" class="info-title">Название товара</label><br>
                            <input type="text" name="name" value="<?= $product["name"] ?>" class="input_admin" placeholder="Название товара" required>
                        </div>
                        <div class="info_update-category">
                            <label for="title" class="info-title">Заголовок</label><br>
                            <textarea name="title" class="input_admin inp_descript" placeholder="Короткий заголовок" required><?= $product["title"] ?></textarea>
                        </div>
                        <div class="info_update-category">
                            <label for="desciption" class="info-title">Описание</label><br>
                            <textarea name="description" class="input_admin inp_descript" placeholder="Информация о товаре" required><?= $product["description"] ?></textarea>
                        </div>
                        <div class="info_update-category">
                            <label for="type" class="info-title">Тип телескопа</label><br>
                            <input type="text" name="type_telescope" value="<?= $product["type"] ?>" class="input_admin" placeholder="Тип телескопа" required>
                        </div>
                        <div class="info_update-category">
                            <label for="mouting" class="info-title">Тип монтировки</label><br>
                            <input type="text" name="mounting_plate" value="<?= $product["mounting_plate"] ?>" class="input_admin" placeholder="Монтировка" required>
                        </div>
                        <div class="info_update-category">
                            <label for="price" class="info-title">Цена</label><br>
                            <input type="text" name="price" class="input_admin" value="<?= $product["price"] ?>" placeholder="Цена товара" required>
                        </div>
                        <div class="info_update-category">
                            <label for="model" class="info-title">Модель</label><br>
                            <input type="text" name="model" class="input_admin" value="<?= $product["model"] ?>" placeholder="Модель товара" required>
                        </div>
                        <div class="info_update-category">
                            <label for="category" class="info-title">Категория</label><br>
                            <select name="category" class="input_admin select_category">
                                <option value selected disabled>Категории</option>
                                <?= $categories ?>
                            </select>
                        </div>
                        <div class="info_update-category">
                            <label for="count" class="info-title">Количество товара на складе</label><br>
                            <input type="text" name="qty" class="input_admin" value="<?= $product["count"] ?>" placeholder="Количество товара" required>
                        </div>
                        <div class="info_update-category">
                            <label for="image" class="info-title">Фотография товара</label><br>
                            <input type="file" name="file" placeholder="Фотография товара" class="admin_input">
                        </div>
                        <div class="info_update-category">
                            <button type="submit" class="input_admin btn_admin btn__update">Изменить товар</button>
                        </div>
                    </form>
                </div>
                
            </div>

        </div>
    </div>

    <!--
        Подвал сайта
    -->
    <?php
        include "footer.php";
    ?>
</body>
</html>