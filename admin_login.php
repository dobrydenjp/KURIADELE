<?php
    // セッション開始
    session_start();
    // ログインにて入力ミスの場合にエラーメッセージ表示
    $error_message = $_SESSION['error_message'];
    // 1度のみ表示
    $_SESSION['error_message'] = null;
    // $error_message = null;
    // if(isset($_SESSION['error_message'])){
    //  $error_message = $_SESSION['error_message'];
    // }
    // ログアウトメッセージ表示
    $flash_message = $_SESSION['flash_message'];
    // 1度のみ表示
    $_SESSION['flash_message'] = null; 
    // if(isset($_SESSION['flash_message'])){
    //  $flash_message = $_SESSION['flash_message'];
    // }
    // viewファイルの表示
    include_once 'admin_views/admin_login_view.php';
?>