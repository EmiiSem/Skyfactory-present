<?php
    session_start();
    if($_SESSION['user']['role'] != "2") {
        header("Location: ../../../../index.php?message=Отказано в доступе.");
    }
    require "../../../../include/connect.php";
    
    $name = htmlspecialchars($_POST['name']);
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $type_telescope = htmlspecialchars($_POST['type_telescope']);
    $mounting_plate = htmlentities($_POST['mounting_plate']);
    $price = htmlspecialchars($_POST['price']);
    $model = htmlspecialchars($_POST['model']);
    $category = $_POST['category'];
    $qty = htmlspecialchars($_POST['qty']);

    if($_FILES['file']['error']) {
        $img = "";
    } else {
        $img = "../../../../assest/img/Products/" . time() . "_" . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], "../" . $img);
    }

    $db->query(sprintf("UPDATE `products` SET `name`='%s',`title`='%s',`description`='%s',`type`='%s',`mounting_plate`='%s',
    `price`='%s',`model`='%s',`category`='%s',`count`='%s',`path`='%s',
    WHERE `product_id`='%s'", $name, $title, $description, $type_telescope, $mounting_plate, $price, $model, $category, $qty, $img, $_POST["id"]));

    return header("Location: ../../../../pages/Catalog_page.php?message=Товар изменён");
?>