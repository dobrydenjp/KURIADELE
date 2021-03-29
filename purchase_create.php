<?php
    // var_dump($_POST);
    // 外部ファイル読込
    require_once 'cart_dao.php';
    require_once 'customer_dao.php';
    require_once 'purchase_dao.php';
    require_once 'item_dao.php';
    // セッション開始
    session_start();
    // ログイン者の情報取得
    $login_customer = $_SESSION['login_customer'];
    $customer_id = $login_customer->id;
    var_dump($customer_id);
    
    
    
    
    
    // 購入ボタンを押す
    // 購入したい商品の情報が次のページ以降に反映
    // 購入と同時に商品の在庫数が減る
    
    //トランザクション処理を開始
    // $pdo = CartDAO::get_connection();
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $pdo->beginTransaction();
    
    // foreach($my_carts as $cart){
        
        $purchase = new Purchase($cart->customer_id, $cart->item_id, $cart->number);
        
        var_dump($purchase);
    //     // 購入履歴登録
    //     PurchaseDAO::insert($purchase);
    //     // 在庫数減少
    //     ItemDAO::decrement_stock($cart);
    //      // カート情報削除
    //     CartDAO::delete_cart($cart->id);
    // }
    
    // $_SESSION['flash_message'] = お支払い先確認へ;
    // header('Location: purchase_transfer.php');
    // exit;
    
?>