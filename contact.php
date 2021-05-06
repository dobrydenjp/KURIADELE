<?php
    // 外部ファイル読込
    require_once 'admin_daos/contact_dao.php';
    // セッション開始
    session_start();
    // 質問項目入力エラーメッセージ表示
    $error_message = $_SESSION['error_message'];
    // 1度のみ表示
    $_SESSION['error_message'] = null;

    // 送信できた場合のメッセージ
    $flash_message = $_SESSION['flash_message'];
    // 1度のみ表示
    $_SESSION['flash_message'] = null;

    // viewファイルの表示
    include_once 'views/contact_view.php';
?>