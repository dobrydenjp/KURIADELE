<?php
    // var_dump($_POST);
    // 外部ファイル読込
    require_once 'cart_dao.php';
    // セッション開始
    session_start();
    // 前のページ（carts.php）からid読込
    $id = $_POST['id'];
    // 前のページ（cart_in.php）から変更後の個数を取得
    $number = $_POST['number'];
    // 前のページ（cart_in.php）から変更後の商品番号を取得
    $item_id = $_POST['item_id'];
    // var_dump($_POST);
    // cartDAOを使ってカートの個数変更
    $update = CartDAO::update($id, $number);
    // var_dump($update);
    
    // 商品個数変更後の個数取得
    $_SESSION['number'] = $number;
    // var_dump();
    // // 画面遷移
    $_SESSION['number_message'] = 'カート番号' . $id . '商品番号' . $item_id . 'の個数を' . $number . '個に変更しました';
    // var_dump($number);
    header('Location: carts.php');
    exit;
?>