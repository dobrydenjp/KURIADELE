<?php
    // // ログインフィルター
    require_once 'login_filter.php';
    // // 外部ファイル読込
    require_once 'daos/item_dao.php';
    require_once 'models/customer.php';
    // ログイン者の情報保存 login_check.phpからのセッション
    $login_customer = $_SESSION['login_customer'];
    // // $idをGETで取得
    $id = null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // 検索した結果のメッセージ取得
    $flash_message = $_SESSION['flash_message'];
    // 1度のみ表示
    $_SESSION['flash_message'] = null;
     // viewファイルの表示
    include_once 'views/products.php';
?>