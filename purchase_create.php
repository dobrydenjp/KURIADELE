<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'daos/cart_dao.php';
    require_once 'daos/customer_dao.php';
    require_once 'daos/purchase_dao.php';
    require_once 'daos/item_dao.php';
    // セッション開始
    session_start();
    // ログイン者の情報取得
    $login_customer = $_SESSION['login_customer'];
    $customer_id = $login_customer->id;
    
    //トランザクション処理を開始
    // $pdo = CartDAO::get_connection();
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $pdo->beginTransaction();
    $purchase = new Purchase($cart->customer_id, $cart->item_id, $cart->number);

?>