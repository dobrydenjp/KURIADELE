<?php
    session_start();
    // セッションに保存されている管理者の情報取得
    $_SESSION['login_admin'] = null;
    // ログアウトした際メッセージ表示
    $_SESSION['logout_message'] = 'ログアウトしました';
    header('Location: admin_login.php');
    exit;
    
?>