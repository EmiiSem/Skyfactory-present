<?php
    session_start();

    include "connect.php";

    $name = $_POST['name'];
    $price = $_POST['price'];
    $model = $_POST['model'];
    $category = $_POST['category'];
    $qty = $_POST['qty'];

    $path = "assest/img/Products/" . $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $path);

    if($name) {
        mysqli_query($db, "INSERT INTO `products` (`product_id`, `name`, `price`, `model`, `category`, `count`, `path`) VALUES (NULL, '$name', '$price', '$model', '$category', '$qty', '$path')");
        header("Location: ../Admin_page.php");
    }

?>
