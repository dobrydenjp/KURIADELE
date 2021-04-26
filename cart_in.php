<?php
    // 外部ファイル読込
    require_once 'models/customer.php';
    require_once 'daos/cart_dao.php';
    require_once 'daos/item_dao.php';
    // セクション開始
    session_start();
    // ログイン者の情報保存 login_check.phpからのセッション受取
    $login_customer = $_SESSION['login_customer'];
    // ログイン者のidからカート情報を取得
    $cart = CartDAO::get_my_carts($login_customer->id);
    var_dump($cart);
    // 入力した情報をPOSTにて保存
    // クリックされた情報をgetで取得
    //  前のページ（carts.php）からid読込
    // $id = $cart->id;
    // 前のページ（carts.php）から変更後の個数を取得
    $number = $_POST['number'];
    // 前のページ（carts.php）から変更後の商品番号を取得
    $item_id = $_POST['item_id'];
    $item_stock = $_POST['item_stock'];
    var_dump($_POST);
    
    // もし、選択した商品が既にカートに入っている　cartsテーブルに存在すれば
    if($cart !== false){
        // カート情報の更新処理をする
        // cart_daoを使い個数を追加する
        //  カート番号(id)と変更後の個数(number)を引き渡す
        $update_item = CartDAO::update_item($id, $number);
        var_dump($update_item);
        // var_dump($number);
    }else{
            
    //      // 既にカートに異なる商品が入ってあればカートインスタンス取得する
    //      // cart命の誕生
    //     $cart = new Cart($customer_id, $item_id, $item_stock, $number);
    //     var_dump($cart);
    //     //  // カートに1件登録
    //     $cart = CartDAO::insert($cart);
    //     $_SESSION['cart'] = $cart;
    //     var_dump($cart);
    //     $_SESSION['cart_message'] = '商品をカートに追加しました';
    //     var_dump($_SESSION);
    //     // header('Location: cart.php');
    //     // exit;
        
    }
    
    
    // 既にカートにに入っている商品が選択した商品と異なる場合であれば
    // カートインスタンスを取得
    // cart命誕生
    // カートに1件登録する
?>