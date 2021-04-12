<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'daos/customer_dao.php';
    // セクション開始
    session_start(); 
    // ログイン者の情報取得
    $login_customer = $_SESSION['login_customer'];
    // var_dump($customer_id);
    // エラーメッセージの取得
    $errors = $_SESSION['errors'];
    // エラーメッセージをセッションから破棄
    $_SESSION['errors'] = null;
    // 顧客情報更新メッセージ をセッションより取得
    $update_message = $_SESSION['lupdate_message'];
    // 破棄
    $_SESSION['update_message'] = null;
    // viewファイルの表示
    include_once 'views/login_change_view.php';
?>