<?php
    // 外部ファイル読込
    require_once 'daos/item_dao.php';
    // セッション開始
    session_start();
    // 入力された情報を保存
    $keyword = $_GET['name'];
    // キーワードに合った商品一覧を取得する
    $items = ItemDAO::find_by_keyword($keyword);
    // 入力されたキーワードが空でなければ
    if($keyword !== ''){
        // メッセージ取得
        $_SESSION['flash_message'] = 'キーワード' . $keyword . 'で検索しました' . count($items) . '件ヒットしました。';
    }else{ // 空ならば
        // メッセージ取得
        $_SESSION['flash_message'] = 'キーワードを入力して検索ボタンを押してください。';
    }
    // 呼び込み
    include 'search_new.php';
?>