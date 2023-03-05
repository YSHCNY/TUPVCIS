<?php
    session_start();

    if (!isset($_SESSION['IDno']) || ($_SESSION['IDno'] == '')) {
        header('location: index.php');
        exit();
    }



  

?>