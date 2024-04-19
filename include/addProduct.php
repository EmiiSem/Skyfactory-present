<?php
    session_start();

    include "connect.php";
    $name = htmlspecialchars($_POST['name']);
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $type_telescope = htmlspecialchars($_POST['type_telescope']);
    $mounting_plate = htmlentities($_POST['mounting_plate']);
    $price = htmlspecialchars($_POST['price']);
    $model = htmlspecialchars($_POST['model']);
    $category = $_POST['category'];
    $qty = htmlspecialchars($_POST['qty']);

    $path = "../assest/img/Products/" . time() . "_" . $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], "../" . $path);

    if($name) {
        mysqli_query($db, "INSERT INTO `products` (`product_id`, `name`, `title`, `description`, `price`, `model`, `category`, `count`, `path`) VALUES (NULL, '$name', '$title', '$description', '$price', '$model', '$category', '$qty', '$path')");
        header("Location: ../pages/Admin_page.php?message=Товар добавлен на страницу");
    }

?>
