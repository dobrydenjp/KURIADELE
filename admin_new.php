<?php
    // 外部ファイル読込
    require_once 'admin_daos/admin_dao.php';
    // セッション開始
    session_start();
    // 入力されたアドレスとパスワード表示  確認ＯＫ
    $email_address = $_POST['email_address'];
    $password = $_POST['password'];
    // 入力されたアドレス・パスワードをデータベースから抜き出す
    $admin = AdminDAO::get_admin($email_address, $password);
    // falseと$adminの値または型が等しくない 同じではない時
    if($admin !== false){
         // セッション情報 login_adminというニックネームを保存
        $_SESSION['login_admin'] = $admin->name . '様　こんにちは';
        // 画面遷移
        header('Location: admin_index.php');
        exit;
    }else{ // いなければ
            $_SESSION['error_message'] = 'ログインできません';
        // 画面遷移
        header('Location: admin_login.php');
        exit;
    }
?>