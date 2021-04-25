<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'daos/customer_dao.php';
    // ログイン者の情報取得
    $login_customer = $_SESSION['login_customer'];
    // エラーメッセージの取得
    $errors = $_SESSION['errors'];
    // 1度のみ表示
    $_SESSION['errors'] = null;
    // 顧客情報更新メッセージ をセッションより取得
    $update_message = $_SESSION['update_message'];
    // 1度のみ表示
    $_SESSION['update_message'] = null;
    // viewファイルの表示
    include_once 'views/login_change_view.php';
?>