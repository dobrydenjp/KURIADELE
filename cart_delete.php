<?php
    // カートに入っている商品を削除する
    // 外部ファイル読込
    require_once 'daos/cart_dao.php';
    // セッション開始
    session_start();
    // 前のページから商品id 取得
    $id = $_POST['id'];
    // CartDAOを使ってカートのid削除する
    $delete = CartDAO::delete_cart($id);
    // var_dump($delete);
    // 削除したメッセージ保存
    $_SESSION['flash_message'] = 'カート番号' . $id . 'の商品を削除しました。';
    // 画面遷移
    header('Location: cart.php') ;
    exit;
?>