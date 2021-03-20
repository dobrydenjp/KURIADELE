<?php
    // 外部ファイル読込
    require_once 'customer.php';
    require_once 'cart_dao.php';
    require_once 'item_dao.php';
    // var_dump($_POST);
    // セクション開始
    session_start();
    // ログイン者の情報取得
    $login_customer = $_SESSION['login_customer'];
    // var_dump($login_customer);
    
    // 選択された情報を保存
    $customer_id = $login_customer->id;
    $item_id = $_POST['item_id'];
    $item_stock = $_POST['item_stock'];
    $number = $_POST['number'];
    // var_dump($_POST);
    // cart命の誕生
    $cart = new Cart($customer_id, $item_id, $item_stock, $number);
    // 商品を登録する
    CartDAO::insert($cart);
    // var_dump($cart);
        
    
    
    // ログインしていれば
    $_SESSION['cart_message'] = '商品をカートに追加しました';
    header('Location: carts.php');
    exit;
    
    
?>