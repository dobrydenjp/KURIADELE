<?php
    // 外部ファイル読込
    require_once 'daos/item_dao.php';
    // セッション開始
    // session_start();
    // 入力情報の取得
    $id = $_POST['id'];
    $stock = $_POST['stock'];
    var_dump($_POST);
    
    
    // 入力された情報をもとに在庫変更
    $item = ItemDAO::update($id, $stock);
    // 変更した商品情報を取得する
    $_SESSION['stock'] = $item;
    // var_dump($item);
    $_SESSION['flash_message'] = '商品番号' . $id . 'の在庫を' . $stock . '個に変更しました。';
    // var_dump($_SESSION['flash_message']);
    header('Location: point_change.php');
    exit;
?>