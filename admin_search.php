<?php
    // ログインフィルター
    require_once 'admin_login_filter.php';
    // 外部ファイル読込
    require_once 'admin_daos/admin_dao.php';
    require_once 'daos/item_dao.php';
    // 入力された情報を保存
    $keyword = $_GET['name'];
    $items = ItemDAO::find_by_keyword($keyword);
    // 入力されたキーワードが空でなければ
    if($keyword !== ''){
        $items = ItemDAO::find_by_keyword($keyword);
        $_SESSION['flash_message'] = 'キーワード' . $keyword . 'で検索しました' . count($items) . '件ヒットしました。';
    }else{ // 空ならば
        // 全ての商品を取得
        $flag = null;
        $items = ItemDAO::select_all_items($flag);
        // メッセージ
        $_SESSION['flash_message'] = 'キーワードを入力して検索ボタンを押してください。';
    }
    // 呼び込み
    include 'admin_product.php';
?>