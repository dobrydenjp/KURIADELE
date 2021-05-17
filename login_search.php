<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'daos/item_dao.php';
    require_once 'daos/customer_dao.php';
    // 入力された情報を保存
    $keyword = $_GET['name'];
    // $items = ItemDAO::select_all_items($flag);
    // var_dump($items);
    // var_dump($_SESSION);
    // キーワードによって取得した商品から表示されている商品取得
    // キーワードによって取得した商品が公開されていないならば
    
    $items = ItemDAO::select_all_items();
    // var_dump($items);
    // 公開されている商品の中で入力されたキーワードが空でなければ
    if($keyword !== ''){
        // キーワードから商品一覧を取得する
        $items_array = ItemDAO::find_by_keyword($keyword);
        var_dump($items_array);
        $_SESSION['flash_message'] = 'キーワード' . $keyword . 'で検索しました' . count($items_array) . '件ヒットしました。';
    }else{ // 空ならば
        // 全ての商品を取得
        $flag = null;
        $items = ItemDAO::select_all_items();
        // メッセージ
        $_SESSION['flash_message'] = 'キーワードを入力して検索ボタンを押してください。';
    }

    // 呼び込み
    include 'login_product.php';
?>