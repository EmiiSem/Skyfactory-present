<?php
    session_start();

    $id = $_GET['id'];
    if($_SESSION['user']['role'] == '2')
    {
        include "connect.php";
        mysqli_query($db, "DELETE FROM `products` WHERE `products`.`product_id` = '$id'");
        header("Location: ../Catalog_page.php");
    } else {
        header("Location: ../Cart_page.php");
    }
?>