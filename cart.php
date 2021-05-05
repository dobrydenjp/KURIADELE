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
    // 商品をカートに入れたメッセージ表示
    $cart_message = $_SESSION['cart_message'];
    // 一度のみ表示
    $_SESSION['cart_message'] = null;
    
    $cart_message = null;
    if(isset($_SESSION['cart_message'])){
     $cart_message = $_SESSION['cart_message'];
    }
    // ログイン者のidからカート情報を取得
    $my_carts = CartDAO::get_my_carts($login_customer->id);
    // var_dump($my_carts);
    $_SESSION['my_carts'] = $my_carts;
    $cart = $_SESSION['my_carts'];
    // var_dump($cart);
    
    // カートに何もない状態でも決定ボタンが押せてしまいます。
    // カートに商品が入っていなければ

    // 商品が入っていれば
    // 購入ボタンが出る
    // var_dump($count);
    // 商品個数変更したメッセージ表示
    $number_message = $_SESSION['number_message'];
    // 一度のみ表示
    $_SESSION['number_message'] = null;

    // $updateをセッションで取得　空にする

    // カートの商品を削除するメッセージ取得
    $delete_message = $_SESSION['delete_message'];
    // 一度のみ表示
    $_SESSION['delete_message'] = null;
    // 商品の在庫が足りない場合のメッセージ取得
    $_SESSION['stock_message'] = '商品の在庫が足りません';
    
    $stock_message = $_SESSION['stock_message'];
    // カートに同一商品を追加した場合のメッセージ取得
    $update_message = $_SESSION['update_message'];
    // 一度のみ表示
    $_SESSION['update_message'] = null;
    
    $update_message = null;
    if(isset($_SESSION['update_message'])){
     $update_message = $_SESSION['update_message'];
    }
    $id = null;
    // $idをGETで取得
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // viewファイルの表示
    include_once 'views/cart_view.php';
?>