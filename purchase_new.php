<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'cart_dao.php';
    require_once 'customer.php';
    require_once 'item_dao.php';
    // セッション開始
    session_start();
    // ログイン者の情報保存 login_check.phpからのセッション取得
    $login_customer = $_SESSION['login_customer'];
    // var_dump($login_customer);
    // ログイン者のidからカート情報を取得
    $my_carts = CartDAO::get_my_carts($login_customer->id);
    // var_dump($my_carts);
    // 購入したい物が在庫以上ならば
    
    if($my_carts->number >= $my_carts->item_stock){
        // print 'OK';
    //     // 購入できないというメッセージ表示
        $_SESSION['stock_message'] = '在庫がありません。商品をご確認ください。';
        header('Location: carts.php');
        exit;
        // var_dump($_SESSION);
    }else{ // 在庫があるならば
            // 次のページへ進む
        header('Location: purchase_transfer.php');
        exit;
    }
    
    
   
    // 在庫が0個になる場合
    // カートに入っているもの同じ商品の在庫以上は購入ができないようにする
    // var_dump($_POST);
?>