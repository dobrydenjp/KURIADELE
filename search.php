<?php
    // 外部ファイル読込
    require_once 'item_dao.php';
    // 入力された情報を保存
    $keyword = $_POST['name'];
    // var_dump($_POST);
    // キーワードにヒットする商品を抜き出す
    $items = ItemDAO::find_by_keyword($keyword);
    // var_dump($items);
    // 呼び込み
    // include 'login_product.php';
?>