<?php
    // ログインフィルター
    require_once 'admin_login_filter.php';
    // 外部ファイル読込
    require_once 'admin_daos/news_dao.php';
    require_once 'admin_daos/admin_dao.php';
    require_once 'daos/item_dao.php';
    // ログイン者の情報をセッションに保存
    $login_admin = $_SESSION['login_admin'];
    // login_messsage をセッションから取得
    $login_message = $_SESSION['login_message'];
    if(isset($_SESSION['login_message'])){
        $login_message = $_SESSION['login_message'];
    }
    // idをGETで取得
    // $idをnullにする
    $id = null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // データベースから全商品を取得
    $items = ItemDAO::get_all_items();
    // 表示したい画像をさいころを振って決める
    $rand = mt_rand(0, count($items) - 1);
    $items = $items[$rand];
    // newsの情報取得
    $news = NewsDAO::get_news_id($id);
    // viewファイルの表示
    include_once 'admin_views/admin_index_view.php';
?>