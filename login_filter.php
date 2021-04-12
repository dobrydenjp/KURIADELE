<?php
    // 外部ファイル読込
    require_once 'models/customer.php';
    // セッション開始
    session_start();
    // セッション情報 login_customerというニックネーム取得
    $login_customer = $_SESSION['login_customer'];
    // login_customerがnullの場合
    if($login_customer === null){
        header('Location: index.php');
        exit;
    }
?>