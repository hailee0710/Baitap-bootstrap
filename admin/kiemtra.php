<?php
    ob_start();

    if(!session_start()){
        session_start();
    }

    if(!isset ($_SESSION['tk'])){
        header('location:dangnhap.php');
    }
?>