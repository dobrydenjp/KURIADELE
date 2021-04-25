<?php
    //外部ファイル読込
    require_once 'daos/item_dao.php';
    require_once 'models/customer.php';
    $id = null;
    // $idをGETで取得
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // 選択された商品情報を取得
    $item = ItemDAO::get_item_by_id($id);
    // viewファイルの表示
    include_once 'views/buy_view.php';
?>