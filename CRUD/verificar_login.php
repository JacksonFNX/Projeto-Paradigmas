<?php
    @session_start();
    if(!$_SESSION['nome']){
        $_SESSION['realizar_login'] = true;
        header('Location: index.php');
        exit();
    }