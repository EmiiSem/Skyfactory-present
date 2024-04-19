<?php
    session_start();
    if($_SESSION['user']['role'] != "2") {
        header("Location: ../../../index.php?message=Отказано в доступе.");
    }
    require "../../../include/connect.php";

    $categories = mysqli_query($db, "SELECT * FROM `categories`");

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление категории телескопов SkyFactory</title>
    <meta name="robots" content="noindex">
    <meta name="description" content="Панель администратора интернет-магазина телескопов SkyFactory - добавление категории">
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
                    <li><a href="#" title="Панель добавления товара в интернет-магазин" class="last__nav">
                        <span>Панель добавления товара в интернет-магазин</span>
                    </a></li>
                </ul>
            </div>
            <!-- ./subpage_nav -->

            <div class="page__top container">
                <h1 class="page__title">Панель добавления товара в интернет-магазин</h1>
            </div>

            <div class="page__middle">

                <div class="form_admin">
                    <p class="add_cart">Добавить товар</p>
                    <div class="flex flex-column gap-4">
                        <form action="../../../include/addProduct.php" method="POST" enctype="multipart/form-data">
                            <input type="text" name="name" class="input_admin" placeholder="Название товара" required>
                            <textarea name="title" class="input_admin inp_descript" placeholder="Короткий заголовок" required></textarea>
                            <textarea name="description" class="input_admin inp_descript" placeholder="Информация о товаре" required></textarea>
                            <input type="text" name="type_telescope" class="input_admin" placeholder="Тип телескопа" required>
                            <input type="text" name="mounting_plate" class="input_admin" placeholder="Монтировка" required>
                            <input type="text" name="price" class="input_admin" placeholder="Цена товара" required>
                            <input type="text" name="model" class="input_admin" placeholder="Модель товара" required>
                            <label for="category" class="category">Категория</label>
                            <select name="category" class="input_admin select_category">
                                <?php while($cat = mysqli_fetch_assoc($categories)) { ?>
                                    <option value="<?= $cat['category_id'] ?>"><?= $cat['category'] ?></option>
                                <?php } ?>
                            </select>
                            <input type="text" name="qty" class="input_admin value_card" placeholder="Количество товара" required>
                            <input type="file" name="file" placeholder="Фотография товара" class="admin_input">
                            <button type="submit" class="input_admin btn_admin">Добавить товар</button>
                        </form>
                    </div>
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