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
    // カートから１つずつ商品を取出し、在庫数とその商品の個数を比較
    foreach($my_carts as $cart){
        // そのカートの商品番号を取得する
        $item_id = $cart->item_id;
        // itemDAOを使って商品情報を取得する
        $item = itemDAO::get_item_by_id($item_id);
        // もし商品の在庫数より、購入希望数が多ければ
        if($cart->number > $item->stock){
            // 在庫数が足りなければ足りないメッセージ表示
            $_SESSION['flash_message'] = '商品番号' . $item_id . 'の在庫がありません。ご確認お願いします。';
            header('Location: check_mate.php');
            exit;
        }else{
            $purchase = new Purchase($cart->customer_id, $cart->item_id, $cart->number);
            //トランザクション処理を開始
            // $pdo = CartDAO::get_connection()
            // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $pdo->beginTransaction();
            // 購入履歴登録
            PurchaseDAO::insert($purchase);
            // 在庫数減少
            ItemDAO::decrement_stock($cart);
            // カート情報削除
            CartDAO::delete_cart($cart->id);
            // 在庫数があれば、購入できる（次のページへ）
            header('Location: decide.php');
            exit;
        }
    }
    // 在庫減少した時に在庫が0以下にならない
    // viewファイルの表示
    include_once 'views/decide_view.php';
?>