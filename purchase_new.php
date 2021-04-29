<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'daos/cart_dao.php';
    require_once 'models/customer.php';
    require_once 'daos/item_dao.php';
    // セッション開始
    // session_start();
    // ログイン者の情報保存 login_check.phpからのセッション取得
    $login_customer = $_SESSION['login_customer'];
    
    var_dump($login_customer);
    // ログイン者のidからカート情報を取得
    $my_carts = CartDAO::get_my_carts($login_customer->id);
    var_dump($my_carts);
    // 選択された商品情報取得
    $item = $_SESSION['item'];
    var_dump($item);
    if($item->stock - $my_carts->number <= 0){
        // 購入できないというメッセージ表示
        $_SESSION['stock_message'] = '在庫がありません。商品をご確認ください。';
        // var_dump($_SESSION);
    //     header('Location: cart.php');
    //     exit;
    }
    // 購入したい物が在庫以上ならば

    // 在庫が0個になる場合
    // カートに入っているもの同じ商品の在庫以上は購入ができないようにする

    // if($my_carts->number >= $my_carts->item_stock){
        // print 'OK';
    //     // 購入できないというメッセージ表示
    //     $_SESSION['stock_message'] = '在庫がありません。商品をご確認ください。';
    //     header('Location: cart.php');
    //     exit;
    //     // var_dump($_SESSION);
    // }else{ // 在庫があるならば
    //         // 次のページへ進む
        // header('Location: purchase_transfer.php');
        // exit;
    // }

    
    // var_dump($_POST);
?>