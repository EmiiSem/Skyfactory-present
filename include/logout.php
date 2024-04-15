<?php
    session_start();

    if($_SESSION['user'])
    {
        session_destroy();
        header("Location: ../pages/Login_page.php");
    } else {
        header("Location: ../pages/Login_page.php");
    }
?>