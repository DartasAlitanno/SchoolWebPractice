<?php
    require "red_bean_db_connect.php";
    unset($_SESSION['logged_user']);
    header('Location: /');
?>
