<?php
    // 外部ファイル読込
    require_once 'daos/customer_dao.php';
    // セッション開始
    session_start();
    // 新規会員登録成功メッセージを取得
    $done_message = $_SESSION['done_message'];
    // 1度のみ表示
    $_SESSION['done_message'] = null;
    // 入力エラーメッセージ取得
    $errors = $_SESSION['errors'];
    // 1度のみ表示
    $_SESSION['errors'] = null;
    // 顧客がいないというメッセージ取得
    $error_message = $_SESSION['error_message'];
    // 1度のみ表示
    $_SESSION['error_message'] = null;
    // viewファイルの表示
    include_once 'views/login_view.php';
?>