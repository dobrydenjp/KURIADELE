<?php
    // セッション開始
    session_start();
    // 登録したメッセージ取得
    $admin_message = $_SESSION['admin_message'];
    // 1度のみ表示
    $_SESSION['admin_message'] = null;
    if(isset($_SESSSION['admin_message'])){
        $admin_message = $_SESSION['admin_message'];
        
    }
    // 入力エラーメッセージ取得
    $error_message = $_SESSION['error_message'];
    // 1度のみ表示
    $_SESSION['error_message'] = null;
    
    // viewファイルの表示
    include_once 'admin_views/admin_sign_up_view.php';
?>