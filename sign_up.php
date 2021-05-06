<?php
    session_start();
    // registration_new.phpのセッション情報取得
    $error_message = $_SESSION['error_message'];
    // 1度のみ表示
    $_SESSION['error_message'] = null;
    // viewファイルの表示
    include_once 'views/sign_up_view.php';
?>