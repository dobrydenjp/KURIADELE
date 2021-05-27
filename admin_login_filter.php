<?php
    // 外部ファイル読込
    require_once 'admin_daos/admin_dao.php';
    // セッション開始
    session_start();
    $login_admin = null;
    // セッション情報 login_adminというニックネーム取得
    $login_admin = $_SESSION['login_admin'];
    // $login_adminがnullの場合
    if($login_admin === null){
        // ログインできないメッセージ表示
        header('Location: admin_login.php');
        exit;
    }
?>