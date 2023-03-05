<?php 
    session_start();
    session_destroy();
    unset($_SESSION['IDno']);
    unset($_SESSION['Username']);
    header('location:index.php');
    exit();
?>