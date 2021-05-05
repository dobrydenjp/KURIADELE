<?php
    // 外部ファイル読込
    require_once 'daos/customer_dao.php';
    // セッション開始
    session_start();
    
    // 新規会員登録成功メッセージを取得
    $done_message = $_SESSION['done_message'];
    // 1度のみ表示
    $_SESSION['done_message'] = null;
    
    $done_message = null;
    if(isset($_SESSION['done_message'])){
     $contact_error = $_SESSION['done_message'];
    }
    // 入力エラーメッセージ取得
    $errors = $_SESSION['errors'];
    // 1度のみ表示
    $_SESSION['errors'] = null;
    
    $errors = null;
    if(isset($_SESSION['errors'])){
     $contact_error = $_SESSION['errors'];
    }
    // 顧客がいないというメッセージ取得
    $error_message = $_SESSION['error_message'];
    // 1度のみ表示
    $_SESSION['error_message'] = null;
    
    $error_message = null;
    if(isset($_SESSION['error_message'])){
     $contact_error = $_SESSION['error_message'];
    }
    // viewファイルの表示
    include_once 'views/login_view.php';
?>