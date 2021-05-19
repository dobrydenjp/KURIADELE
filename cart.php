<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'daos/cart_dao.php';
    require_once 'daos/customer_dao.php';
    require_once 'daos/item_dao.php';

    // ログイン者の情報保存 login_check.phpからのセッション
    $login_customer = $_SESSION['login_customer'];
    
    // ログイン者のidからカート情報を取得
    $my_carts = CartDAO::get_my_carts($login_customer->id);
    // 保存
    $_SESSION['my_carts'] = $my_carts;
    $cart = $_SESSION['my_carts'];
    var_dump($cart);
    // 商品をカートに入れたメッセージ取得
    // 商品個数変更したメッセージ取得
    // カートの商品を削除するメッセージ取得
    // カートに同一商品を追加した場合のメッセージ取得
    $flash_message = $_SESSION['flash_message'];
    
    // 一度のみ表示
    $_SESSION['flash_message'] = null;
    $id = null;
    // $idをGETで取得
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // viewファイルの表示
    include_once 'views/cart_view.php';
?>