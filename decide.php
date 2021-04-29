<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'daos/cart_dao.php';
    require_once 'daos/customer_dao.php';
    require_once 'daos/purchase_dao.php';
    require_once 'daos/item_dao.php';
    // セッション開始
    // session_start();
    $login_customer = $_SESSION['login_customer'];
    // // $idをGETで取得
    $id = null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $my_carts = CartDAO::get_my_carts($login_customer->id);
    // var_dump($my_carts);
    //トランザクション処理を開始
    // $pdo = CartDAO::get_connection()
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $pdo->beginTransaction();
    foreach($my_carts as $cart){
        $purchase = new Purchase($cart->customer_id, $cart->item_id, $cart->number);
        // var_dump($purchase);
        // 購入履歴登録
        PurchaseDAO::insert($purchase);
        // 在庫数減少
        ItemDAO::decrement_stock($cart);
         // カート情報削除
        CartDAO::delete_cart($cart->id);
    }
    // 在庫減少した時に在庫が0以下にならない
    // viewファイルの表示
    include_once 'views/decide_view.php';
?>