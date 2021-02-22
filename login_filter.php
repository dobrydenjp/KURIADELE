<?php

    require_once 'customer.php';
    session_start();
    
    $login_customer = $_SESSION['login_customer'];
    
    if($login_customer === null){
        header('Location: index.php');
        exit;
    }