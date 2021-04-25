<?php
    session_start();
    // registration_new.phpのセッション情報取得
    $errors = $_SESSION['errors'];
    // 1度のみ表示
    $_SESSION['errors'] = null;
    // viewファイルの表示
    include_once 'views/sign_up_view.php';
?>