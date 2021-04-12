<?php
    // 外部ファイル読込
    require_once 'admin_daos/contact_dao.php';
    // セッション開始
    session_start();
    // 質問項目入力エラーメッセージ表示
    $contact_error = $_SESSION['contact_error'];
    // 破棄
    $_SESSION['contact_error'] = null;
    // var_dump($contact_error);
    // 送信できた場合のメッセージ
    $contact_message = $_SESSION['contact_message'];
    // 破棄
    $_SESSION['contact_message'] = null;
    // var_dump($contact_message);
    // viewファイルの表示
    include_once 'views/contact_view.php';
?>