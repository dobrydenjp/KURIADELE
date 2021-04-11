<?php
    // 外部ファイル読込
    require_once 'item_dao.php';
    // セッション開始
    session_start();
    // 入力された情報を保存
    // $keyword = $_POST['name'];
    $keyword = $_GET['name'];
    // var_dump($_POST);
    // ログイン者の情報取得
    // $login_customer = $_SESSION['login_customer'];
    $items = ItemDAO::find_by_keyword($keyword);
    // var_dump($items);
    // 入力されたキーワードが空でなければ
    if($keyword !== ''){
        $items = ItemDAO::find_by_keyword($keyword);
        $message = 'キーワード' . $keyword . 'で検索しました' . count($items) . '件ヒットしました。';
        // var_dump($message);
        
    }else{ // 空ならば
        // 全ての商品を取得
        $items = ItemDAO::get_all_items();
        // メッセージ
        $message = 'キーワードを入力して検索ボタンを押してください。';
    }

    // // キーワードが一致するキーワードならば
    // if(preg_match('/[^ぁ-んーァ-ヶー]/u', $items)){
        
    //     // キーワードにヒットする商品を抜き出す
    //     $items = ItemDAO::find_by_keyword($keyword);
    //     $_SESSION['search_message'] = 'キーワードの類似商品が表示されました。';
    //     var_dump($_SESSION);
    //     // // 画面遷移
    //     header('Location: login_product.php');
    //     exit;
        
    // }else{ // キーワードと商品名が一致しないならば
    //     // エラーメッセージ表示
    //     $_SESSION['search_errors'] = '入力された商品名は存在しません。';
    //     var_dump($_SESSION);
        // // 画面遷移
        // header('Location: mypage.php');
        // exit;
    // }
    
    // 呼び込み
    // include 'login_product.php';
    include 'products.php';
    
    // ItemDAOを使い、idの商品情報取得
    // $item = ItemDAO::get_item_by_id($id);
    // var_dump($item);
    
?>