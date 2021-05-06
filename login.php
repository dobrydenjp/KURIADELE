<?php
    // 外部ファイル読込
    require_once 'daos/customer_dao.php';
    // セッション開始
    session_start();
    
    // 新規会員登録成功メッセージを取得
    $flash_message = $_SESSION['flash_message'];
    // 1度のみ表示
    $_SESSION['flash_message'] = null;
    
    // $done_message = null;
    // if(isset($_SESSION['done_message'])){
    //  $contact_error = $_SESSION['done_message'];
    // }
    // 入力エラーメッセージ取得
    $error_message = $_SESSION['error_message'];
    // 1度のみ表示
    $_SESSION['error_message'] = null;

    // // 顧客がいないというメッセージ取得
    // 出力されない
    $errors = $_SESSION['errors'];
    // 1度のみ表示
    $_SESSION['errors'] = null;
    
    // $errors = null;
    // if(isset($_SESSION['errors'])){
    //  $errors = $_SESSION['errors'];
    // }
    // viewファイルの表示
    include_once 'views/login_view.php';
?>