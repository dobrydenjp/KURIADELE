<?php
    // 外部ファイル読込
    require_once 'admin_daos/admin_dao.php';
    // セッション開始
    session_start();
    // 入力情報を取得
    $name = $_POST['name'];
    $email_address = $_POST['email_address'];
    $password = $_POST['password'];
    // 入力情報を元に新しい管理者インスタンスを作成
    $admin = new Admin($name, $email_address, $password);
    // 入力チェック
    $error_message = AdminDAO::validate_sign_up($admin);
    // // 入力エラーが１つでもないならば
    if(count($error_message) === 0){
        // 管理者情報を保存
        AdminDAO::admin_insert($admin);
        // 管理者登録をしたメッセージを保存
        $_SESSION['flash_message'] = $name . 'さんの登録が完了しました。';
        // 画面遷移
        header('Location: admin_login.php');
        exit;
    }else{ // 入力エラーが１つでもあるならば
        // 管理者登録をしたメッセージを保存
        $_SESSION['error_message'] = $error_message;
        // 画面遷移
        header('Location: admin_sign_up.php');
        exit;
    }
?>