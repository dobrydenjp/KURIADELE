<?php
    session_start();
    // registration_new.phpのセッション情報取得
    $errors = $_SESSION['errors'];
    
    $_SESSION['errors'] = null;
    // var_dump($errors);
    // viewファイルの表示
    include_once 'views/sign_up_view.php';
?>