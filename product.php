<?php
    // 外部ファイル読込
    require_once 'daos/item_dao.php';
    // セッション開始
    // session_start();
    // 登録した全ての商品情報取得
    $items = ItemDAO::get_all_items();
    
    $flash_message = null;
    if(isset($_SESSION['flash_message'])){
        $flash_message = $_SESSION['flash_message'];
    }
    
    // viewファイルの表示
    include_once 'views/product_view.php';
    
?>