<?php
    // 外部ファイル読込
    require_once 'models/customer.php';
    require_once 'daos/cart_dao.php';
    require_once 'daos/item_dao.php';
    // var_dump($_POST);    
    // セクション開始
    session_start();

    // ログイン者の情報取得
    $login_customer = $_SESSION['login_customer'];
    // var_dump($login_customer);
    // 商品詳細ページにて選択された商品情報取得
    $cart = $_SESSION['item'];
    // var_dump($cart);

    // 選択された情報を保存
    $customer_id = $login_customer->id;
    $item_id = $_GET['item_id'];
    $item_stock = $_GET['item_stock'];
    $number = $_GET['number'];
    // var_dump($_GET);
    // cart命の誕生
    $cart = new Cart($customer_id, $item_id, $item_stock, $number);

    // カートに1件登録
    $my_carts = CartDAO::insert($cart);
    // var_dump($my_carts);
    // カート入力情報をセッションに保存
    $_SESSION['carts'] = $my_carts;
    // var_dump($_SESSION);
    $_SESSION['cart_message'] = '商品をカートに追加しました';
    header('Location: cart.php');
    exit;
    
    
    
    
    
    
    
    
?>