<?php
    // 外部ファイル読込
    require_once 'admin_daos/news_dao.php';
    require_once 'daos/item_dao.php';
    // セッション開始
    session_start();
    // ログアウトメッセージ表示
    $flash_message = $_SESSION['flash_message'];
    // 一度のみ表示
    $_SESSION['flash_message'] = null;
    
    // $flash_message = null;
    // if(isset($_SESSION['flash_message'])){
    //  $flash_message = $_SESSION['flash_message'];
    // }
    
    // idをnullにする
    // GETでid取得
    $id = null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // 全商品を取得
    $items = ItemDAO::get_all_items();
    // 表示したい画像をさいころを振って決める
    $rand = mt_rand(0, count($items) - 1);
    $items = $items[$rand];
    // newsの情報取得
    $news = NewsDAO::get_news_id($id);
    // viewファイルの表示
    include_once 'views/index_view.php';
?>