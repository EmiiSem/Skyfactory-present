<?php
    session_start();

    if($_SESSION['user'])
    {
        session_destroy();
        header("Location: ../Login_page.php");
    } else {
        header("Location: ../Login_page.php");
    }
?>