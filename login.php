<?php
    // 外部ファイル読込
    require_once 'daos/customer_dao.php';
    // セッション開始
    session_start();
    // registration_new.phpのセッション  フラッシュメッセージ取得
    // $done_messageをセッションから取得 新規会員登録成功
    $done_message = $_SESSION['done_message'];
    // セッションに保存された$done_messageを一旦破棄（使いまわす為）
    $_SESSION['done_message'] = null;
    // 入力エラー内容の $errors をセッションから取得
    // $error_customer = $_SESSION['error_customer'];
    $errors = $_SESSION['errors'];
    // 破棄
    $_SESSION['errors'] = null;
    // var_dump($errors);
    
    // データベースを探してその様な顧客が見つからなかったという
    //  error_message をセッションから取得
    $error_message = $_SESSION['error_message'];
    // // 破棄
    $_SESSION['error_message'] = null;
    // var_dump($error_message);
    // viewファイルの表示
    include_once 'views/login_view.php';
?>