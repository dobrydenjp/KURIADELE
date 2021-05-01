<?php
    // セッション開始
    session_start();
    // ログインにて入力ミスの場合にエラーメッセージ表示
    $error = $_SESSION['error'];
    // 1度のみ表示
    $_SESSION['error'] = null;
    
    if(isset($_SESSION['error'])){
     $error = $_SESSION['error'];
    }
    // ログアウトメッセージ表示
    $logout_message = $_SESSION['logout_message'];
    // 1度のみ表示
    $_SESSION['logout_message'] = null; 
    
    // viewファイルの表示
    include_once 'admin_views/admin_login_view.php';
?>