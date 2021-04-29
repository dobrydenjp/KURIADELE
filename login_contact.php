<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'admin_daos/contact_dao.php';
    require_once 'daos/customer_dao.php';
    // 質問項目入力エラーメッセージ表示
    $my_contact_error = $_SESSION['my_contact_error'];
    // 1度のみ表示
    $_SESSION['my_contact_error'] = null;
    
    if(isset($_SESSSION['my_contact_error'])){
     $my_contact_error = $_SESSION['my_contact_error'];
    }
    // 送信できた場合のメッセージ
    $my_contact_message = $_SESSION['my_contact_message'];
    // 1度のみ表示
    $_SESSION['my_contact_message'] = null;
    // idをnullで取得
    $id = null;
    // $idをGETで取得
    if(isset($_GET['id'])){
        $_GET['id'];
    }
    // viewファイルの表示
    include_once 'views/login_contact_view.php';
?>