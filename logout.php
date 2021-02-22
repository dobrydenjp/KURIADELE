<?php
    session_start();
    // 削除
    $_SESSION['login_customer'] = null;
    $_SESSION['flash_message'] = 'ログアウトしました';
    header('Location: index.php');
    exit;
?>