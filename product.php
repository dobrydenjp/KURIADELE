<?php
    // 外部ファイル読込
    require_once 'daos/item_dao.php';
    // 登録した全ての商品情報取得
    $items = ItemDAO::select_all_items();
    // idをGETで取得
    // $idをnullにする
    $id = null;
    // $idにGETでidを取得
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $flash_message = null;
    if(isset($_SESSION['flash_message'])){
        $flash_message = $_SESSION['flash_message'];
    }
    // viewファイルの表示
    include_once 'views/product_view.php';
?>