<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'admin_daos/contact_dao.php';
    require_once 'daos/customer_dao.php';
    // セッション開始
    // session_start();

    // 質問項目入力エラーメッセージ表示
    $my_contact_error = $_SESSION['my_contact_error'];
    // 破棄
    $_SESSION['my_contact_error'] = null;
    // var_dump($contact_error);
    // 送信できた場合のメッセージ
    $my_contact_message = $_SESSION['my_contact_message'];
    // 破棄
    $_SESSION['my_contact_message'] = null;
    // // var_dump($contact_message);
    // idをnullで取得
    $id = null;
    // $idをGETで取得
    if(isset($_GET['id'])){
        $_GET['id'];
    }
    // viewファイルの表示
    include_once 'views/login_contact_view.php';
?>