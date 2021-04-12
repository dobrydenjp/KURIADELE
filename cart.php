<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'daos/cart_dao.php';
    require_once 'daos/customer_dao.php';
    require_once 'daos/item_dao.php';
    // セッション開始
    // session_start();
    // ログイン者の情報保存 login_check.phpからのセッション
    $login_customer = $_SESSION['login_customer'];
    // var_dump($login_customer);
    // 商品をカートに入れたメッセージ表示
    $cart_message = $_SESSION['cart_message'];
    // var_dump($cart_message);
    // 破棄
    $_SESSION['cart_message'] = null;
    
    // ログイン者のidからカート情報を取得
    $my_carts = CartDAO::get_my_carts($login_customer->id);
    // var_dump($my_carts);
    // 商品個数変更したメッセージ表示
    $number_message = $_SESSION['number_message'];
    // 破棄
    $_SESSION['number_message'] = null;
    // var_dump($number_message);
    // $updateをセッションで取得　空にする
    $id = null;
    // $idをGETで取得
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    
    // 商品個数変更後の数字表示 
    $number = $_SESSION['number'];
    // var_dump($number);
    
    
    // カートの商品を削除するメッセージ取得
    $delete_message = $_SESSION['delete_message'];
    // var_dump($delete_message);
    // 破棄
    $_SESSION['delete_message'] = null;
    // 商品の在庫が足りない場合のメッセージ取得
    $stock_message = $_SESSION['stock_message'];
    // var_dump($stock_message);
    
    
    
    // viewファイルの表示
    include_once 'views/cart_view.php';
    
    
    // カート・入力内容確認・最終確認 個数変更できるようにする
?>