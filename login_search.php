<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'daos/item_dao.php';
    require_once 'daos/customer_dao.php';
    // 入力された情報を保存
    $keyword = $_GET['name'];
    // キーワードに合った商品一覧を取得する
    $items = ItemDAO::find_by_keyword($keyword);

    // // // 公開されている商品の中で入力されたキーワードが空でなければ
    if($keyword !== ''){
        // 検索したメッセージ取得
        $_SESSION['flash_message'] = 'キーワード　' . '「' . $keyword . '」' . '　で検索しました。 ' . count($items) . '件ヒットしました。';
    }else{ // 空ならば
        // キーワードが空の場合のメッセージ取得
        $_SESSION['flash_message'] = 'キーワードを入力して検索ボタンを押してください。';
    }
    // 呼び込み
    include 'login_search_new.php';
?>