<?php
    // 外部ファイル読込
    require_once 'daos/item_dao.php';
    // セッション開始
    session_start();
    // 入力された情報を保存
    // $keyword = $_POST['name'];
    $keyword = $_GET['name'];
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
    // 呼び込み
    include 'product.php';
?>