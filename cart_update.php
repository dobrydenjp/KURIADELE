<?php
    // 外部ファイル読込
    require_once 'daos/cart_dao.php';
    // セッション開始
    session_start();
    // 前のページ（carts.php）からid読込
    $id = $_POST['id'];
    // 前のページ（carts.php）から変更後の個数を取得
    $number = $_POST['number'];
    // 前のページ（carts.php）から変更後の商品番号を取得
    $item_id = $_POST['item_id'];
    // cartDAOを使ってカートの個数変更
    $update = CartDAO::update($id, $number);
    // 商品個数変更後の個数取得
    $_SESSION['number'] = $update;
    var_dump($_SESSION['number']);
    // // 画面遷移
    $_SESSION['flash_message'] = 'カート番号' . $id . '商品番号' . $item_id . 'の個数を' . $number . '個に変更しました';
    // 画面遷移
    header('Location: cart.php');
    exit;
?>