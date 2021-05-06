<?php
    // 外部ファイル読込
    require_once 'models/customer.php';
    require_once 'daos/cart_dao.php';
    require_once 'daos/item_dao.php';
    // セクション開始
    session_start();
    // ログイン者の情報保存 login_check.phpからのセッション受取
    $login_customer = $_SESSION['login_customer'];
    
    // 入力した情報をPOSTにて保存
    // 前のページ（carts.php）から変更後の個数を取得
    $number = $_POST['number'];
    // 前のページ（carts.php）から変更後の商品番号を取得
    $item_id = $_POST['item_id'];
    // var_dump($_POST);
    // ログイン者のidで今カートに入れようとしている商品を含むカートがあるか情報を取得
    // 私が選択した商品が既にカートあるかピンポイントで探す
    $cart = CartDAO::find_cart($login_customer->id, $item_id);
    // falseでなければ情報が入っている
    // var_dump($cart);
    // // もし、選択した商品が既にカートに入っている　cartsテーブルに存在すれば
    if($cart !== false){
        // カート情報の更新処理をする
        // cart_daoを使い個数を追加する
                                                    // 現在の数　　　変更後の個数
        $flash_message = CartDAO::update($cart->id, $cart->number + $number);
        $_SESSION['flash_message'] = $flash_message;
        // var_dump($flash_message);
        header('Location: cart.php');
        exit;
    }else{
        // 新規カート追加処理
        // cart命の誕生
        $cart = new Cart($login_customer->id, $item_id, $number, $number);

         // カートに1件登録
        $flash_message = CartDAO::insert($cart);
        $_SESSION['flash_message'] = $flash_message;
        header('Location: cart.php');
        exit;
    }

?>