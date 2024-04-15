<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница регистрации SkyFactory</title>
    <meta name="robots" content="noindex">
    <meta name="description" content="Регистрация в интернет-магазине телескопов SkyFactory">
    <link rel="stylesheet" href="../assest/CSS/register_login.css">
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
            <div class="subpage_nav">
                <ul class="breadcrumb-nav">
                    <li><a href="../index.php" title="Главная">
                        <span>Главная</span>
                    </a></li>
                    <li><a href="#" title="Регистрация" class="last__nav">
                        <span>Регистрация</span>
                    </a></li>
                </ul>
            </div>
            <!-- ./subpage_nav -->

            <h1 class="page__title">Страница регистрации</h1>
            <p class="subtitle">Если вы уже зарегистрированы, то <a href="Login_page.php">войдите в аккаунт</a></p>
            <div class="center__block">
                <div class="left">
                    <form action="../include/registration.php" method="POST" id="form-register">
                        <div class="errors-block errors-validation-block disp-none mb-4"></div>

                        <div class="inp-wrapper">
                            <input type="text" class="inp-field" name="fio" id="fio" placeholder="ФИО">
                        </div>

                        <div class="inp-wrapper">
                            <input type="text" class="inp-field" name="login" id="login" placeholder="Логин">
                        </div>

                        <div class="inp-wrapper">
                            <input type="email" class="inp-field" name="email" id="email" placeholder="E-mail">
                        </div>

                        <div class="inp-wrapper">
                            <input type="password" class="inp-field" name="password" id="password" placeholder="Введите пароль">
                        </div>

                        <div class="inp-wrapper">
                            <input type="password" class="inp-field" name="password_confirm" id="password_confirm" placeholder="Повторите пароль">
                        </div>

                        <button type="submit" class="btn1 btn-md btn-base-brand-1 btn2">Зарегистрироваться</button>

                        <div class="message">
                            <?= @$_SESSION['message']; unset($_SESSION['message']) ?>
                        </div>

                    </form>
                </div>
                <div class="right">
                    <img src="../assest/img/form_reg.png" alt="Обсерватория" title="Фоновое изображение обсерватории" class="right_img">
                </div>
            </div>
            

        </div>
    </div>
    <!-- ./main -->

    <!--
        Подвал сайта
    -->
    <?php
        include "../include/footer.php";
    ?>

    <script src="../assest/JS/script.js"></script>
</body>
</html>