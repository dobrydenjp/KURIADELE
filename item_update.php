<?php
    // 外部ファイル読込
    require_once 'daos/item_dao.php';
    // セッション開始
    session_start();
    // 入力情報の取得
    $id = $_GET['id'];
    $stock = $_GET['stock'];
    // // 入力された情報をもとに在庫変更
    $update = ItemDAO::update($id, $stock);
    // 在庫数を変更したメッセージ取得
    $_SESSION['flash_message'] = $update;
    // 呼び込み
    include_once 'item_change.php';
?>