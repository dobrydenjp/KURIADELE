<?php
    // 外部ファイル読込
    require_once 'daos/item_dao.php';
    // セッション開始
    session_start();
    // 入力された情報を保存
    $keyword = $_GET['name'];
    // 公開されている商品取得
    $items = ItemDAO::select_all_items();
    
    // 入力されたキーワードが空でなければ
    if($keyword !== ''){
        $items = ItemDAO::find_by_keyword($keyword);
        // メッセージ取得
        $_SESSION['flash_message'] = 'キーワード' . $keyword . 'で検索しました' . count($items) . '件ヒットしました。';
        
    }else{ // 空ならば
        // 全ての商品を取得
        $items = ItemDAO::select_all_items();
        // メッセージ取得
        $_SESSION['flash_message'] = 'キーワードを入力して検索ボタンを押してください。';
    }
    // 呼び込み
    include 'product.php';
?>