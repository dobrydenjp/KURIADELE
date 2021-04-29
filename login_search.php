<?php
    // 外部ファイル読込
    require_once 'daos/item_dao.php';
    require_once 'daos/customer_dao.php';
    
    // セッション開始
    // session_start();
    // ログイン者の情報保存
    // $login_customer = $_SESSION['login_customer'];
    // 入力された情報を保存
    $keyword = $_GET['name'];
    $items = ItemDAO::find_by_keyword($keyword);
    // 入力されたキーワードが空でなければ
    if($keyword !== ''){
        $items = ItemDAO::find_by_keyword($keyword);
        $message = 'キーワード' . $keyword . 'で検索しました' . count($items) . '件ヒットしました。';
    }else{ // 空ならば
        // 全ての商品を取得
        $items = ItemDAO::get_all_items();
        // メッセージ
        $message = 'キーワードを入力して検索ボタンを押してください。';
    }
    
    // 呼び込み
    include 'login_product.php';
?>