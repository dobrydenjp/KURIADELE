<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'daos/item_dao.php';
    require_once 'daos/customer_dao.php';
    
    // 入力された情報を保存
    $keyword = $_GET['name'];
    // 公開されている商品取得
    $items = ItemDAO::select_all_items();
    // var_dump($items);
    // // 公開されている商品の中で入力されたキーワードが空でなければ
    if($keyword !== ''){
    //     // 公開している商品の中で
    //     // キーワードから商品一覧を取得する
        $items = ItemDAO::find_by_keyword($keyword);
        $_SESSION['items'] = $items;
        // var_dump($items);
        // メッセージ取得
        $_SESSION['flash_message'] = 'キーワード　' . '「' . $keyword . '」' . '　で検索しました。 ' . count($items) . '件ヒットしました。';
        header('Location: login_product.php');
        exit;
    }else{ // 空ならば
        // 全ての商品を取得
        $items = ItemDAO::select_all_items();
        $_SESSION['items'] = $items;
        // var_dump($items);
        // メッセージ取得
        $_SESSION['flash_message'] = 'キーワードを入力して検索ボタンを押してください。';
        header('Location: login_product.php');
        exit;
    }
    
    // 呼び込み
    include 'login_product.php';
?>