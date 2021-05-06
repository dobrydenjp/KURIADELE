<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'admin_daos/contact_dao.php';
    require_once 'daos/customer_dao.php';
    // 質問項目入力エラーメッセージ表示
    $error_message = $_SESSION['error_message'];
    // 1度のみ表示
    $_SESSION['error_message'] = null;
    // 送信できた場合のメッセージ
    $flash_message = $_SESSION['flash_message'];
    // 1度のみ表示
    $_SESSION['flash_message'] = null;
    // idをnullで取得
    $id = null;
    // $idをGETで取得
    if(isset($_GET['id'])){
        $_GET['id'];
    }
    // viewファイルの表示
    include_once 'views/login_contact_view.php';
?>