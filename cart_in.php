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
    // $id = $_GET['id'];
    $item_id = $_GET['item_id'];
    $item_stock = $_GET['item_stock'];
    $number = $_GET['number'];
    var_dump($_GET);
    // cart命の誕生
    $cart = new Cart($customer_id, $item_id, $item_stock, $number);
    // var_dump($cart);
    
    // カートに1件登録
    $my_carts = CartDAO::insert($cart);
    // var_dump($my_carts);
    
    
    // 同一商品をカートに入れたら新規で登録するのではなく追加で登録する
    
    
    
    // var_dump($_SESSION);
    // カート入力情報をセッションに保存
    
    // // カートの初期化
    // $_SESSION['my_carts'] = $my_carts;
    // $array[] = $_SESSION['my_carts'];
    // // var_dump($array);
    // // // カートの中身を取得する
    
    // $my_carts = $_SESSION['my_carts'];
    // // var_dump($my_carts);
    // // // カートに商品を追加する
    //  $item_id = $item['id'];
    //  var_dump($item_id);
    // if (!isset($_SESSION['my_carts'][$item_id])){
    //     // 注文数を増やす
    //     $_SESSION['my_carts'][$item_id] += $my_carts[$number];
    // }
    // var_dump($_SESSION);
    // カートを初期化する
    
    // 既にカートに入っている個数を取得
    // 個数を0にしておく
    // $count = 0;
    
    // if (!isset($_SESSION['my_carts'][$item_id])){
    //     // 配列に商品情報を取得
    //     $count = $_SESSION['my_carts'][$ite_id]['count'];
    // }
    // var_dump($count);
    $_SESSION['cart_message'] = '商品をカートに追加しました';
    header('Location: cart.php');
    exit;
    
    
    //すでにカートに存在する商品を再度　カートに新規追加すると、
    //既存のカートの商品個数が変化するのではなく、もう1つカート情報が新規に増えてしまいます。

  
?>