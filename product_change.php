<?php
    // ログインフィルター
    require_once 'admin_login_filter.php';
    // 外部ファイル読込
    require_once 'admin_daos/admin_dao.php';
    require_once 'daos/item_dao.php';
    // セッション開始
    // session_start();
    // ログイン者の情報をセッションに保存
    $login_admin = $_SESSION['login_admin'];
    // 登録できないメッセージ表示
    $errors = $_SESSION['errors'];
    // 1度のみ表示
    $_SESSION['errors'] = null;
    //
    // 無事に商品登録完了したメッセージ表示
    $flash_message = $_SESSION['register_message'];
    // 1度のみ表示
    $_SESSION['register_message'] = null;

    if(isset($_SESSSION['register_message'])){
     $flash_message = $_SESSION['register_message'];
    }
    // idをGETで取得
    // $idをnullにする
    $id = null;
    // $idにGETでidを取得
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // 登録した全ての商品情報表示する
    $items = ItemDAO::get_all_items();
    // viewファイルの表示
    include_once 'admin_views/product_change_view.php';
?>