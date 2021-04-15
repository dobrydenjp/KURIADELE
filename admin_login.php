<?php
    // セッション開始
    session_start();
    // ログインにて入力ミスの場合にエラーメッセージ表示
    $error = $_SESSION['error'];
    // 破棄
    $_SESSION['error'] = null;
    // ログアウトメッセージ表示
    $logout_message = $_SESSION['logout_message'];
    // // 破棄
    $_SESSION['logout_message'] = null; 
    
    // headerの管理者TOPにフィルターつける
    // 
    // viewファイルの表示
    include_once 'admin_views/admin_login_view.php';
?>