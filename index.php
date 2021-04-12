<?php
    // 外部ファイル読込
    require_once 'admin_daos/news_dao.php';
    require_once 'daos/item_dao.php';
    
    // idをnullにする
    // GETでid取得
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
    // var_dump($news);
    
    // viewファイルの表示
    include_once 'views/index_view.php';
?>