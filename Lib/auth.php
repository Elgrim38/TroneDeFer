<?php
    session_start();
    if(!isset($auth)){
        if(!isset($_SESSION['Auth']['id'])){
            header('Location:' 'index.php');
            die();
        }
    }
?>