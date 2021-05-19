<?php
    // 外部ファイル読込
    require_once 'daos/item_dao.php';
    // idをGETで取得
    // $idをnullにする
    $id = null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // 選択した商品情報を表示する
    // $item = ItemDAO::update($id, $stock);
    $item = ItemDAO::get_item_by_id($id);
    
    // 商品情報を保存
    $_SESSION['item'] = $item;
    // $item = $_SESSION['stock'];
    
    // 変更完了メッセージ表示
    $flash_message = $_SESSION['flash_message'];
    
    // 1度のみ表示
    $_SESSION['flash_message'] = null;

    // viewファイルの表示
    include_once 'admin_views/admin_change_view.php';
    
?>