<?php
    // 外部ファイル読込
    require_once 'daos/item_dao.php';
    // 登録した全ての商品情報取得
    // idをGETで取得
    // $idをnullにする
    $id = null;
    // $idにGETでidを取得
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // 検索した結果のメッセージ取得
    $flash_message = $_SESSION['flash_message'];
    // 1度のみ表示
    $_SESSION['flash_message'] = null;
    // viewファイルの表示
    include_once 'views/product_view.php';
?>