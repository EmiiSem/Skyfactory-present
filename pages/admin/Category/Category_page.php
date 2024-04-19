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
        $categories .= sprintf('<option value="%s">%s</option>', $row['category'], $row['category']);
    }

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
                    <li><a href="#" title="Панель добавления категории" class="last__nav">
                        <span>Панель добавления категории</span>
                    </a></li>
                </ul>
            </div>
            <!-- ./subpage_nav -->

            <div class="page__top container">
                <h1 class="page__title">Панель добавления категории</h1>
            </div>

            <div class="page__middle">
                <div class="addCat">
                    <h3 class="page__category">Добавить категорию</h3>
                    <form action="include/addCategory.php" method="POST">
                        <div class="info_add-category">
                            <label for="category" class="info-title">Название категории</label><br>
                            <input type="text" name="category" class="input_category" placeholder="Введите название категории"><br>
                            <button class="btn__addCategory">Добавить</button>
                        </div>
                    </form>
                </div>

                <div class="removCat">
                    <h3 class="page__category">Удалить категорию</h3>
                    <form action="include/removeCategory.php" method="POST">
                        <div class="info_remove-category">
                            <select name="category-list" class="select-category">
                                <option value selected disabled>Категории</option>
                                <?= $categories ?>
                            </select><br>

                            <button class="btn__removeCategory">Удалить</button>
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