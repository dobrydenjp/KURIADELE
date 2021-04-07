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
    
    header('Location: login_buy.php');
    exit;
    // }else{ // 在庫があるならば
    //     // カートに1件登録
    //     $cart = CartDAO::insert($cart);
        
    //     // カート入力情報をセッションに保存
    //     $_SESSION['carts'] = $cart;
    //     // var_dump($_SESSION);
    //     $_SESSION['cart_message'] = '商品をカートに追加しました';
    //     header('Location: carts.php');
    //     exit;
    
    
    
    
    
    
    
    
?>